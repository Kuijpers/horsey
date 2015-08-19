<?php
use DKW\Tracking\Logged as Logged;
/**
 * Description of DashboardController
 *
 * @author Web
 */
class DashboardController extends Controller{

    /**
     * *  function __construct will automatically generate when method is called
     * */
    public function __construct() {
        parent::__construct(); // Insert __construct method from Class controller
        
        //Debug::sentence("Dashboard controller");
        
        /**
         * Check if user is already logged in. If not redirect to loginpage.
         *
         */
        Logged::check_logged();
        
        
    }

    //put your code here
}
