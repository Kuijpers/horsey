<?php
/**
 * Description of Hash
 * 
 * Within this class we handle everything needed for hashing data
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Hash{
    /**
     *  function __construct will automatically generate when method is called
     */
    function __construct(){
        // Empty for now
    }
    
    /**
     * create($algo, $data, $salt)
     * 
     * This function will hash the delivered data 
     * 
     * @param string $algo The algorithm to use (MD5, SHA1, SHA256 etc)
     * @param string $data The data to encode (password for example)
     * @param string $salt The salt to use when encoding the $data
     * 
     * @return string The hashed/salted data
     */
    public static function create($algo, $data, $salt){
        
        $context = hash_init($algo, HASH_HMAC, $salt);
        hash_update($context, $data);
        
        return hash_final($context);
    }
    
} // End of class
