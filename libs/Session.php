<?php
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
     *  This will start the session
     */
    public static function init(){
             @session_start();
    }
    /**
     * set($key, $value)
     * This will set the session 
     * @param variable $key     Name of the session
     * @param variable $value   Value of the session
     */
    public static function set($key, $value){
        self::init();
        return $_SESSION[$key] = $value;
    }
    /**
     * exsist($key)
     * This will check if the session exsists
     * @param variable $key
     * @return BOOL
     */
    public static function exsist($key){
        self::init();
        return (isset($_SESSION[$key])) ? TRUE : FALSE;
    }
    /**
     * get($key)
     * This wil get the information of the called session
     * @param variable $key     Name of the session
     * @return variable         Value that is put in the session
     */
    public static function get($key){
        self::init();
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
    }
    public static function delete($key){
        self::init();
        if(self::exsist($key)){
            unset($_SESSION[$key]);
        }
    }
    /**
     * Remove the session
     */
    public static function destroy(){
        self::init();
        session_destroy();   
    }
    /**
     * Display all sessions available. Mainly for debugging
     */
    public static function display(){
        self::init();
        if(isset($_SESSION)){
            print_r($_SESSION);
        }else{
            echo "No Session is set";
        }
    }
       
}




?>