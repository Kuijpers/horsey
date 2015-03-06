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
class Login_Model extends Model{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    function __construct(){
        parent::__construct();
            
        //Debug::sentence("login model");
        
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
            //print_r($_POST);Session::display();die();
        /**
         * @todo redirect naar een error pagina met daarbij een DB registratie
         */
        
        if(!Token::check()){
            echo "iets gaat fout";
            die();
        }
        /**
         * Check DB to see if loginname, password and account exist
         */
        $query =    "SELECT *
                    FROM Login 
                    WHERE login_name = :loginname 
                    AND login_password = :password";
        // For debug remove slashes
            //echo $query;die();
        $sth = $this->db->prepare($query);  
        
        $sth->execute([ ':loginname' => $_POST['loginname'],
                        ':password' => Hash::create('SHA256', $_POST['password'], HASH_PW_KEY)]);
        // Get the information
        $data = $sth->fetch();
        
        // For debug remove slashes
            //echo "<pre>";print_r($data);echo "</pre>";echo $data['login_verification'];die();
            
        // Count the rows that are fetched
        $count = $sth->rowCount();
        
        // For debug remove slashes
            //echo $count; die();
        
        /**
         * Check if only 1 row exists and if the account has been verified
         * If this is correct create cookie or session depending on the config settings
         * After that redirect to dashboard page
         * 
         * If not correct redirect back to login page. 
         */
            
        // For debug remove slashes 
            //echo "<pre>";print_r($data);echo "</pre>"; die();
        
        
        if($count == 1 && $data['login_verification'] == "0"){
            // For debug remove slashes
                //echo "Login succesfull. Create session or cookie"; die();
            
                if(isset($_POST['remember']) && $_POST['remember']=='TRUE'){
                    //echo "Set long time"; die();
                    Cookie::cookie_set(COOKIE_LOG_NAME, $data['login_id'],Cookie::Lifetime);
                    Session::set('login_id', $data['login_id']);
                }else{
                    //echo "Set shorttime"; die();
                    Cookie::cookie_set(COOKIE_LOG_NAME, $data['login_id'],Cookie::Session);
                    Session::set('login_id', $data['login_id']);
                }
            
            
            
            header('location:'. URL .'dashboard');
            
        }
        elseif($count == 1 && $data['login_verification'] != "0"){
            // For debug remove slashes
                //echo "Login not succesfull. Please try to login again"; die();
           header('location:'. URL .'login/error/LE1001');
            
        }
        else{
            // For debug remove slashes
                //echo "Login not succesfull. Please try to login again"; die();
            header('location:'. URL .'login/error/LE1002');
            
        }
    }
    
    public function error_call($error_call){
        
        $error = new Error();
        
        return $error->display_error($error_call);
        
    }
} // End of class
