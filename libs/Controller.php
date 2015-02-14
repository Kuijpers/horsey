<?php
/**
 * Description of Controller
 * 
 * Within this class we handle everything needed for the controller
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Controller{
    
    /**
    **  function __construct will automatically generate when method is called
    **/
    
    function __construct(){
        
            //Debug::sentence("controler");
        
        $this->view = new View();
        
    }
    
    /**
     * loadModel($name, $model_path)
     * This will automatically load the desired model
     *
     * @param string $name This is the modelname we require for example "index"
     * 
     * @param string 
     *
     * @param string $path This is the full path where the model can be find
     *
     * We check if the path exists if so we require the file according to the path
     *
     * We than get the correct methode en let the methode start 
     *
     */
    
    public function loadModel($name, $model_path){
        
        $path = $model_path . $name. '_model.php';
        
        if(file_exists($path)){
            require $model_path . $name. '_model.php';
            
            $modelName = $name. '_Model';
            $this->model = new $modelName();
        }
        
    }
    
}