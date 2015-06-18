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
class Add_Model extends Model{

// Set last ID
    private $_last_id = '';
    
// Needed to send email    
    protected $_user_email = '';
    
    
// Class variables
    protected $_error;
    protected $_token;
    protected $_sanit;
    protected $_verify;
    protected $_mail;
    
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
        $this->_verify = new DKW\Security\Verify();
        $this->_mail = new DKW\Mail\Mailer(new DKW\Mail\Mailcatcher('127.0.0.1', 1025, TRUE));
        
    } 
    public function user_create($data){
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
        
        $verify = $this->_verify->number();   
        // Remove slashes for debug
            //Debug::array_list($data, "We can now enter the data in DB");
        
        $this->db->create('Login', [
                                'login_name' => $this->_sanit->escape($data['login_name']),
                                'login_usertype' => $this->_sanit->escape($data['login_usertype']),
                                'login_verification' => $verify]
                            );
        
        $this->_last_id = $this->db->lastId();
        
            $this->db->create('User', [
                                'user_firstname' => $this->_sanit->escape($data['user_firstname']),
                                'user_lastname' => $this->_sanit->escape($data['user_lastname']),
                                'user_adress' => $this->_sanit->escape($data['user_adress']),
                                'user_postcode' => $this->_sanit->escape($data['user_postcode']),
                                'user_city' => $this->_sanit->escape($data['user_city']),
                                'user_state' => $this->_sanit->escape($data['user_state']),
                                'user_country' => $this->_sanit->escape($data['user_country']),
                                'user_telephone' => $this->_sanit->escape($data['user_telephone']),
                                'user_email' => $this->_sanit->escape($data['user_email']),
                                'user_creation_date' => date('Y-m-d'),
                                'user_creation_time' => date('H:i:s'),
                                'Login_login_id' => $this->_last_id]
                            );
            
            // Email
                  $this->_user_email =   $data['user_email'];
                  
                  $verificationlink = URL.'dashboard/verification/newuser/check/'.$verify;
                  
                  $mailinfo = ['name'=> $data['user_firstname'] ." ". $data['user_lastname'],
                                'username'=>$data['login_name'],
                                'verificationnumber' => $verify,
                                'verificationlink' => $verificationlink];
            
            $this->_mail->send('private/mail/verificationmail.php', $mailinfo, function($m){
                        $m->to($this->_user_email);
                        $m->subject('Please verify your subscription');
                        });
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
