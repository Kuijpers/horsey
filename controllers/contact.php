<?php
/**
 * Description of contact
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the contact page
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Contact extends Controller{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            Debug::sentence("contact controller");  
            
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
          $this->view->title = 'Contact';
          $this->view->topactive = 'contact';
          $this->view->render('contact/index', 'main'); 
    }
    
}