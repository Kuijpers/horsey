<?php
/**
 * Description of Form
 * 
 * Within this class we handle everything needed for the Form
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Form{
    
    
    /**
     * @var array $_currentItem The immediately posted item 
     */    
    private $_currentItem = NULL;
    
    /**
     * @var array $_postData Stores the Posted data 
     */
    private $_postData = [];
    
    /**
     * @var object $_val The validator object 
     */
    private $_val = [];
    
    /**
     * @var array $_error Holds the current forms error
     */
    private $_error = [];
    
    /**
     *  function __construct will automatically generate when method is called
     */
    public function __construct(){
        $this->_val = new Val();
    }
    /**
     *  post($field) 
     * This is to run $_POST
     * 
     *  @param string $field The HTML fieldname to post
     */
    public function post($field){
        
        $this->_postData[$field] = $_POST[$field];
        $this->_currentItem = $field;
        return $this;
    }
    
    /**
     * fetch($fieldName) 
     * Return the posted data
     * 
     * @param mixed $fieldName
     * 
     * @return mixed string or array
     */
    public function fetch($fieldName = FALSE){
        if($fieldName){
            if(isset($this->_postData[$fieldName])){
                return $this->_postData[$fieldName];
            }else{
                return FALSE;
            }
        }else{
            return $this->_postData;
        }
    }
    
    /**
     * val($typeOfValidater, $arg1) 
     * This is to validate
     * 
     * @param string $typeOfValidator A method from the Form/Val class
     * #param string $arg A property to validate against
     * 
     */
    public function val($typeOfValidater, $arg1 = NULL){
           
        if($arg1 == NULL){
            $error = $this->_val->{$typeOfValidater}($this->_postData[$this->_currentItem]);
        }else{
            $error = $this->_val->{$typeOfValidater}($this->_postData[$this->_currentItem], $arg1);
        }
        
        if($error){
            $this->_error[$this->_currentItem]= $error;
        }
        
        return $this;
    }
    /**
     * submit()
     * Handles the form and throws an exception upon error
     * 
     * @return boolean
     * 
     * @throws Exception
     */
    
    public function submit(){
        
        if(empty($this->_error)){
            return true;
        }else{
            $str = '<table id="error_output">';
            foreach($this->_error as $key => $value){
                $str .='<tr><td>'. $key . '</td><td> => </td><td>' . $value . "</td></tr> \n";
            }
            $str .= '</table>';
            
            throw new Exception($str);
        }
    }

}   // End of class