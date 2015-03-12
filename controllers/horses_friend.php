<?php
/**
 * Description of horses_friend
 * 
 * This class is an extension of the controller class
 * Within this class we handle everything needed for the horses friend page
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Horses_friend extends Controller{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
        
            Debug::sentence("horses friend controller");
        
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
          $this->view->title = 'Horses of friends';
          $this->view->topactive = 'horse';
          $this->view->render('horses/friend/index', 'dashboard'); 
    }
    
}