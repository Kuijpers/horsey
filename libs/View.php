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
            case 'main':
        
                require 'public/main/template/header.php';
                require 'public/main/template/nav.php';
                require 'views/main/' . $name . '.php';
                require 'public/main/template/footer.php';
            
            break;
            case 'dashboard':
        
                require 'public/dashboard/template/header.php';
                require 'public/dashboard/template/nav.php';
                require 'public/dashboard/template/breadcrumb.php';
                require 'views/dashboard/' . $name . '.php';
                require 'public/dashboard/template/notification.php';
                require 'public/dashboard/template/footer.php';
            
            break;
            case 'userdashboard':
        
                require 'public/userdashboard/template/header.php';
                require 'public/userdashboard/template/nav.php';
                require 'views/userdashboard/' . $name . '.php';
                require 'public/userdashboard/template/notification.php';
                require 'public/userdashboard/template/footer.php';
            
            break;
            case 'login':
        
                require 'public/login/template/header.php';
                require 'views/log/' . $name . '.php';
                require 'public/login/template/footer.php';
            break;
            case 'verify':
        
                require 'public/dashboard/verification/template/header.php';
                require 'views/dashboard/' . $name . '.php';
                require 'public/dashboard/verification/template/footer.php';
            
            break;
            default:
        }
        
    }
} // End of class
