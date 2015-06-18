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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**
     *  index() Standard displayed page when entering admin_settings
     * 
     *  - title                 The title of the page
     *  - topactive             The name of the active link in the top navigation
     *  - active                The name of the active link in the side navigation
     *  - render                The page to be rendered on the website with the type of rendering
     *
     */
//    public function index(){
//          $this->view->title = $this->pagetitle .'Users';
//          $this->view->firstactive = $this->firstactive;
//          $this->view->secondactive = $this->secondactive;
//          $this->view->thirdactive = $this->thirdactive;
//          $this->view->fourthactive = $this->fourthactive;
//          $this->view->show_usersdata = $this->model->show_usersdata();
//          $this->view->mainpage = $this->mainpage;
//          $this->view->render($this->mainpage.'index', $this->setup);
//    }
    
//    public function useradd(){
//          $this->view->title = $this->pagetitle .'User Add';
//          $this->view->firstactive = $this->firstactive;
//          $this->view->secondactive = $this->secondactive;
//          $this->view->thirdactive = $this->thirdactive;
//          $this->view->fourthactive = $this->fourthactive;
//          $this->view->show_enum = $this->model->show_enum('Login', 'login_usertype');
//          $this->view->mainpage = $this->mainpage;
//          $this->view->render($this->mainpage.'useradd', $this->setup);
//    }
    
//    public function usercreate(){
//        Error::Request_Method('POST');
//        Token::check();
//            // For debug remove slashes
//                //Debug::array_list($_POST, "This is the \$_POST list");
//        $enum = $this->enum('Login', 'login_usertype');
//        try{
//            $form = new Form;
//                // Validate the POST variables
//                $form   -> post('user_firstname')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                        -> post('user_lastname')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                        -> post('user_adress')
//                            -> val('required')
//                            -> val('minlength', '6')
//                            -> val('maxlength', '45')
//                        -> post('user_postcode')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                        -> post('user_city')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                        -> post('user_state')
//                        -> post('user_country')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                        -> post('user_telephone')
//                            -> val('required')
//                            -> val('minlength', '6')
//                            -> val('maxlength', '45')
//                        -> post('user_email')
//                            -> val('required')
//                            -> val('minlength', '6')
//                            -> val('maxlength', '100')
//                            -> val('emailcheck')
//                        -> post('login_name')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                            -> val('uniqueInput' , ['Login',
//                                                    ['login_name' => 'login_name']])
//                        -> post('login_usertype')
//                        -> post('csrf')
//                            -> val('required');
//                // Remove slashes for debug          
//                    //Debug::array_list($form, "The form is validated");
//                $form ->submit();
//                $data = $form->fetch();
//            // Remove slashes for debug
//                //Debug::array_list($data, "The form has passed for further processing aka entering DB");
//                if($this->model->user_create($data)){
//                    Session::set('succes', 'User is added succesfully !!');
//                    header('location:' . URL . $this->mainpage);
//                    die();
//                }           
//        } catch (Exception $error) {
//            echo $error->getMessage();
//        }     
//    }
    
//    public function userdetails($user_id) {
//          $this->view->title = $this->pagetitle .'User info';
//          $this->view->firstactive = $this->firstactive;
//          $this->view->secondactive = $this->secondactive;
//          $this->view->thirdactive = $this->thirdactive;
//          $this->view->fourthactive = $this->fourthactive;
//          $this->view->show_single_userdata = $this->model->show_single_userdata($user_id);
//          $this->view->show_single_userstatusoverview = $this->model->show_single_userstatusoverview($user_id);
//          $this->view->mainpage = $this->mainpage;
//          $this->view->render($this->mainpage.'userinfo', $this->setup);
//    }
    /**
     *  userupdate() Standard displayed page used to update a user
     * 
     *  - title                 The title of the page
     *  - topactive             The name of the active link in the top navigation
     *  - active                The name of the active link in the side navigation
     *  - show_single_userdata  The information gathered from DB for the requested user
     *  - show_enum             The options that are set in an ENUM column
     *  - render                The page to be rendered on the website with the type of rendering
     *
     */
//    public function userupdate($id){
//          $this->view->title = $this->pagetitle .'Userupdate';
//          $this->view->firstactive = $this->firstactive;
//          $this->view->secondactive = $this->secondactive;
//          $this->view->thirdactive = $this->thirdactive;
//          $this->view->fourthactive = $this->fourthactive;
//          $this->view->show_update_info = $this->model->show_update_info($id);
//          $this->view->show_enum = $this->model->show_enum('Login', 'login_usertype');
//          $this->view->mainpage = $this->mainpage;
//          $this->view->render($this->mainpage.'userupdate', $this->setup); 
//    }
    /**
     * userrenew() Make sure data will be correctly renewed in DB
     * 
     * Check if all fields are send with POST
     * Validate the POST items
     * Prepare to be updated in the DB
     * 
     * Go to another specified page when all data is updated in DB
     */
//    public function userrenew(){
//        Error::Request_Method('POST');
//        Token::check();
//            // For debug remove slashes
//                //Debug::array_list($_POST, "This is the \$_POST list");
//        /**
//         * Get the enum options from database for comparing
//         */ 
//        $enum = $this->enum('Login', 'login_usertype');
//        try{
//            $form = new Form;
//                // Validate the POST variables
//                $form   -> post('user_id')
//                            -> val('required')
//                            -> val('existingInput' , ['User',['user_id' => 'user_id']])
//                        -> post('user_firstname')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                        -> post('user_lastname')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                        -> post('user_adress')
//                            -> val('required')
//                            -> val('minlength', '6')
//                            -> val('maxlength', '45')
//                        -> post('user_postcode')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                        -> post('user_city')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                        -> post('user_state')
//                        -> post('user_country')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                        -> post('user_telephone')
//                            -> val('required')
//                            -> val('minlength', '6')
//                            -> val('maxlength', '45')
//                        -> post('user_email')
//                            -> val('required')
//                            -> val('minlength', '6')
//                            -> val('maxlength', '100')
//                            -> val('emailcheck')
//                        -> post('login_id')
//                            -> val('required')
//                            -> val('existingInput' , ['Login',['login_id' => 'login_id']])
//                        -> post('login_name')
//                            -> val('required')
//                            -> val('minlength', '3')
//                            -> val('maxlength', '45')
//                            -> val('uniqueInput' , ['Login',
//                                                    ['login_name' => 'login_name'],
//                                                    ['login_id'=>'login_id']])
//                        -> post('login_usertype')
//                        -> post('csrf')
//                            -> val('required');
//                // Remove slashes for debug          
//                    //Debug::array_list($form, "The form is validated");
//                $form ->submit();
//                $data = $form->fetch();
//            // Remove slashes for debug
//                //Debug::array_list($data, "The form has passed for further processing aka entering DB");
//                if($this->model->user_update($data)){
//                    Session::set('succes', 'Update is executed succesfully !!');
//                    header('location:' . URL . $this->mainpage);
//                    die();
//                }           
//        } catch (Exception $error) {
//            echo $error->getMessage();
//        }
//    }
    

    
//    public function userdelete($user_id) {
//          $this->view->delete_user = $this->model->delete_user($user_id);
//    }
    
    
    
}


