<?php
/**
 * Description of Model
 * 
 * Within this class we handle everything needed for the Model
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Model{
    
    /**
     *  function __construct will automatically generate when method is called
     * 
     * Get connection with the DB
     */
    
    public function __construct(){
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        
            //Debug::sentence("model");
    }
} // End of class
