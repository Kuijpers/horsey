<?php

/**
 * Description of Error
 *
 * @author Web
 */
class Error {

    /**
     * *  function __construct will automatically generate when method is called
     * */
    public function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        // empty for now
    }
    
    public function display_error($error_call){
        
        return $this->_get_errorinfo($error_call);
    }
    
    public static function Request_Method($request){
        if(! $_SERVER['REQUEST_METHOD'] === $request){
            /**
             * @todo Create redirect to error page with Db registration
             */
            echo "iets gaat fout";
            exit();
        }
    }
    
    private  function _get_errorinfo($error_call){
        
        return $this->db->read('SELECT *
                                FROM Error
                                WHERE error_call = :error_call',
                                [":error_call"=>$error_call]);
    }
}
