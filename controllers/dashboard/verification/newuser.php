<?php
/**
 * Description of Users
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the users page
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Newuser extends Controller{
    
// Setting the variables    
    
    // The main page used for this controller
        private $pagepath = 'dashboard/verification/'; // Always provide a trailing slash ( '/' ) at the end !!!

    // The view used for this page
        private $viewpath = 'verification/'; // Always provide a trailing slash ( '/' ) at the end !!!

    // Setup needed for this page
        private $setup = 'verify';

    // Basic for the page title
        private $pagetitle = 'Dashboard - Users - '; // Always provide space dash space ( ' - ' ) at the end!!!

    // This is ment for the navigation to show the active status.
        public $firstactive = 'settings';
        private $secondactive = 'admin';
        private $thirdactive = 'users';
        private $fourthactive = '';
        
    // Class variables
        protected $_error;
        protected $_token;
        protected $_form;
        protected $_session;
        protected $_logged;
    
    
/**
 *  function __construct will automatically generate when method is called
 */
    
    public function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            //Debug::sentence("users index controller");
        //Cookie::cookie_display();die();
                
        // Custom JS files
//        $this->view->js = ['toggle.js'
//                           //, 'pietje.js'
//                          ];
//        // Custom CSS files
//        $this->view->css = ['toggle.css'
//                            //, 'pietje.css'
//                           ];  

// Class settings
        $this->_error = new Error();
        $this->_token = new DKW\Security\Token();
        $this->_form = new DKW\Form\Form();
        $this->_session = new DKW\Tracking\Session();
        $this->_logged = new DKW\Tracking\Logged();
        
        
        if($this->_logged->status_logged()){
            echo header('location:' . URL . 'dashboard');;
        }
    }
/**
 *  index() Standard displayed page when entering admin_settings
 * 
 *  - title                 The title of the page
 *  - topactive             The name of the active link in the top navigation
 *  - active                The name of the active link in the side navigation
 *  - render                The page to be rendered on the website with the type of rendering
 *
 */
    public function check($verificationnumber){
          // First check if exists
          $this->model->exists($verificationnumber);
    }
    
    public function email(){
          // Continue
          $this->view->title = $this->pagetitle .'Verification';
          $this->view->firstactive = $this->firstactive;
          $this->view->secondactive = $this->secondactive;
          $this->view->thirdactive = $this->thirdactive;
          $this->view->fourthactive = $this->fourthactive;
          $this->view->pagepath = $this->pagepath;
          $this->view->render($this->viewpath.'index', $this->setup);
        
    }
    
    public function password(){
          // Check if email and verification number compare in DB
          $this->model->compare();
          // Continue
          $this->view->title = $this->pagetitle .'Verification';
          $this->view->firstactive = $this->firstactive;
          $this->view->secondactive = $this->secondactive;
          $this->view->thirdactive = $this->thirdactive;
          $this->view->fourthactive = $this->fourthactive;
          $this->view->pagepath = $this->pagepath;
          $this->view->render($this->viewpath.'password', $this->setup);
    }
    
    public function update(){
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
            // For debug remove slashes
                //Debug::array_list($_POST, "This is the \$_POST list");
        
        try{
                // Validate the POST variables
             $this->_form   -> post('pw1')
                            -> val('required')
                        -> post('pw2')
                            -> val('required')
                            -> val('minlength', '3')
                            -> val('maxlength', '45')
                            -> val('equal', 'pw1')
                        -> post('csrf')
                            -> val('required');
                // Remove slashes for debug          
                    //Debug::array_list($this->_form, "The form is validated");
                $this->_form ->submit();
                $data = $this->_form->fetch();
            // Remove slashes for debug
                //Debug::array_list($data, "The form has passed for further processing aka entering DB");
                if($this->model->update($data)){
                    $this->_session->set('succes', 'Update is executed succesfully !! <br /> <br />You can now login.');
                    header('location:' . URL . 'login');
                    die();
                }           
        } catch (Exception $error) {
            echo $error->getMessage();
        }
        
        
        
        
        
    }
}


