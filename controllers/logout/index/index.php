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
class Index extends Controller{
    
    
        
    
// Class variables
    protected $_session;
    protected $_cookie;
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    public function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            //Debug::sentence("logout controller");
        
                
// Class settings
        $this->_session = new DKW\Tracking\Session();
        $this->_cookie = new DKW\Tracking\Cookie();
        
        /**
         * Check if user is already logged in with cookie or session.
         * If so delete cookie or session and redirect
         */        
        
             if($this->_cookie->cookie_exists(COOKIE_LOG_NAME)){
                        $this->_cookie->cookie_delete(COOKIE_LOG_NAME);
                        $this->_session->destroy();
                header('location:'.URL.'index');
                exit;
                }
              else{
                header('location:'.URL.'index');
                exit;
              }
        
                                  
        // Custom JS files
//        $this->view->js = ['toggle.js'
//                           //, 'pietje.js'
//                          ];
//        // Custom CSS files
//        $this->view->css = ['toggle.css'
//                            //, 'pietje.css'
//                           ];
    
    }
    
    
    
    
}   // End of class


?>