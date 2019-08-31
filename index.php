<?php
/*
 * PIP v0.5.4
 */

//Start the Session
session_start(); 

// Defines
define('DS', DIRECTORY_SEPARATOR);

define('ROOT_DIR', realpath(dirname(__FILE__)) . DS);
define('APP_DIR', ROOT_DIR .'application' . DS);

// Includes
require(APP_DIR  .'config'. DS .'config.php');
require(ROOT_DIR .'system'. DS .'model.php');
require(ROOT_DIR .'system'. DS .'view.php');
require(ROOT_DIR .'system'. DS .'controller.php');
require(ROOT_DIR .'system'. DS .'application.php');

// Define base URL
global $config;
define('BASE_URL', $config['base_url']);

new pip();

?>
