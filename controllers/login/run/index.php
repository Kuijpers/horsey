<?php
/**
 * Description of Login
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the login page
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
Class Index extends Controller{
    
// Setting the variables        
    // The main page used for this controller
    private $pagepath = 'login/'; // Always provide a trailing slash ( '/' ) at the end !!!
    // The view used for this page
    private $viewpath = 'login/'; // Always provide a trailing slash ( '/' ) at the end !!!
    // Setup needed for this page
    private $setup = 'login';
    // Basic for the page title
    private $pagetitle = 'Login'; // Always provide space dash space ( ' - ' ) at the end!!!
    // This is ment for the navigation to show the active status.
    public $firstactive = '';
    private $secondactive = '';
    private $thirdactive = '';
    private $fourthactive = '';
    
    
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            //Debug::sentence("Login controller");
            
                    
        // Custom JS files
//        $this->view->js = ['toggle.js'
//                           //, 'pietje.js'
//                          ];
//        // Custom CSS files
//        $this->view->css = ['toggle.css'
//                            //, 'pietje.css'
//                           ];
        
    }
    
    /**
     * Run the login function from the model
     */
    public function Index(){
        $this->model->Run();   
    }
}



?>