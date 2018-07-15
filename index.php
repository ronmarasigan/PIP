<?php
/*
 * PIP v0.5.3
 */

//Start the Session
session_start();

// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'application/');

// Includes
require(APP_DIR .'config/config.php');
global $config;

require(ROOT_DIR .'system/helpers.php');

if (env('DEV')) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

require(ROOT_DIR .'system/model.php');
require(ROOT_DIR .'system/view.php');
require(ROOT_DIR .'system/controller.php');
require(ROOT_DIR .'system/pip.php');

define('BASE_URL', $config['base_url']);

pip();

?>
