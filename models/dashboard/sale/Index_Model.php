<?php
/**
 * Description of For_sale_Model
 * 
 * This class is an extension of the Model class
 * Within this class we handle the data needed for the For_sale page
 * 
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Index_Model extends DashboardModel{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    function __construct(){
        parent::__construct(); // Insert __construct method from Class controller
            
        //Debug::sentence("For_sale model");
    }
}


