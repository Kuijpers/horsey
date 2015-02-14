<?php
/**
 * Description of View
 * 
 * Within this class we handle everything needed for the view
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class View{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    function __construct(){
        
            //Debug::sentence("view");
    }
    /**
     * render($name,$type)
     * With this method we can render pages
     * 
     * @param string $name Name of the file that need to be rendered. This is also the name of the page
     * @param string $type The type of rendering that needs to be done with the different "template" files.
     */
    public function render($name,$type=null){
        switch($type)
        {
            case 'register':
        
                require 'views/main/header.php';
                require 'views/main/navbar.php';
                require 'views/main/carousel.php';
                require 'views/' . $name . '.php';
                require 'views/main/footer.php';
            
            break;
            case 'main':
        
                require 'views/main/header.php';
                require 'views/main/navbar.php';
                require 'views/main/carousel.php';
                require 'views/' . $name . '.php';
                require 'views/main/footer.php';
            
            break;
            case 'dashboard':
        
                require 'views/dashboard/header.php';
                require 'views/dashboard/topnav.php';
                require 'views/dashboard/sidenav.php';
                require 'views/' . $name . '.php';
                require 'views/dashboard/footer.php';
            
            break;
            case 'login':
        
                require 'views/login/header.php';
                require 'views/' . $name . '.php';
                require 'views/login/footer.php';
            
            break;
            default:
        }
        
    }
} // End of class
