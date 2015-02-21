<?php
/**
 * Description of contact_settings
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the contact_settings page
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Contact_settings extends Controller{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    public function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            Debug::sentence("contact_settings controller");
        //Cookie::cookie_display();die();
        
        /**
         * Check if user is already logged in. If not redirect to loginpage.
         *
         */
        
        Logged::check_logged();
        
            
        
    }
    
    /**
     *  index()
     * 
     *  - title         The title of the page
     *  - topactive     The name of the active link in the top navigation
     *  - active        The name of the active link in the side navigation
     *  - render        The page to be rendered on the website with the type of rendering
     *
     */
    
    public function index(){
          $this->view->title = 'Dashboard - Contact settings';
          $this->view->topactive = 'dashboard';
          $this->view->active = 'dashboard';
          $this->view->render('contact_settings/index', 'dashboard'); 
    }
    
}

