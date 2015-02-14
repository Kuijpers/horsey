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
         * (Optional) Set a custom path to the error file
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
            if(empty($this->_url[0])){
                $this->_loadDefaultController();
                return false;
            }


                $this->_loadExistingController();

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
            
            $url = isset($_GET['url']) ? $_GET['url'] : 'Index';
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
            require $this->_controllerPath . $this->_defaultFile;  
            $this->_controller = new Index();
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
            $file = $this->_controllerPath . $this->_url[0] . '.php';
        
            if (file_exists($file)){
                require $file;
                $this->_controller = new $this->_url[0];
                $this->_controller->loadModel($this->_url[0], $this->_modelPath);
            }
            else{
                $this->_error();
                return FALSE;
            }
            
        }
        /**
         * If a method is passed in the $_GET parameter
         *  http://localhost/Controller/Methode/(Param)/(Param)/(Param)
         *   url[0] = Controller
         *   url[1] = Method  case(2)
         *   url[2] = Param   case(3)
         *   url[3] = Param   case(4)
         *   url[4] = Param   case(5)
         */
        private function _callControllerMethode(){
            
            $length = count($this->_url);
            
            // Make sure the method we are calling exists.
            if($length > 1){
                if (!method_exists($this->_controller, $this->_url[1])) {
                    $this->_error();
                    die;
                }
            }
            // Determine what to load
            switch ($length){
                case 5:
                        //Controller->Method(Param1, Param2, Param3)
                        $this->_controller ->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                    break;
                case 4:
                        //Controller->Method(Param1, Param2)
                        $this->_controller ->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                    break;
                case 3:
                        //Controller->Method(Param1)
                        $this->_controller ->{$this->_url[1]}($this->_url[2]);
                    break;
                case 2:
                        //Controller->Method()
                        $this->_controller ->{$this->_url[1]}();
                    break;
                default:
                     $this->_controller->index();
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