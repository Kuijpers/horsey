<?php

/**
 * Description of Password
 *
 * @author Dennis Kuijpers
 */
class Password {

    /**
     * *  function __construct will automatically generate when method is called
     * */
    public function __construct() {
        // empty for now
    }
    /**
     * 
     * @param INTEGER $number The lengt of the password required
     * @return string A random password
     */
    public static function generate($number){
        if(is_int($number)){
           $length = $number/2;
            return bin2hex(openssl_random_pseudo_bytes($length)); 
        }else{
            return false;
        }
    }
    
}
