<?php
/**
 * Description of Login
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the login page
 * 
 * This is a private page. Login is required.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
Class Login extends Controller{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            //Debug::sentence("login controller");
        
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
          $this->view->title = 'Login';
          $this->view->topactive = 'login';
          $this->view->active = 'dashboard';
          $this->view->render('login/index', 'login');
    }
    /**
     * Run the login function from the model
     */
    public function Run(){
        $this->model->Run();   
    }
    
    /**
     *  error()
     * 
     *  - title         The title of the page
     *  - topactive     The name of the active link in the top navigation
     *  - active        The name of the active link in the side navigation
     *  - render        The page to be rendered on the website with the type of rendering
     *
     */
    
    function error($error_call = null){
          $this->view->title = 'Login';
          $this->view->topactive = 'login';
          $this->view->active = 'dashboard';
          $this->view->error_call = $this->model->error_call($error_call);
          $this->view->render('login/index', 'login');
    }
}



?>