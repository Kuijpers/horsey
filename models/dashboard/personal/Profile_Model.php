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
class Profile_Model extends DashboardModel{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    public function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
            
        //Debug::sentence("Links model");
                
               
// Class settings
        $this->_error = new Error();
        $this->_token = new DKW\Security\Token();
        $this->_sanit = new DKW\Security\Sanitize();
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
     *  Update userprofile 
     */
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
                                          'user_id ='. $_SESSION['user_id']
                                        );
            return TRUE;
    }    
    /*
     * Update username
     */
    public function username_update($data){
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
        
        // Remove slashes for debug
            Debug::array_list($data, "We can now enter the following data in DB :");
            
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


