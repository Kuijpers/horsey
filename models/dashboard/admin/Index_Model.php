<?php
/**
 * Description of Admin_settings_Model
 * 
 * This class is an extension of the Model class
 * Within this class we handle the data needed for the Admin_settings page
 * 
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Index_Model extends Model{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
            
        //Debug::sentence("Admin_settings model");
    }
    
    public function user_create($data){
        Error::Request_Method('POST');
        Token::check();
        
        // Remove slashes for debug
            //Debug::array_list($data, "We can now enter the data in DB");
        
        $this->db->create('Login', [
                                            'login_name' => Sanitize::escape($data['login_name']),
                                            'login_usertype' => Sanitize::escape($data['login_usertype'])]
                                        );
        
        $last_id = $this->db->lastId();
        
        $this->db->create('User', [
                                            'user_firstname' => Sanitize::escape($data['user_firstname']),
                                            'user_lastname' => Sanitize::escape($data['user_lastname']),
                                            'user_adress' => Sanitize::escape($data['user_adress']),
                                            'user_postcode' => Sanitize::escape($data['user_postcode']),
                                            'user_city' => Sanitize::escape($data['user_city']),
                                            'user_state' => Sanitize::escape($data['user_state']),
                                            'user_country' => Sanitize::escape($data['user_country']),
                                            'user_telephone' => Sanitize::escape($data['user_telephone']),
                                            'user_email' => Sanitize::escape($data['user_email']),
                                            'Login_login_id' => $last_id]
                                        );
        
       
        return TRUE;
    }
    
    public function user_update($data){
        Error::Request_Method('POST');
        Token::check();
        
        // Remove slashes for debug
            //Debug::array_list($data, "We can now enter the following data in DB :");
        
        $this->db->update('User', [
                                            'user_firstname' => Sanitize::escape($data['user_firstname']),
                                            'user_lastname' => Sanitize::escape($data['user_lastname']),
                                            'user_adress' => Sanitize::escape($data['user_adress']),
                                            'user_postcode' => Sanitize::escape($data['user_postcode']),
                                            'user_city' => Sanitize::escape($data['user_city']),
                                            'user_state' => Sanitize::escape($data['user_state']),
                                            'user_country' => Sanitize::escape($data['user_country']),
                                            'user_telephone' => Sanitize::escape($data['user_telephone']),
                                            'user_email' => Sanitize::escape($data['user_email'])],
                                          'user_id ='. $data['user_id']
                                        );
        $this->db->update('Login', [
                                            'login_name' => Sanitize::escape($data['login_name']),
                                            'login_usertype' => Sanitize::escape($data['login_usertype'])],
                                          'login_id ='. $data['login_id']
                                        );
        return TRUE;
    }
    
    public function user_update_status($data){
        Error::Request_Method('POST');
        Token::check();
        
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
                Session::set('danger', 'Owner status can\'t be changed !!');
                        header('location:' . URL . 'admin_settings');
                        die();
            }
        // When trying to change own status redirect to admin page without changing status
            if($data['user'] == $data['login_id']){
                Session::set('danger', 'You can\'t change your own status !!');
                        header('location:' . URL . 'admin_settings');
                        die();
            }
            
                 $this->db->create('User_status', [
                                            'user_status_previous' => Sanitize::escape($login_status_previous[0]['login_status']),
                                            'user_status_new' => Sanitize::escape($data['login_status']),
                                            'user_status_reason' => Sanitize::escape($data['login_status_change']),
                                            'user_status_who' => Sanitize::escape($data['user']),
                                            'user_status_date' => date('Y-m-d'),
                                            'user_status_time' => date('H:i:s'),
                                            'Login_login_id' => Sanitize::escape($data['login_id'])]
                                        );
                 
                 $this->db->update('Login', ['login_status' => Sanitize::escape($data['login_status'])],
                                          'login_id ='. $data['login_id']
                                        );    
                 
                 return TRUE;
    } 
    /**
    * 
    * @return array All userinformation
     */    
    public function show_usersdata(){
        return $this->_get_users();
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
    
    public function show_single_userstatusoverview($user_id) {
            $this->_empty_id($user_id);
            return $this->_get_single_userstatusoverview($user_id);
    }
    /**
     * 
     * @param INT $user_id ID of user that should be deleted
     */
    public function delete_user($user_id) {
            // Check if $user_id is set
            $this->_empty_id($user_id);
            // Check if $user_id is numeric
            $this->_check_int($user_id, 'Something went wrong. Please try again');
            // Check if $user_id exists
            $this->_check_id($user_id, 'Something went wrong. Please try again');
            // Check if $user_id has usertype owner
            $this->_check_usertype($user_id, "owner", 'The OWNER can\'t be deleted');
            // Delete user with $user_id
            if($this->_delete_user($user_id)){
                Session::set('succes', 'User is removed');
                header('location:' . URL . 'admin_settings');
                exit;
            }
    }
    /**
     * 
     * @param INT $user_id ID of user that should be deleted
     * @return boolean If user is deleted return TRUE
     */
    private function _delete_user($user_id) {
            $sql = "User.*,  Login.*
                                FROM User
                                JOIN Login ON 
                                Login.login_id = User.Login_login_id";
            $where = "User.user_id = $user_id";
            
            if($this->db->delete_multi($sql, $where)){
                return TRUE;
            }
            
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
     * @return Array Information requested from the database
     */
    private function _get_users(){
        return $this->db->read("SELECT 	User.*,  Login.*
                                FROM User
                                JOIN Login ON 
                                Login.login_id = User.Login_login_id
                                ORDER BY User.user_lastname ASC");
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
    
    private function _get_single_userstatusoverview($user_id) {
        return $this->db->read("SELECT
                                User_status.*,
                                a1.user_firstname AS who_firstname,
                                a1.user_lastname AS who_lastname,
                                a2.login_usertype AS who_type
			
                                FROM	User_status

                                JOIN 	User  ON User_status.Login_login_id = User.Login_login_id AND User.user_id = :user_id

                                LEFT JOIN User a1 ON a1.Login_login_id = User_status.user_status_who

                                LEFT JOIN Login a2 ON a2.login_id = a1.Login_login_id

                                ORDER BY user_status_date DESC, user_status_time DESC",
                                [":user_id" => $user_id]);
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
      * Check if usertype compares to submitted. If so return error message.
      * This is so that certain users can not be deleted or changed.
      * @param INT $user_id This is the user that needs to be compared
      * @param STRING $usertype This is what is needed to compare
      * @param STRING $message The message that should be displayed
      */
     private function _check_usertype($user_id, $usertype, $message){
         
         if($this->_get_usertype($user_id)=== strtolower($usertype)){
                Session::set('danger', $message);
                header('location:' . URL . 'admin_settings');
                exit;             
         }
         
     }
     /**
      * We check if input is numeric so we can continue
      * @param ALL $param The value that requires to be checked
      * @param STRING $message This message will apear when check is not ok
      */
     private function _check_int($param, $message){
         if(! is_numeric($param)){
                Session::set('warning', $message);
                header('location:' . URL . 'admin_settings');
                exit; 
         }
     }
     /**
      * 
      * @param INT $user_id This user need to be in the DB if we want to delete him/her
      * @param STRING $message This message will apear when check is not ok
      */
     private function _check_id($user_id, $message) {
         $number = $this->_get_usercount($user_id);
         if($number[0]['count'] != 1){
                Session::set('warning', $message);
                header('location:' . URL . 'admin_settings');
                exit; 
         }
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
     
     private function _get_usercount($user_id) {
         return $this->db->read("SELECT COUNT(*) as count
                                            FROM User 
                                            WHERE user_id = :user_id",
                                            [":user_id" => $user_id]);
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
