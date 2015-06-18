<?php
/**
 * Description of Login_Model
 * 
 * This class is an extension of the Model class
 * Within this class we handle the data needed for the dashboard main page
 * 
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Index_Model extends Model{
    
    
        
    
// Class variables
    protected $_error;
    protected $_token;
    protected $_hash;
    protected $_session;
    protected $_cookie;
    
    /**
     *  function __construct will automatically generate when method is called
     */
    
    function __construct(){
        parent::__construct();
            
        //Debug::sentence("login model");
        
                
// Class settings
        $this->_error = new Error();
        $this->_token = new DKW\Security\Token();
        $this->_hash = new DKW\Security\Hash();
        $this->_session = new DKW\Tracking\Session();
        $this->_cookie = new DKW\Tracking\Cookie();
        
        // Generate hashkeys to use
            //echo Hash::create('SHA256', 'welkom', HASH_PW_KEY);die();
    }
    
} // End of class
