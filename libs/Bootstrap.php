<?php
/**
 * Description of Bootstrap
 * 
 * Within this class we handle everything needed for the bootstrap
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Bootstrap{
    /**
     * Set variables
     */
    
        private $_url = null;
        private $_controller = null;
        
        private $_controllerPath = 'controllers/'; // Always include trailing slash (/)
        private $_modelPath = 'models/'; // Always include trailing slash (/)
        private $_errorFile = 'error.php';
        private $_defaultFile = 'index.php';
        private $_defaultModelFile = 'Index_Model.php';
        
        private $_mainPath = 'index/index/';
        private $_subPath = '/index/';
    
    /**
     *  function __construct will automatically generate when method is called 
     */
    
        public function __construct(){
        
            //Debug::sentence("bootstrap");
        }
        
        /**
         * (Optional) Set a custom path to controllers
         * @param string $path
         */
        public function setControllerPath($path){
            $this->_controllerPath = trim($path, '/') . '/';
        }
        /**
         * (Optional) Set a custom path to models
         * @param string $path
         */
        public function setModelPath($path){
            $this->_modelPath = trim($path, '/') . '/';
        }
        /**
         * (Optional) Set a custom path to the default file
         * @param string $path use the file name only of your controller Example: index.php
         */
        public function setDefaultFile($path){
            $this->_defaultFile = trim($path, '/');
        }
        /**
         * (Optional) Set a custom path to the error file
         * @param string $path use the file name only of your controller Example: error.php
         */
        public function setErrorFile($path){
            $this->_errorFile = trim($path, '/');
        }
        
        
        /**
         * This starts the Bootstrap
         * @return boolean
         */
        public function init(){
        
            // Sets the protected $_url
            $this->_getUrl();

                // Debug option remove slashes
                 //$this-> _debugUrl();

            // Check if url is set. If not, load the default controller and break down remaining script.  
            // Example: Visit http://localhost  it loads the default controller
            // 
            // www.bla.com/
            
            if(empty($this->_url[0])){
                $this->_loadDefaultController();
                return false;
            }
            // Check if folder exists
            // 
            // www.bla.com/folder1/
            
            if(!file_exists($this->_controllerPath . $this->_url[0])){
                //die("Deze folder bestaat niet");
                $this->_error();
                return FALSE;
            }
            // Check if subfolder is set.
            // If not go to standard subfolder
            // 
            // www.bla.com/folder1/
            
            if(empty($this->_url[1])){
                $this->_loadSubController();
                return FALSE;
            }
            
            // Check if folder exists
            // 
            // www.bla.com/folder1/folder2/
            
            if(!file_exists($this->_controllerPath . $this->_url[0] .'/'.$this->_url[1])){   
                //die("Deze folder bestaat niet");
                $this->_error();
                return FALSE;
            }
            // Check if method is set.
            // If not go to standard method
            // 
            // www.bla.com/folder1/folder2/
            
            if(empty($this->_url[2])){
                //die("Er is geen method geplaatst");
                $this->_loadMainController();
                return FALSE;
            }  
            // If method is set.
            // 
            // www.bla.com/folder1/folder2/method

                $this->_loadExistingController();
                
            // If parameters are set.
            // 
            // www.bla.com/folder1/folder2/method/1/2/3/4

                $this->_callControllerMethode();
        }
        
        /**
         * Fetches the $_GET from 'url'
         */
        private function _getUrl(){
            /**
             * Explode the url at slashes and put in an array
             *
             * @param string $_GET['url'] String from address
             * rtrim to remove slash at end of each array
             * 
             * @param array $url Exploded array from $_GET['url']==> result
             */
            
            $url = isset($_GET['url']) ? $_GET['url'] : '';
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $this->_url = explode('/',$url);
        }
        /**
         * Loads if there is no $_GET parameter passed
         */
        private function _loadDefaultController(){
            /**
             * Require file and after that break down remaining script
             */
            require $this->_controllerPath .$this->_mainPath .  $this->_defaultFile;
            $this->_controller = new Index();
            $this->_controller->index();
            $this->_controller->loadModel('Index', $this->_modelPath .$this->_mainPath );
            return FALSE;            
        }
        /**
         * Loads if there is no sub folder passed
         */
        private function _loadSubController(){
            /**
             * Require file and after that break down remaining script
             */
            require $this->_controllerPath . $this->_url[0] . $this->_subPath .  $this->_defaultFile;  
            require $this->_modelPath . $this->_url[0] . $this->_subPath .  $this->_defaultModelFile;  
            $this->_controller = new Index();
            $this->model = new Index_Model();
            $this->_controller->index();
            return FALSE;            
        }
        /**
         * Loads if there is no method passed
         */
        private function _loadMainController(){
            /**
             * Require file and after that break down remaining script
             */
            require $this->_controllerPath . $this->_url[0] ."/".  $this->_url[1] ."/". $this->_defaultFile;
            $this->_controller = new Index();
            $this->_controller->loadModel('index', $this->_modelPath . $this->_url[0] ."/".  $this->_url[1] ."/");
            $this->_controller->index();
            return FALSE;            
        }
        /**
         *  Load an existing method if there IS a $_GET parameter passed
         */
        private function _loadExistingController(){
            /**
             * Check if file exists, if so call for required file.
             *
             * If file doesn't exists create an error from error controller and block remaining script
             *
             * Get required controller, set bij exploded address $url, using array conditions
             *
             * @param string $this->_controller Open new methode ( vissible page )
             */
            $file = $this->_controllerPath . $this->_url[0] ."/".  $this->_url[1] ."/". $this->_url[2] . '.php';
        
            if (file_exists($file)){
                require $file;
                $this->_controller = new $this->_url[2];
                $this->_controller->loadModel($this->_url[2], $this->_modelPath . $this->_url[0] ."/".  $this->_url[1] ."/");
                //$this->_controller->{$this->_url[3]}();
            }
            else{
                $this->_error();
                return FALSE;
            }
            
        }
        /**
         * If a method is passed in the $_GET parameter
         *  http://localhost/Folder1/Folder2/Controller/Methode/(Param)/(Param)/(Param)
         *   url[0] = Folder 1
         *   url[1] = Folder 2
         *   url[2] = Controller
         *   url[3] = Method
         *   url[4] = Param   case(5)
         *   url[5] = Param   case(6)
         *   url[6] = Param   case(7)
         *   url[7] = Param   case(8)
         */
        private function _callControllerMethode(){
            
            $length = count($this->_url);
            
            // Make sure the method we are calling exists.
            if($length > 3){
                if (!method_exists($this->_controller, $this->_url[3])) {
                    $this->_error();
                    die;
                }
            }   
                // Remove slashes for debug
                    //print_r($this->_url);echo "De lengte van de url is : ". $length . " " ;die("We kunnen verder. Method bestaat");
            // Determine what to load
            switch ($length){
                case 8:
                        //Controller->Method(Param1, Param2, Param3, Param4)
                        $this->_controller ->{$this->_url[3]}($this->_url[4], $this->_url[5], $this->_url[6], $this->_url[7]);
                    break;
                case 7:
                        //Controller->Method(Param1, Param2, Param3)
                        $this->_controller ->{$this->_url[3]}($this->_url[4], $this->_url[5], $this->_url[6]);
                    break;
                case 6:
                        //Controller->Method(Param1, Param2)
                        $this->_controller ->{$this->_url[3]}($this->_url[4], $this->_url[5]);
                    break;
                case 5:
                        //Controller->Method(Param1)
                        $this->_controller ->{$this->_url[3]}($this->_url[4]);
                    break;
                case 4:
                        //Controller->Method()
                        $this->_controller ->{$this->_url[3]}();
                    break;
                default:
                        //Controller->Method()
                        $this->_controller ->index();
                    break;
            }
        }
            
	/**
         * 
         * Display an error page if nothing exists
         * 
         * @return boolean
         */
        private function _error(){
            /**
             * Require file and after that break down remaining scrip
             */
            require $this->_controllerPath . $this->_errorFile;
            $this->_controller = new Error();
            $this->_controller->index();
            exit;
        }
        /**
         * Use for debugging.
         * Will display a prepared list of your array
         */
        private function _debugUrl(){
            // print the Array of $_url
                echo $_GET['url'];
                echo "<pre>";
                print_r($this->_url);
                echo "</pre>";
                echo "<br />";
                die();
        }
    }


?>