<?php
/**
 * Description of Users -> Details
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the users page to get the details of a user
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Details extends Controller{
    
// Setting the variables        
    
// The main page used for this controller
    private $pagepath = 'dashboard/users/'; // Always provide a trailing slash ( '/' ) at the end !!!
    
// The view used for this page
    private $viewpath = 'users/'; // Always provide a trailing slash ( '/' ) at the end !!!
    
// Setup needed for this page
    private $setup = 'dashboard';
    
// Basic for the page title
    private $pagetitle = 'Dashboard - Users - '; // Always provide space dash space ( ' - ' ) at the end!!!
    
// This is ment for the navigation to show the active status.
    public $firstactive = 'settings';
    private $secondactive = 'admin';
    private $thirdactive = 'users';
    private $fourthactive = '';
    
    
/**
 *  function __construct will automatically generate when method is called
 */
    
    public function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            //Debug::sentence("users controller");
        //Cookie::cookie_display();die();
                
        // Custom JS files
//        $this->view->js = ['toggle.js'
//                           //, 'pietje.js'
//                          ];
//        // Custom CSS files
//        $this->view->css = ['toggle.css'
//                            //, 'pietje.css'
//                           ];  
    }
    
    public function user($user_id) {
          $this->view->title = $this->pagetitle .'User details';
          $this->view->firstactive = $this->firstactive;
          $this->view->secondactive = $this->secondactive;
          $this->view->thirdactive = $this->thirdactive;
          $this->view->fourthactive = $this->fourthactive;
          $this->view->show_single_userdata = $this->model->show_single_userdata($user_id);
          $this->view->show_single_userstatusoverview = $this->model->show_single_userstatusoverview($user_id);
          $this->view->pagepath = $this->pagepath;
          $this->view->render($this->viewpath.'details', $this->setup);
    }    
}


