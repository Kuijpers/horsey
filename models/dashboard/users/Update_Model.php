<?php
/**
 * Description of Update_Model -> Users
 * 
 * This class is an extension of the Model class
 * Within this class we handle the data needed for the Users page
 * 
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Update_Model extends Model{
        
    
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
            
        //Debug::sentence("Dashboard users update model");
        
// Class settings
        $this->_error = new Error();
        $this->_token = new DKW\Security\Token();
        $this->_sanit = new DKW\Security\Sanitize();
        $this->_session = new DKW\Tracking\Session();
    }
   
    public function user_update($data){
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
        
        // Remove slashes for debug
            //Debug::array_list($data, "We can now enter the following data in DB :");
        
        $this->db->update('User', [
                                            'user_firstname' => $this->_sanit->escape($data['user_firstname']),
                                            'user_lastname' => $this->_sanit->escape($data['user_lastname']),
                                            'user_adress' => $this->_sanit->escape($data['user_adress']),
                                            'user_postcode' => $this->_sanit->escape($data['user_postcode']),
                                            'user_city' => $this->_sanit->escape($data['user_city']),
                                            'user_state' => $this->_sanit->escape($data['user_state']),
                                            'user_country' => $this->_sanit->escape($data['user_country']),
                                            'user_telephone' => $this->_sanit->escape($data['user_telephone']),
                                            'user_email' => $this->_sanit->escape($data['user_email'])],
                                          'user_id ='. $data['user_id']
                                        );
        $this->db->update('Login', [
                                            'login_name' => $this->_sanit->escape($data['login_name']),
                                            'login_usertype' => $this->_sanit->escape($data['login_usertype'])],
                                          'login_id ='. $data['login_id']
                                        );
        return TRUE;
    }
/**
 * 
 * @param INT $user_id
 * @return type
 */
    public function show_update_info($user_id){
        $this->_empty_id($user_id);
        $this->_check_usertype($user_id, "owner", 'Owner information can\'t be changed');
        return $this->show_single_userdata($user_id);
    }
/**
 * Get all information about a single given user
 * @param INT $id ID for the given user
 * First check if empty
 * Check if returned array is empty
 * @return ARRAY All information from database about the given user
 */
    public function show_single_userdata($user_id){
            $this->_empty_id($user_id);
            return $this->_check_emptyarray($this->_get_single_user(intval($user_id)));
    }
/**
 * This checks if $id is empty
 * @param INT $id
 * @return boolean TRUE when not empty
 * @throws Exception When empty
 */
    private function _empty_id($id){
        if(empty($id)){
            /**
             * @TODO Create correct error system
             */
            throw new Exception('No ID has been set.');
        }
        return TRUE;
    }
 /**
  * Check if usertype compares to submitted. If so return error message.
  * This is so that certain users can not be deleted or changed.
  * @param INT $user_id This is the user that needs to be compared
  * @param STRING $usertype This is what is needed to compare
  * @param STRING $message The message that should be displayed
  */
     private function _check_usertype($user_id, $usertype, $message){
         
         if($this->_get_usertype($user_id)=== strtolower($usertype)){
                $this->_session->set('danger', $message);
                header('location:' . URL . 'dashboard/users');
                exit;             
         }
         
     }
/**
 * 
 * @param type $data
 * @return boolean
 * @throws Exception
 */
    private function _check_emptyarray($data){
        if(empty($data)){
            /**
             * @TODO Create correct error system
             */
            throw new Exception('No information available');
        }
        return $data;
    }
/**
 * 
 * @param INT $id ID for requested user
 * @return ARRAY All information about user
 */
    private function _get_single_user($id){
        return $this->db->read("SELECT 	User.*,  Login.*
                                FROM User
                                JOIN Login ON 
                                Login.login_id = User.Login_login_id
                                and 
                                User.user_id = :id",
                                [":id" => $id]);
        
    }
 /**
  * Check what usertype belongs to this user
  * @param INT $user_id For this user we need to know what usertype is set
  * @return STRING This is the usertype
  */
     private function _get_usertype($user_id){
         $compare = $this->db->read("SELECT 	Login.login_usertype
                                        FROM User
                                        JOIN Login ON 
                                        Login.login_id = User.Login_login_id
                                        and 
                                        User.user_id = :user_id",
                                        [":user_id"=> $user_id]);
         return $compare[0]['login_usertype'];
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
  * 
  * @param STRING $data Information about the default ENUM field
  * @return ARRAY All defult ENUM options in an array
  */
     private function _extract_enum($data){
         return explode(",", str_replace("'", "", substr($data[0]['COLUMN_TYPE'], 5, (strlen($data[0]['COLUMN_TYPE'])-6))));
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
    
} // End of class
