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
class Index_Model extends DashboardModel{
    
/**
 *  function __construct will automatically generate when method is called
 */
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
            
        //Debug::sentence("Dashboard users index model");
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
* @return Array Information requested from the database
*/
    private function _get_users(){
        return $this->db->read("SELECT 	User.*,  Login.*
                                FROM User
                                JOIN Login ON 
                                Login.login_id = User.Login_login_id
                                ORDER BY User.user_lastname ASC");
    }  
} // End of class
