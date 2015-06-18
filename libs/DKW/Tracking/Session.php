<?php
namespace DKW\Tracking;

/**
 * Description of Session
 * 
 * Within this class we handle everything needed for using sessions
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Session{
    /**
     * Empty for now
     */
    public function __construct(){
      // empty for now  
    }
    /**
     * set($key, $value)
     * This will set the session 
     * @param variable $key     Name of the session
     * @param variable $value   Value of the session
     */
    public static function set($key, $value){
        return $_SESSION[$key] = $value;
    }
    /**
     * exsist($key)
     * This will check if the session exsists
     * @param variable $key
     * @return BOOL
     */
    public static function exsist($key){
        return (isset($_SESSION[$key])) ? TRUE : FALSE;
    }
    /**
     * get($key)
     * This wil get the information of the called session
     * @param variable $key     Name of the session
     * @return variable         Value that is put in the session
     */
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
    }
    public static function delete($key){
        if(self::exsist($key)){
            unset($_SESSION[$key]);
        }
    }
    /**
     * Remove the session
     */
    public static function destroy(){
        session_destroy();   
    }
    /**
     * Display all sessions available. Mainly for debugging
     */
    public static function display(){
        if(isset($_SESSION)){
            print_r($_SESSION);
        }else{
            echo "No Session is set";
        }
    }
       
}




?>