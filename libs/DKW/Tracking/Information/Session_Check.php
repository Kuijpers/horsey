<?php
namespace DKW\Tracking\Information;
/**
 * Description of Session_check
 *
 * @author Web
 */
class Session_Check extends \DKW\Tracking\Session{

    /**
     * *  function __construct will automatically generate when method is called
     * */
    public function __construct() {
         parent::__construct(); // Insert __construct method from parent class
        
        $this->db = new \Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    public function test(){
        $this->display();
    }
    
    public function db_sessions($check, $lookup){
        $error = 0;
    // Create WHERE part for the SQL query with the supplied information in array $check
        foreach ($check as $table => $value) {
                $where = '';
                $bindarray = [];
                foreach ($lookup[$table] as $column => $value) {
                   $where = $where .' '. $column .'= :'.$column . ' AND ';
                   $bindarray[':'.$column] = $value;
                }
    // Trim the end from string
                $where = rtrim($where, ' AND');
                // Setup SQL query
                $sql='SELECT * FROM '.$table .' WHERE '. $where;
                    // Remove slashes for debug
                    // echo $sql;
    // Get data from DB
                $data = $this->db->read($sql, $bindarray);
                    // Remove slashes for debug
                     //echo "<pre>";print_r($data); echo "</pre>";
                     
                   // Remove slashes for debug  
                    //print_r($check[$table]); echo "<br /><br />";
                    
                    $error = $this->_check_sessions($check[$table], $data);
        }
        if($error == 1){
            header( "refresh:0;" );
        }
        return TRUE;
    } //End of db_sessions()
    
    
    private function _check_sessions($info, $data){
        foreach($info as $db_column => $session_name){
        // Check if $_SESSION exsists
                        if($this->exsist($session_name)){
            // If exsists check if DB value == $_SESSION value
                            if ($data[0][$db_column] !== $_SESSION[$session_name]){
                    // If not equal create new $_SESSION and increase $error
                                // Delete session and set new session
                                $this->delete($session_name);
                                $this->set($session_name,$data[0][$db_column]);
                                // Set error
                                $error = 1;
                            }
                        }
                        else {
                            // If it doesn't exsist create new $_SESSION and increase $error
                            $this->set($session_name,$data[0][$db_column]);
                            
                            $error = 1;
                        }
                        
                    }
                    if(!empty($error) && $error == 1){
                        return 1;
                    }else{
                        return 0;
                    }
    } // End of _check_sessions()
    
    
    
} // End of the class
