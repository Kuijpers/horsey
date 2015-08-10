<?php
/**
 * Description of Users _Delete
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the users page to delete a singel user
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Delete extends DashboardController{    
    
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
        
        // Require language files
        $this->view->language = ['language' => $_SESSION['user_language']
                                 ,'path'=> 'dashboard'
                                 ,'required_files'=>['default'
                                                     ,'cookie'
                                                     ,'session'
                                                     ,'error'
                                                     ,'navigation'
                                                     ,'users']
            
        ];
    }
    
    public function user($user_id) {
          $this->view->delete_user = $this->model->delete_user($user_id);
    }   
}


