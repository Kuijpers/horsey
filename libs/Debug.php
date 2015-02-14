<?php
/**
 * Description of Debug
 * 
 * Within this class we handle everything needed for debugging parts of script
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Debug {

    /**
     *  function __construct will automatically generate when method is called
     */
    public function __construct() {
        // empty for now
    }
    /**
     * Show a sentence that explains where we are
     * @param string $data This is the sentence that will be shown with added info.
     */
    public static function sentence($data){
        echo 'We are in '. $data;
    }
}
