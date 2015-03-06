<?php

/**
 * Description of Token
 *
 * @author Web
 */
class Token{

    /**
     *  function __construct will automatically generate when method is called
     */
    public function __construct() {
        // empty for now
    }
    
    /**
     * @return STRING Sequince of hashed characters created from existing csrf-session
     */
    public static function generate(){
        
        return hash_hmac( 'ripemd160', $_SESSION['csrf'], TOKENHASH );
    }
    
    /**
     * @return string   This will automatically place a hidden inputfield and 
     *                  create a hashed string
     */
    public static function input_form(){
        echo "<input type='hidden' name='csrf' value='". self::generate()."' />";
    }
    
    /**
     * @param type $token
     * @return boolean
     */
    public static function check(){
        if (! hash_hmac( 'ripemd160', $_SESSION['csrf'], TOKENHASH ) === $_POST['csrf'] ){
            
            /**
             * @todo Create redirect to error page with Db registration
             */
            echo "iets gaat fout";
            die();
        }
    }

}
