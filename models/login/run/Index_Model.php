<?php
/**
 * Description of Login_Model
 * 
 * This class is an extension of the Model class
 * Within this class we handle the data needed for the dashboard main page
 * 
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Index_Model extends Model{
    
    
        
    
// Class variables
    protected $_error;
    protected $_token;
    protected $_hash;
    protected $_session;
    protected $_cookie;
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    function __construct(){
        parent::__construct();
            
        //Debug::sentence("login model");
        
                
// Class settings
        $this->_error   = new Error();
        $this->_token   = new DKW\Security\Token();
        $this->_hash    = new DKW\Security\Hash();
        $this->_session = new DKW\Tracking\Session();
        $this->_cookie  = new DKW\Tracking\Cookie();
                
        // Generate hashkeys to use
            //echo Hash::create('SHA256', 'welkom', HASH_PW_KEY);die();
    }
    
    /**
     * Check if user password and accountnumber exist and after that log in
     * If they don't exist redirect them and don't let them log in.
     * 
     * @todo Create a system to count the number of unvalid login attempts to avoid bruteforce attempts
     * 
     */
    public function Run(){
        // For debug remove slashes
            //print_r($_POST);die();
        
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
        
        /**
         * Check DB to see if loginname and password exist
         */
        $query =    "SELECT * ,
                    COUNT(*) AS 'count'
                    FROM Login 
                    WHERE login_name = :loginname 
                    AND login_password = :password"; 
        
        $array = [ ':loginname' => $_POST['loginname'],
                  ':password' => $this->_hash->create('SHA256', $_POST['password'], HASH_PW_KEY)];
        // Get the information
        $data = $this->db->read($query, $array);
        
        // For debug remove slashes
            //echo "<pre>";print_r($data);echo "</pre>";echo $data[0]['login_verification'];die();
        
        /**
         * Check if only 1 row exists and if the account has been verified
         * If this is correct create cookie or session depending on the config settings
         * After that redirect to dashboard page
         * 
         * If not correct redirect back to login page. 
         */
            
        // For debug remove slashes 
            //echo "<pre>";print_r($data);echo "</pre>"; die();
        
        
        if($data[0]['count'] == 1 && $data[0]['login_verified'] == "1"){
            // For debug remove slashes
                //echo "Login succesfull. Create session or cookie"; die();
            
                if(isset($_POST['remember']) && $_POST['remember']=='TRUE'){
                    //echo "Set long time"; die();
                    $this->_cookie->cookie_set(COOKIE_LOG_NAME, $data[0]['login_id'],'Lifetime');
                }else{
                    //echo "Set shorttime"; die();
                    $this->_cookie->cookie_set(COOKIE_LOG_NAME, $data[0]['login_id'],'Session');
                }
            header('location:'. URL .'dashboard');
            
        }
        elseif($data[0]['count'] == 1 && $data[0]['login_verified'] == "0"){
            // For debug remove slashes
                //echo "Login not succesfull. Please try to login again"; die();
            $message=" Dit account is nog niet gevalideerd.";
            
            $this->_session->set('error', $message);
            
            header('location:'. URL .'login');
            
        }
        else{
            // For debug remove slashes
                //echo "Login not succesfull. Please try to login again"; die();
            $message=" Log in is niet succesvol. Probeer het opnieuw.";
            
            $this->_session->set('error', $message);
            
            header('location:'. URL .'login');
            
        }
    }
} // End of class
