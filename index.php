<?php
/**
 * PIP Bootstrapper
 *
 * This file is called for every URL request
 * If lays all the ground work before starting PIP
 *
 * @author Gilbert Pellegrom
 * @package PIP
 * @version v0.5.3
 */

//Start the Session
session_start(); 

// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'application/');

// Include dependencies
require(APP_DIR .'config/config.php');
require(ROOT_DIR .'system/load.php');
require(ROOT_DIR .'system/model.php');
require(ROOT_DIR .'system/view.php');
require(ROOT_DIR .'system/controller.php');
require(ROOT_DIR .'system/pip.php');

// Define base URL
global $config;
define('BASE_URL', $config['base_url']);

// Start PIP
pip();

?>
