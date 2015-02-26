<?php

/**
 * Description of Token
 *
 * @author Web
 */
class Token{

    /**
     * *  function __construct will automatically generate when method is called
     * */
    public function __construct() {
        // empty for now
    }
    /**
     * 
     * @return COOKIE
     */
    public static function generate(){
        Session::init();
        
        $value = md5(uniqid());
        $token_name = TOKENNAME;
        
        if(Session::exsist($token_name)){
            Session::destroy();
        }
        
        return Session::set($token_name, $value);
    }
    /**
     * 
     * @return string This will automatically place a hidden inputfield to use for tokens
     */
    public static function input_form(){
        echo "<input type='hidden' name='token' value='". self::generate()."' />";
        
    }
    /**
     * 
     * @param type $token
     * @return boolean
     */
    public static function check($token){
        $token_name = TOKENNAME;
        
        if(Session::exsist($token_name) && $token === Session::get($token_name)){
            Session::delete($token_name);
            return TRUE;
        }
        
        return FALSE;
    }
}
