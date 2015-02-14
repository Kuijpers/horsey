<?php

error_reporting(E_ALL);

//echo "DIT IS DE INDEX PAGINA";

require 'config/db.php';
require 'config/login.php';
require 'config/mail.php';
require 'config/security.php';
require 'config/url.php';
/**
 * @todo Put this requirement somewhere else so it will not be called all the time
 */
require LIBS . 'Form/Val.php';

/**
 * Load classes from libs
 */
spl_autoload_register(function ($class) {
   include LIBS . $class.".php";
});

$bootstrap = new Bootstrap();

//Optional path settings
    //$bootstrap->setControllerPath('c');
    //$bootstrap->setModelPath('m');
    //$bootstrap->_setDefaultFile('d.php');
    //$bootstrap->_setErrorFile('d.php');
$bootstrap->init();