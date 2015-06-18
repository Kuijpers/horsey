<?php
// Check if PHP_SESSION is enabled or disabled
if ( session_status() === PHP_SESSION_DISABLED )
{
    throw new RuntimeException( "Cannot start session!" );
}
// Check if PHP SESSION is active
if ( session_status() !== PHP_SESSION_ACTIVE )
{
    session_start();
}
// Check if SessionID is know in COOKIE
if ( !empty( $_COOKIE['PHPSESSID'] ) )
{
    session_id( $_COOKIE['PHPSESSID'] );
}
ob_start();
// FOR DEBUG REMOVE SLASHES
    //echo '<pre>';print_r( $_SESSION );echo '</pre>';

error_reporting(E_ALL);

//echo "DIT IS DE INDEX PAGINA";

// Path to folder with configuration files.
$path = 'config/';

require_once $path . 'personal.php';

// Require all files from the config folder

foreach(glob($path."*.php") as $file){
    require_once $file;
}

/**
 * Load classes from libs
 */
spl_autoload_register(function ($class) {
   include LIBS . $class.".php";
});

// Set CSRF Session token when empty
if(empty($_SESSION['csrf'])){
    $_SESSION['csrf']   = TOKEN;
}

$bootstrap = new Bootstrap();

//Optional path settings
    //$bootstrap->setControllerPath('c');
    //$bootstrap->setModelPath('m');
    //$bootstrap->_setDefaultFile('d.php');
    //$bootstrap->_setErrorFile('d.php');
$bootstrap->init();