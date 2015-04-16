<?php
/**
 * Description of admin_settings
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the admin_settings page
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Admin_settings extends Controller{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    public function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            //Debug::sentence("admin_settings controller");
        //Cookie::cookie_display();die();
        
        /**
         * Check if user is already logged in. If not redirect to loginpage.
         *
         */
        Logged::check_logged(); 
        
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
     *  index() Standard displayed page when entering admin_settings
     * 
     *  - title                 The title of the page
     *  - topactive             The name of the active link in the top navigation
     *  - active                The name of the active link in the side navigation
     *  - render                The page to be rendered on the website with the type of rendering
     *
     */
    public function index(){
          $this->view->title = 'Dashboard - Admin settings';
          $this->view->topactive = 'dashboard';
          $this->view->active = 'dashboard';
          $this->view->show_usersdata = $this->model->show_usersdata();
          $this->view->render('admin_settings/index', 'dashboard');
    }
    
    public function useradd(){
          $this->view->title = 'Dashboard - Admin settings - User Add';
          $this->view->topactive = 'dashboard';
          $this->view->active = 'dashboard';
          $this->view->show_enum = $this->model->show_enum();
          $this->view->render('admin_settings/useradd', 'dashboard');
    }
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
    public function userupdate($id){
          $this->view->title = 'Dashboard - Admin settings - Userupdate';
          $this->view->topactive = 'dashboard';
          $this->view->active = 'dashboard';
          $this->view->show_single_userdata = $this->model->show_single_userdata($id);
          $this->view->show_enum = $this->model->show_enum();
          $this->view->render('admin_settings/userupdate', 'dashboard'); 
    }
    
    public function usercreate(){
        Error::Request_Method('POST');
        Token::check();
            // For debug remove slashes
                Debug::array_list($_POST, "This is the \$_POST list");
        $enum = $this->enum();
                
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
        Error::Request_Method('POST');
        Token::check();
            // For debug remove slashes
                //Debug::array_list($_POST, "This is the \$_POST list");
        /**
         * Get the enum options from database for comparing
         */ 
        $enum = $this->enum();
        try{
            $form = new Form;
                // Validate the POST variables
                $form   -> post('user_id')
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
                            -> val('required')
                            -> val('isInArray', $enum)
                        -> post('csrf')
                            -> val('required');
                // Remove slashes for debug          
                    //Debug::array_list($form, "The form is validated");
                $form ->submit();
                $data = $form->fetch();
            // Remove slashes for debug
                //Debug::array_list($data, "The form has passed for further processing aka entering DB");
                if($this->model->update($data)){
                    Session::set('updated', 'Update is executed succesfully !!');
                    header('location:' . URL . 'admin_settings');
                    die();
                }           
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
    
    private function enum(){
        return $this->model->show_enum();
    }
    
    
    
}


