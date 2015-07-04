<?php

namespace DKW\Tracking;

/**
 * Description of Url
 *
 * @author Web
 */
class Url {

    /**
     * *  function __construct will automatically generate when method is called
     * */
    public function __construct() {
        // empty for now
    }

    public static function curPageURL() {
        $pageURL = 'http';
        
        if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        
        $pageURL .= "://";
        
        if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            }
        return $pageURL;
    }
}
