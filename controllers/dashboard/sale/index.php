<?php
/**
 * Description of for_sale
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the for_sale page
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Index extends DashboardController{
    
// Setting the variables    
    // The main page used for this controller
    private $pagepath = 'dashboard/sale/'; // Always provide a trailing slash ( '/' ) at the end !!!
    // The view used for this page
    private $viewpath = 'sale/'; // Always provide a trailing slash ( '/' ) at the end !!!
    // Setup needed for this page
    private $setup = 'dashboard';
    // Basic for the page title
    private $pagetitle = 'Dashboard - For sale'; // Always provide space dash space ( ' - ' ) at the end!!!
    // This is ment for the navigation to show the active status.
    public $firstactive = 'widgets';
    private $secondactive = 'sale';
    private $thirdactive = 'sale';
    private $fourthactive = '';
    // Breadcrumb settings
    private $breadcrumblist = [ 'NAV_DASHBOARD' => 'index',
                                'NAV_PAGES' => '',
                                'NAV_PAGES_FORSALE' => 'dashboard/sale',
                                'NAV_PAGES_FORSALE_OVERVIEW' => '',
                                ]; 
    private $breadcrumbclass = 'breadcrumb';
    private $breadcrumbactive = 'NAV_PAGES_FORSALE_OVERVIEW';
    
    
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    public function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            //Debug::sentence("for_sale controller");
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
          $this->view->arrBreadcrumb = [$this->breadcrumblist,
                                        $this->breadcrumbclass,
                                        $this->breadcrumbactive];
          $this->view->general_settings = $this->model->get_general_settings();
          $this->view->render($this->viewpath.'index', $this->setup); 
    }
    
    
    
}


