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
class Admin_settings_Model extends Model{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
            
        //Debug::sentence("Admin_settings model");
    }
    
    public function create($data){
        Error::Request_Method('POST');
        Token::check();
        
        // Remove slashes for debug
        Debug::array_list($data, "We can now enter the data in DB");
        
    }
    
    public function update($data){
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
    /**
    * 
    * @return array All userinformation
     */    
    public function show_usersdata(){
        return $this->_get_users();
    }
    /**
     * Get all information about a single given user
     * @param INT $id ID for the given user
     * First check if empty
     * Check if returned array is empty
     * @return ARRAY All information from database about the given user
     */
    public function show_single_userdata($id){
            $this->_empty_id($id);
            return $this->_check_emptyarray($this->_get_single_user(intval($id)));
    }
    /**
     * 
     * @return ARRAY All ENUM options for given table/column
     */
    public function show_enum(){
       return $this->_get_enum(); 
    }
    /**
     * 
     * @return Array Information requested from the database
     */
    private function _get_users(){
        return $this->db->read("SELECT 	User.*,  Login.*
                                FROM User
                                JOIN Login ON 
                                Login.login_id = User.Login_login_id");
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
     * 
     * @return ARRAY All ENUM options, for this table/column,  in an array
     */
    private function _get_enum(){
    return $this->_extract_enum( $this->_get_enumdata() );
     }
     /**
      * Get the deafault settings for the ENUM table
      * @return ARRAY all default settings
      */
     private function _get_enumdata(){
         return $this->db->read("SELECT COLUMN_TYPE 
                                FROM INFORMATION_SCHEMA.COLUMNS
                                WHERE TABLE_NAME = :table_name 
                                AND COLUMN_NAME = :column_name",
                                [":table_name"  =>  'Login',
                                 ":column_name" =>  'login_usertype']);
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
