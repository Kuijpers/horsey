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
class Newuser_Model extends DashboardModel{
        
    
// Class variables
    protected $_error;
    protected $_token;
    protected $_sanit;
    protected $_hash;
    protected $_session;
    
// Other
    protected $_error_message = "Something went wrong with the verification. Please try again.";

/**
 *  function __construct will automatically generate when method is called
 */
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
            
        //Debug::sentence("Dashboard verify newuser model");
        
// Class settings
        $this->_error = new Error();
        $this->_token = new DKW\Security\Token();
        $this->_sanit = new DKW\Security\Sanitize();
        $this->_hash = new DKW\Security\Hash();
        $this->_session = new DKW\Tracking\Session();
    }

/*
 * We start here with checking verification number before we handle the verification
 */
    public function exists($verificationnumber){
        
        $this->_available($verificationnumber);
        
        $this->_exists($verificationnumber);
        
        $this->_session->set('verificationnumber', $verificationnumber);
        
        header('Location:'.URL.'dashboard/verification/newuser/email/');
        
    }
    
/**
 * Now we check if email belongs to the verificationnumber
 */
    
    public function compare(){
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
        
        // Check if verificationumber and email match in DB
        
        $verificationnumber = $_SESSION['verificationnumber'];
        $email = $this->_sanit->escape($_POST['email']);
        
        $count = $this->db->read("SELECT COUNT(Login.login_verification) as count, 
                                    Login.login_verification, 
                                    Login.login_verified, 
                                    User.user_email
                                    
                                    FROM Login
                                    JOIN User ON 
                                    Login.login_verification = :vernumber
                                    AND
                                    Login.login_verified = 0
                                    AND
                                    User.user_email = :email",
                                [":vernumber" => $verificationnumber,
                                 ":email" => $email]);
        if($count[0]['count'] != 1){
            $this->_session->set('error', $this->_error_message);
            header('Location:'.URL.'error');
            die();
        }
        return TRUE;  
    }

 /**
  * Update database with Password
  */  
    public function update($data){
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
        
        // Remove slashes for debug
            //Debug::array_list($data, "We can now enter the following data in DB :");       
        
        $password = $this->_hash->create('SHA256', $data['pw1'], HASH_PW_KEY);
        $verified = 1;
        $status = 'active';
        $verification = $_SESSION['verificationnumber'];
        
        $result = $this->db->read("SELECT login_id FROM Login 
                                    WHERE 
                                login_verification = :vernumber",
                                [":vernumber" => $verification]);
        
        $this->db->update('Login', [    'login_password' => $password,
                                        'login_verified' => $verified,
                                        'login_status'=> $status],
                                          'login_id='. $result[0]['login_id']
                                        );
            $this->_session->delete('verificationnumber');
            
        $this->db->create('User_status', [
                                            'user_status_previous'=>'first',
                                            'user_status_new'=>'active',
                                            'user_status_reason'=>'Activated account',
                                            'user_status_who'=>'1',
                                            'user_status_date' => date('Y-m-d'),
                                            'user_status_time' => date('H:i:s'),
                                            'Login_login_id'=> $result[0]['login_id']
                                        ]);

            return TRUE;
    }
    
    
    // Check if verificationnumber is available. If not redirect to errorpage.
    private function _available($verificationnumber){
        if(empty($verificationnumber)){
            $this->_session->set('error', $this->_error_message);
            header('Location:'.URL.'error');
            die();
        }
        return TRUE;
    }
    // Check if verificationnumber exists and account isn't verified.
    // If not redirect to errorpage
    
    private function _exists($verificationnumber){
        $count = $this->db->read("SELECT count(*) as count FROM Login 
                                    WHERE 
                                login_verified = 0
                                and 
                                login_verification = :vernumber",
                                [":vernumber" => $verificationnumber]);
        if($count[0]['count'] != 1){
            $this->_session->set('error', $this->_error_message);
            header('Location:'.URL.'error');
            die();
        }
        return TRUE;
    }

    // Add to database
    
    private function _update_db($data){
        $password = $this->_hash->create('SHA256', $data['pw1'], HASH_PW_KEY);
        $verified = 1;
        $status = 'active';
        $verification = $_SESSION['verificationnumber'];
        
        $this->db->update('Login', [    'login_password' => $password,
                                        'login_verified' => $verified,
                                        'login_status'=> $status],
                                          'login_verification = '. $verification .''
                                        );
        return TRUE;
    }
    
    
} // End of class
