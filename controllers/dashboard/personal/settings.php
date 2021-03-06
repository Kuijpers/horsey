<?php
/**
 * Description of links
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the links page
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Settings extends DashboardController{
    
// Setting the variables    
    // The main page used for this controller
    private $pagepath = 'dashboard/personal/'; // Always provide a trailing slash ( '/' ) at the end !!!
    // The view used for this page
    private $viewpath = 'personal/'; // Always provide a trailing slash ( '/' ) at the end !!!
    // Setup needed for this page
    private $setup = 'dashboard';
    // Basic for the page title
    private $pagetitle = 'Dashboard - Personal - Settings'; // Always provide space dash space ( ' - ' ) at the end!!!
    // This is ment for the navigation to show the active status.
    public $firstactive = 'userarea';
    private $secondactive = 'personalsettings';
    private $thirdactive = '';
    private $fourthactive = '';
    
    
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    public function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            //Debug::sentence("links controller");
        //Cookie::cookie_display();die();
                
        // Custom JS files
//        $this->view->js = ['toggle.js'
//                           //, 'pietje.js'
//                          ];
//        // Custom CSS files
//        $this->view->css = ['toggle.css'
//                            //, 'pietje.css'
//                           ];
        
        // Require language files
        $this->view->language = ['language' => $_SESSION['user_language']
                                 ,'path'=> 'dashboard'
                                 ,'required_files'=>['default'
                                                     ,'cookie'
                                                     ,'session'
                                                     ,'error'
                                                     ,'navigation'
                                                        ]
            
        ];  
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
          $this->view->title = $this->pagetitle;
          $this->view->firstactive = $this->firstactive;
          $this->view->secondactive = $this->secondactive;
          $this->view->thirdactive = $this->thirdactive;
          $this->view->fourthactive = $this->fourthactive;
          $this->view->general_settings = $this->model->get_general_settings();
          $this->view->render($this->viewpath.'settings', $this->setup); 
    }
    
}


