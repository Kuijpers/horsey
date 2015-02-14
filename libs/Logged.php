<?php
/**
 * Description of Logged
 * 
 * Within this class we handle everything needed to check if a user is logged in and everything related to the logged in status.
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Logged {

    /**
     *  function __construct will automatically generate when method is called
     */
    public function __construct() {
        // empty for now
    }
    /**
     * check_logged()
     * With this method we can check if a user is logged in.
     * When the user is it will say true.
     * @return boolean
     */
    public static function check_logged(){
        
        switch (LOGIN_TYPE) {
            case 1:
                    if(!Cookie::cookie_exists(COOKIE_LOG_NAME)){
                        Cookie::cookie_delete(COOKIE_LOG_NAME);
                        Session::init();
                        Session::destroy();
                header('location:login');
                exit;
                }
                break;
            case 2:
                Session::init();
                $logged = Session::get('loggedIn');
                if($logged == FALSE){
                    Session::destroy();
                    header('location:login');
                    exit;
                }
                break;

            default:
                break;
        }
    }
    
    public static function status_logged(){
        if(Cookie::cookie_exists(COOKIE_LOG_NAME)){
            return TRUE;
        }
    }
    
}
