<?php
/**
 * Description of Users_Model
 * 
 * This class is an extension of the Model class
 * Within this class we handle the data needed for the Users page
 * 
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Status_Model extends DashboardModel{
    
    
// Class variables
    protected $_error;
    protected $_token;
    protected $_sanit;
    protected $_session;
    
/**
*  function __construct will automatically generate when method is called
*/
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
            
        //Debug::sentence("Dashboard users index model");
        
// Class settings
        $this->_error = new Error();
        $this->_token = new DKW\Security\Token();
        $this->_sanit = new DKW\Security\Sanitize();
        $this->_session = new DKW\Tracking\Session();
        
    }
    
     public function user_update_status($data){
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
        
        // Remove slashes for debug
            //Debug::array_list($data, "We can now enter the data in DB");
            
            // GET current status
            $login_status_previous = $this->db->read('SELECT login_status, login_usertype
                                                      FROM Login
                                                      WHERE login_id = :login_id',
                                                      ['login_id' => $data['login_id']]);
         // Remove slashes for debug
           //Debug::array_list($login_status_previous, "This is the previous status");
            
        // When the change has to be made for owner redirect to admin page without changing status
            if($login_status_previous[0]['login_usertype'] == "owner"){
                $this->_session->set('danger', 'OWNER_DELETE');
                        header('location:' . URL . 'users');
                        die();
            }
        // When trying to change own status redirect to admin page without changing status
            if($data['user'] == $data['login_id']){
               $this->_session->set('danger', 'OWN_STATUS');
                        header('location:' . URL . 'users');
                        die();
            }
            
                 $this->db->create('User_status', [
                                            'user_status_previous' =>  $this->_sanit->escape($login_status_previous[0]['login_status']),
                                            'user_status_new' =>  $this->_sanit->escape($data['login_status']),
                                            'user_status_reason' =>  $this->_sanit->escape($data['login_status_change']),
                                            'user_status_who' =>  $this->_sanit->escape($data['user']),
                                            'user_status_date' => date('Y-m-d'),
                                            'user_status_time' => date('H:i:s'),
                                            'Login_login_id' =>  $this->_sanit->escape($data['login_id'])]
                                        );
                 
                 $this->db->update('Login', ['login_status' =>  $this->_sanit->escape($data['login_status'])],
                                          'login_id ='. $data['login_id']
                                        );    
                 
                 return TRUE;
    } 
    
/**
* 
* @return ARRAY All ENUM options for given table/column
*/
    public function show_enum($table, $column){
       return $this->_get_enum($table, $column); 
    }
    
/**
* 
* @return ARRAY All ENUM options, for this table/column,  in an array
*/
    private function _get_enum($table, $column){
    return $this->_extract_enum( $this->_get_enumdata($table, $column) );
     }
/**
* Get the deafault settings for the ENUM table
* @return ARRAY all default settings
*/
     private function _get_enumdata($table, $column){
         return $this->db->read("SELECT COLUMN_TYPE 
                                FROM INFORMATION_SCHEMA.COLUMNS
                                WHERE TABLE_NAME = :table_name 
                                AND COLUMN_NAME = :column_name",
                                [":table_name"  =>  $table,
                                 ":column_name" =>  $column]);
     }
/**
* 
* @param STRING $data Information about the default ENUM field
* @return ARRAY All defult ENUM options in an array
*/
     private function _extract_enum($data){
         return explode(",", str_replace("'", "", substr($data[0]['COLUMN_TYPE'], 5, (strlen($data[0]['COLUMN_TYPE'])-6))));
     }
 
} // End of class
