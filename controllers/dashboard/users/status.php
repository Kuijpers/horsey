<?php
/**
 * Description of Users -> Status
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the users page to change the user status
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Status extends Controller{
    
// Setting the variables    
    
// The main page used for this controller
    private $mainpage = 'dashboard/users/'; // Always provide a trailing slash ( '/' ) at the end !!!
    
// Setup needed for this page
    private $setup = 'dashboard';
    
// Basic for the page title
    private $pagetitle = 'Dashboard - Admin settings - '; // Always provide space dash space ( ' - ' ) at the end!!!
    
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
       
// Class settings
        $this->_error = new Error();
        $this->_token = new DKW\Security\Token();
        $this->_form = new DKW\Form\Form();
        $this->_session = new DKW\Tracking\Session();
    }
    
    
        public function index(){
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
            // For debug remove slashes
               //Debug::array_list($_POST, "This is the \$_POST list");
        
                $enum = $this->enum('Login', 'login_status');
                //print_r($enum); die();
                
                try{
                       // Validate the POST variables
                    $this->_form    -> post('login_id')
                                    -> val('required')
                                    -> val('existingInput' , ['Login',['login_id' => 'login_id']])     
                                -> post('login_status')
                                    -> val('required')
                                    ->val('isInArray', $enum)
                                -> post('login_status_change')
                                    -> val('required')
                                -> post('user')
                                    -> val('required')
                                    -> val('existingInput' , ['Login',['login_id' => 'login_id']])
                                -> post('csrf')
                                    -> val('required');
                        // Remove slashes for debug          
                            //Debug::array_list($this->_form, "The form is validated");
                        $this->_form  ->submit();
                        $data = $this->_form ->fetch();
                    // Remove slashes for debug
                        //Debug::array_list($data, "The form has passed for further processing aka entering DB");
                    if($this->model->user_update_status($data)){
                        $this->_session->set('succes', 'Status is changed succesfully !!');
                        header('location:' . URL . $this->mainpage);
                        die();
                    }
                } catch (Exception $error) {
                    echo $error->getMessage();
                }
    }
    
    
    private function enum($table, $column){
        return $this->model->show_enum($table, $column);
    }
 } //End of class


