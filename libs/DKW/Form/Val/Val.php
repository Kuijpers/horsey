<?php

namespace DKW\Form\Val ;

class Val{
    
    /**
     *  function __construct will automatically generate when method is called
     */
    public function __construct(){
        $this->db = new \Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }
    /**
     * required($data)
     * 
     * If field is required check if there is input
     * 
     * @param variable $data
     * @return string If not valid send error
     */
    public function required($data){
        if(empty($data) == TRUE){
            return "$data is a required field!";
        }
    }
    /**
     * 
     * @param type $arg
     * 
     * @todo Check this method
     */
    public function not_required($arg = FALSE){
        if($arg == TRUE){  
        }
    }
    /**
     * minlength($data, $arg)
     * 
     * Check if minimum length is correct
     * 
     * @param variable $data The data to check
     * @param int $arg This is the minimum length
     * @return string If not valid send error
     */
    public function minlength($data, $arg){
        if(strlen($data) < $arg){
            return "Your inserted data has to be at least $arg characters long";
        }
    }
    /**
     * maxlength($data, $arg)
     * 
     * Check to see if the data is not longer than the set length
     * 
     * @param variable $data The data to check
     * @param int $arg This is the maximum length
     * @return string If not valid send error
     */    
    public function maxlength($data, $arg){
        if(strlen($data) > $arg){
            return "Your inserted data has to be at the most $arg characters long";
        }
    }
    /**
     * digit($data)
     * 
     * Check if input is an integer
     * 
     * @param variable $data
     * @return string If not valid send error
     */    
    public function digit($data){
        if(ctype_digit($data)==FALSE){
            return "Your inserted data has to be an integer";
        }
    }
    /**
     * emailcheck($data)
     * 
     * Check if input is a valid emailaddress
     * 
     * @param variable $data
     * @return string If not valid send error
     */
    public function emailCheck($data){
        $data = filter_var($data, FILTER_SANITIZE_EMAIL);
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return 'This email address is considered invalid.';
        }
    }
    /**
     * equal($data,$arg)
     * 
     * Check if input data match to input2
     *  
     * @param variable $data This is the first posted data
     * @param variabla $arg This is the POST field that has to be compared (input2)
     * @return string Error return if not compared
     */
    public function equal($data, $arg){
        if($data != $_POST[$arg]){
            return "Input does not match";
        }
    }
    /**
     * uniqueInput($data,$val_array[])
     * 
     * This is to check if the input is unique.
     * Double registrations are not allowed for the same account
     * 
     * @param variable $data Not used in this function
     * @param array $val_array  This is the array needed to check the database
     *                          Built up:
     *                          TABLENAME, [COLUMNNAME => POSTVALUE,
     *                                      COLUMNNAME => POSTVALUE]
     * @return string Error return if not compared
     */
    public function uniqueInput($data, $val_array=[]){
        
        $bind_array = $this->checkInputBind($val_array);
        
        $and_string = $this->checkInputSQL($val_array);
                
        
        // Built up query
        $sql = 'SELECT * FROM '. $val_array[0] .' WHERE ' . $and_string;
        
        //Remove for debug
        //echo "<pre>";print_r($val_array);echo "</pre>";echo "<br />";echo $sql;echo "<br />";echo "<pre>";print_r($bind_array);echo "</pre>";die();
        
        if(count($this->db->read($sql, $bind_array))> 0){
            return "Registration is not possible";
        }
    }
    /**
     * existingInput($data,$val_array[])
     * 
     * This is to check if the input exists.
     * Before adding to DB we have to make sure it is possible
     * 
     * @param variable $data Not used in this function
     * @param array $val_array  This is the array needed to check the database
     *                          Built up:
     *                          TABLENAME, [COLUMNNAME => POSTVALUE,
     *                                      COLUMNNAME => POSTVALUE]
     * @return string Error return if not compared
     */
    public function existingInput($data = '', $val_array=[]){
        
        $bind_array = $this->checkInputBind($val_array);
        
        $and_string = $this->checkInputSQL($val_array);
                
        // Built up query
        $sql = 'SELECT * FROM '. $val_array[0] .' WHERE ' . $and_string;
        if(!count($this->db->read($sql, $bind_array))== 1){
            return "Registration is not possible";
        }
    }
    
    public function isInArray($data , $array = []){
        if(!in_array($data, $array)){
            return "Value does not exist in array";
        }
    }
    /**
     *  
     * @param variable $name 
     * @param type $arguments
     * @throws Exception
     */
    
    public function __call($name, $arguments) {
        throw new Exception("$name does not exist inside of: " . __CLASS__);
    }
    /**
     * Create a array that can vbe used to bind parameters
     * @param ARRAY $val_array Current array
     * @return ARRAY Bindarray to use in SQL statement
     */
    private function checkInputBind($val_array=[]){
        // Set empty array
            $bind_array =[];
            // Use existing (empty)array to expand array based on $_POST items
                foreach($val_array[1] as $key => $value){
                    // Create array to merge
                    $merge_array = [':'.$key => $_POST[$value]];
                    // Merge created array to existing array
                    $bind_array = array_merge($bind_array, $merge_array);  
                }
            // Get the ignore binding parameters
                if(!empty($val_array[2])){
                    foreach($val_array[2] as $key => $value){
                        // Create array to merge
                        $merge_array = [':'.$key => $_POST[$value]];
                        // Merge created array to existing array
                        $bind_array = array_merge($bind_array, $merge_array);  
                    }
                }
                return $bind_array;
    }
    /**
     * This will complete the SQL statement for look up
     * @param ARRAY $val_array Current array
     * @return STRING Output to use in SQL statement
     */
    private function checkInputSQL($val_array=[]){
        // Create SQL query
            // Set empty start string for the AND part of the query    
                $and_string = '';
                // Create string to use for the AND part of the query
                    foreach ($val_array[1] as $key => $value) {
                        $and_string .= $key . '= :' . $value . ' AND ';
                    }
                    // Trim the last AND of the string
                $and_string = rtrim($and_string, ' AND');
                
                if(!empty($val_array[2])){
                    foreach ($val_array[2] as $key => $value) {
                        $and_string .= ' AND '. $key . ' <> :' . $value ;
                    }
                }
                
        return $and_string;
    }
    
    
    
                    /**
                     * @todo Make validation possible for not required fileds that are filled in
                     */
    
}   // End of class
