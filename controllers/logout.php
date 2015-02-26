<?php
/**
 * Description of Logout
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the logout page
 * 
 * This is a private page. Login is required otherwise there is no need to logout.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Logout extends Controller{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    public function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            //Debug::sentence("logout controller");
        
        /**
         * Check if user is already logged in with cookie or session.
         * If so delete cookie or session and redirect
         */        
        
             if(Cookie::cookie_exists(COOKIE_LOG_NAME)){
                        Cookie::cookie_delete(COOKIE_LOG_NAME);
                        Session::init();
                        Session::destroy();
                header('location:'.URL.'index');
                exit;
                }
              else{
                header('location:'.URL.'index');
                exit;
              }
        
    }
    
    
    
    
}   // End of class


?>