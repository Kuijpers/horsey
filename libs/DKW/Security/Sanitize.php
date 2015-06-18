<?php
namespace DKW\Security;

/**
 * Description of Sanitize
 * 
 * Within this class we handle everything needed to sanitize input
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Sanitize{
    /**
     * Empty for now
     */
    public function __construct() {
        // Empty for now
    }
    /**
     * escape($input)
     * With this method we can sanitize input for save entry in DB
     * @param variable $input   Variable that needs to be sanitized
     * @return variable         Sanitized input
     */
    public static function escape($input){
        $input = htmlentities($input, ENT_QUOTES, 'UTF-8');
        return $input;
    }
    
    
    
} // End of class

