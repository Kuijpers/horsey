<?php
/**
 * Description of Users -> Add
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the users page to add users
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Add extends DashboardController{
    
// Setting the variables    
    
// The main page used for this controller
    private $pagepath = 'dashboard/users/'; // Always provide a trailing slash ( '/' ) at the end !!!
    
// The view used for this page
    private $viewpath = 'users/'; // Always provide a trailing slash ( '/' ) at the end !!!
    
// Setup needed for this page
    private $setup = 'dashboard';
    
// Basic for the page title
    private $pagetitle = 'Dashboard - Admin settings - '; // Always provide space dash space ( ' - ' ) at the end!!!
    
// This is ment for the navigation to show the active status.
    private $firstactive = 'settings';
    private $secondactive = 'admin';
    private $thirdactive = 'users';
    private $fourthactive = '';
    // Breadcrumb settings
    private $breadcrumblist = [ 'NAV_DASHBOARD' => 'index',
                                'NAV_SETTINGS' => '',
                                'NAV_SETTINGS_ADMIN' => 'dashboard/admin',
                                'NAV_SETTINGS_ADMIN_USERS' => 'dashboard/users',
                                'NAV_SETTINGS_ADMIN_ADDUSER' => '',
                                ]; 
    private $breadcrumbclass = 'breadcrumb';
    private $breadcrumbactive = 'NAV_SETTINGS_ADMIN_ADDUSER';
    
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
//                           , 'pietje.js'
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
                                                     ,'mail'
                                                     ,'users']
            
        ];
       
// Class settings
        $this->_error = new Error();
        $this->_token = new DKW\Security\Token();
        $this->_form = new DKW\Form\Form();
        $this->_session = new DKW\Tracking\Session();
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
    public function index(){
          $this->view->title = $this->pagetitle .'User Add';
          $this->view->firstactive = $this->firstactive;
          $this->view->secondactive = $this->secondactive;
          $this->view->thirdactive = $this->thirdactive;
          $this->view->fourthactive = $this->fourthactive;
          $this->view->arrBreadcrumb = [$this->breadcrumblist,
                                        $this->breadcrumbclass,
                                        $this->breadcrumbactive];
          $this->view->general_settings = $this->model->get_general_settings();
          $this->view->show_enum = $this->model->show_enum('Login', 'login_usertype');
          $this->view->pagepath = $this->pagepath;
          $this->view->render($this->viewpath.'add', $this->setup);
    }
    
    private function _enum($table, $column){
        return $this->model->show_enum($table, $column);
    }    

    public function usercreate(){
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
            // For debug remove slashes
                //Debug::array_list($_POST, "This is the \$_POST list");
        $enum = $this->_enum('Login', 'login_usertype');
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
                        -> post('login_name')
                            -> val('required')
                            -> val('minlength', '3')
                            -> val('maxlength', '45')
                            -> val('uniqueInput' , ['Login',
                                                    ['login_name' => 'login_name']])
                        -> post('login_usertype')
                        -> post('csrf')
                            -> val('required');
                // Remove slashes for debug          
                    //Debug::array_list($this->_form, "The form is validated");
                $this->_form ->submit();
                $data = $this->_form->fetch();
            // Remove slashes for debug
                //Debug::array_list($data, "The form has passed for further processing aka entering DB");
                if($this->model->user_create($data)){
                    $this->_session->set('succes', 'ADDED');
                    header('location:' . URL . $this->pagepath);
                    die();
                }           
        } catch (Exception $error) {
            echo $error->getMessage();
        }     
    }
      
} // End if class


