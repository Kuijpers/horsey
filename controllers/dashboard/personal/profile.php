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
class Profile extends DashboardController{
    
// Setting the variables    
    // The main page used for this controller
    private $pagepath = 'dashboard/personal/profile/'; // Always provide a trailing slash ( '/' ) at the end !!!
    // The view used for this page
    private $viewpath = 'personal/'; // Always provide a trailing slash ( '/' ) at the end !!!
    // Setup needed for this page
    private $setup = 'dashboard';
    // Basic for the page title
    private $pagetitle = 'Dashboard - Personal - Profile'; // Always provide space dash space ( ' - ' ) at the end!!!
    // This is ment for the navigation to show the active status.
    public $firstactive = 'userarea';
    private $secondactive = 'personalprofile';
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
                                                     ,'personal'
                                                        ]
            
        ]; 
        
               
// Class settings
        $this->_error = new Error();
        $this->_token = new DKW\Security\Token();
        $this->_form = new DKW\Form\Form();
        $this->_session = new DKW\Tracking\Session();
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
          $this->view->pagepath = $this->pagepath;
          $this->view->general_settings = $this->model->get_general_settings();
          $this->view->user_details = $this->model->get_user_details($_SESSION['user_id']);
          $this->view->render($this->viewpath.'profile', $this->setup); 
    }
    
    
    public function edit_registration(){
          $this->view->title = $this->pagetitle;
          $this->view->firstactive = $this->firstactive;
          $this->view->secondactive = $this->secondactive;
          $this->view->thirdactive = $this->thirdactive;
          $this->view->fourthactive = $this->fourthactive;
          $this->view->pagepath = $this->pagepath;
          $this->view->general_settings = $this->model->get_general_settings();
          $this->view->user_details = $this->model->get_user_details($_SESSION['user_id']);
          $this->view->render($this->viewpath.'profile_edit_registration', $this->setup); 
    }
    
    public function edit_username(){
          $this->view->title = $this->pagetitle;
          $this->view->firstactive = $this->firstactive;
          $this->view->secondactive = $this->secondactive;
          $this->view->thirdactive = $this->thirdactive;
          $this->view->fourthactive = $this->fourthactive;
          $this->view->pagepath = $this->pagepath;
          $this->view->general_settings = $this->model->get_general_settings();
          $this->view->user_details = $this->model->get_user_details($_SESSION['user_id']);
          $this->view->render($this->viewpath.'profile_edit_username', $this->setup); 
    }
    
    public function update_registration(){
        //echo "<pre>";print_r($_POST);echo "</pre>";
        
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
        
         try{
                // Validate the POST variables
             $this->_form   -> post('user_firstname')
                                -> val('required')
                                -> val('minlength', '3')
                                -> val('maxlength', '45')
                            -> post('user_lastname')
                                -> val('required')
                                -> val('minlength', '3')
                                -> val('maxlength', '45')
                            -> post('user_adress')
                                -> val('required')
                                -> val('minlength', '6')
                                -> val('maxlength', '45')
                            -> post('user_postcode')
                                -> val('required')
                                -> val('minlength', '3')
                                -> val('maxlength', '45')
                            -> post('user_city')
                                -> val('required')
                                -> val('minlength', '3')
                                -> val('maxlength', '45')
                            -> post('user_state')
                            -> post('user_country')
                                -> val('required')
                                -> val('minlength', '3')
                                -> val('maxlength', '45')
                            -> post('user_telephone')
                                -> val('required')
                                -> val('minlength', '6')
                                -> val('maxlength', '45')
                            -> post('user_email')
                                -> val('required')
                                -> val('minlength', '6')
                                -> val('maxlength', '100')
                                -> val('emailcheck')
                            -> post('csrf')
                                -> val('required');
                // Remove slashes for debug          
                    //Debug::array_list($this->_form, "The form is validated");
                $this->_form ->submit();
                $data = $this->_form->fetch();
            // Remove slashes for debug
                //Debug::array_list($data, "The form has passed for further processing aka entering DB");
                if($this->model->user_update($data)){
                    $this->_session->set('succes', 'UPDATED_REGISTRATION');
                    header('location:' . URL . $this->pagepath);
                    die();
                }           
        } catch (Exception $error) {
            echo $error->getMessage();
        }
        
    }
    
    public function update_username(){
        echo "<pre>";print_r($_POST);echo "</pre>";
        
        echo "<pre>";print_r($_SESSION);echo "</pre>";
        
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
        
        
    }
    
}


