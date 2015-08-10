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
class Delete_Model extends DashboardModel{
    
// Class variables    
    protected $_session;
    
    /**
     *  function __construct will automatically generate when method is called
     */
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
            
        //Debug::sentence("Dashboard users index model");
        
        $this->_session = new DKW\Tracking\Session();
    }
    /**
     * 
     * @param INT $user_id ID of user that should be deleted
     */
    public function delete_user($user_id) {
            // Check if $user_id is set
            $this->_empty_id($user_id);
            // Check if $user_id is numeric
            $this->_check_int($user_id, 'GLOBAL');
            // Check if $user_id exists
            $this->_check_id($user_id, 'GLOBAL');
            // Check if $user_id has usertype owner
            $this->_check_usertype($user_id, "owner", 'OWNER_DELETE');
            // Delete user with $user_id
            if($this->_delete_user($user_id)){
                $this->_session->set('succes', 'REMOVED');
                header('location:' . URL . 'dashboard/users');
                exit;
            }
    }
    /**
     * 
     * @param INT $user_id ID of user that should be deleted
     * @return boolean If user is deleted return TRUE
     */
    private function _delete_user($user_id) {
            $sql = "User.*,  Login.*, User_status.*
                                FROM User
                                JOIN Login ON 
                                Login.login_id = User.Login_login_id
				LEFT JOIN User_status on
				User_status.Login_login_id = Login.login_id";
            $where = "User.user_id = $user_id";
            
            if($this->db->delete_multi($sql, $where)){
                return TRUE;
            }
            
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
      * We check if input is numeric so we can continue
      * @param ALL $param The value that requires to be checked
      * @param STRING $message This message will apear when check is not ok
      */
     private function _check_int($param, $message){
         if(! is_numeric($param)){
                $this->_session->set('warning', $message);
                header('location:' . URL . 'dashboard/users');
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
                $this->_session->set('warning', $message);
                header('location:' . URL . 'dashboard/users');
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
      
} // End of class
