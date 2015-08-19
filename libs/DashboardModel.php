<?php

/**
 * Description of DashboardModel
 *
 * @author Web
 */
class DashboardModel extends Model {

    /**
     * *  function __construct will automatically generate when method is called
     * */
    public function __construct() {
        parent::__construct(); // Insert __construct method from Class controller
        
        $this->session_track = new DKW\Tracking\Information\Session_Check();
        
        //Debug::sentence("Dashboard model");
        // Arraystup : var = [db_tablename => [table_column => Session name]]
        $check = [
            'User' => [
                'user_id'           => 'user_id',
                'user_firstname'    => 'user_firstname',
                'user_lastname'     => 'user_lastname',
                'user_email'        => 'user_email',
                'user_language'     => 'user_language',
            ],
            'Login' => [
                'login_usertype'    => 'login_usertype',
                'login_status'      => 'login_status',
                
                ],
        ];
        
        $where =[
            'User' => [
                'Login_login_id'    => $_COOKIE[COOKIE_LOG_NAME],
            ],
            'Login' => [
                'login_id'          => $_COOKIE[COOKIE_LOG_NAME],
            ]
        ];
        
        $this->session_track->db_sessions($check, $where);
        
        
        
        
        
    } // __construct()
    
    
}// End of class
