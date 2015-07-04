<?php
/**
 * Description of Users -> Update
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the users page to update users
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Update extends Controller{
    
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
        
            //Debug::sentence("users update controller");
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
/**
 *  index() Standard displayed page when entering admin_settings
 * 
 *  - title                 The title of the page
 *  - topactive             The name of the active link in the top navigation
 *  - active                The name of the active link in the side navigation
 *  - render                The page to be rendered on the website with the type of rendering
 *
 */   
    public function user($id){
          $this->view->title = $this->pagetitle .'Userupdate';
          $this->view->firstactive = $this->firstactive;
          $this->view->secondactive = $this->secondactive;
          $this->view->thirdactive = $this->thirdactive;
          $this->view->fourthactive = $this->fourthactive;
          $this->view->general_settings = $this->model->get_general_settings();
          $this->view->show_update_info = $this->model->show_update_info($id);
          $this->view->show_enum = $this->model->show_enum('Login', 'login_usertype');
          $this->view->mainpage = $this->pagepath;
          $this->view->render($this->viewpath.'update', $this->setup);
    }
    
/**
 * userrenew() Make sure data will be correctly renewed in DB
 * 
 * Check if all fields are send with POST
 * Validate the POST items
 * Prepare to be updated in the DB
 * 
 * Go to another specified page when all data is updated in DB
 */
    public function userrenew(){
        $this->_error -> Request_Method('POST');
        $this->_token -> check();
            // For debug remove slashes
                //Debug::array_list($_POST, "This is the \$_POST list");
/**
 * Get the enum options from database for comparing
 */ 
        $enum = $this->_enum('Login', 'login_usertype');
        try{
                // Validate the POST variables
             $this->_form   -> post('user_id')
                            -> val('required')
                            -> val('existingInput' , ['User',['user_id' => 'user_id']])
                        -> post('user_firstname')
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
                        -> post('login_id')
                            -> val('required')
                            -> val('existingInput' , ['Login',['login_id' => 'login_id']])
                        -> post('login_name')
                            -> val('required')
                            -> val('minlength', '3')
                            -> val('maxlength', '45')
                            -> val('uniqueInput' , ['Login',
                                                    ['login_name' => 'login_name'],
                                                    ['login_id'=>'login_id']])
                        -> post('login_usertype')
                        -> post('csrf')
                            -> val('required');
                // Remove slashes for debug          
                    //Debug::array_list($this->_form, "The form is validated");
                $this->_form ->submit();
                $data = $this->_form->fetch();
            // Remove slashes for debug
                //Debug::array_list($data, "The form has passed for further processing aka entering DB");
                if($this->model->user_update($data)){
                    $this->_session->set('succes', 'UPDATED');
                    header('location:' . URL . $this->pagepath);
                    die();
                }           
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
   
    private function _enum($table, $column){
        return $this->model->show_enum($table, $column);
    }  
}


