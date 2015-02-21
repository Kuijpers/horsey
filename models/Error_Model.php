<?php
/**
 * Description of Error_Model
 * 
 * This class is an extension of the Model class
 * Within this class we handle the data needed for the error page
 * 
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Error_Model extends Model{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    public function __construct(){
            
        Debug::sentence("error model");
    }
    
} // End of class
