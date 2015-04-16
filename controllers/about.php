<?php
/**
 * Description of about
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the about page
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class About extends Controller{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            Debug::sentence("about controller");
            
                    
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
     *  index()
     * 
     *  - title         The title of the page
     *  - topactive     The name of the active link in the top navigation
     *  - active        The name of the active link in the side navigation
     *  - render        The page to be rendered on the website with the type of rendering
     *
     */
    
    function index(){
          $this->view->title = 'About us';
          $this->view->topactive = 'about';
          $this->view->render('about/index', 'main'); 
    }
    
}