<?php
/**
 * Description of Profile_Model
 * 
 * This class is an extension of the Model class
 * Within this class we handle the data needed for the Links page
 * 
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Profile_Model extends Model{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    public function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
            
        //Debug::sentence("Links model");
    }
    
    public function get_user_details($user_id){
        $details = [];
        // Get all basic details from table USER
        $details = array_merge($details,$this->_get_basic_details($user_id));
        // Get all login details from LOGIN
        $details = array_merge($details, $this->_get_login_details($details['user_details'][0]['Login_login_id']));
        // Get all status details from USER_STATUS
        $details = array_merge($details, $this->_get_status_details($details['user_details'][0]['Login_login_id']));
        
        return $details;
    }
    
    /*
     * 
     */
    private function _get_basic_details($user_id){
        $user_details = ['user_details'];
        $user_details['user_details'] = $this->db->read('SELECT * FROM User WHERE user_id = :id',[':id'=>$user_id]);
        return $user_details;        
    }
    
    /*
     * 
     */
    private function _get_login_details($login_id){
        $login_info = ['login_info'];
        $login_info['login_info'] = $this->db->read('SELECT * FROM Login WHERE login_id = :login_id',[':login_id'=>$login_id]);
        return $login_info;
    }
    
    /*
     * 
     */
    private function _get_status_details($login_id){
        $status = ['status_overview'];
        $status['status_overview'] =  $this->db->read('SELECT * FROM User_status WHERE Login_login_id = :login_id',[':login_id'=>$login_id]);
        return $status;
    }
    
}


