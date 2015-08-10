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
class Details_Model extends DashboardModel{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
            
        //Debug::sentence("Dashboard users index model");
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
    
    
} // End of class
