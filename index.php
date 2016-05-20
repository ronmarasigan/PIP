<?php
/*
 * Ligero 0.01
 * 
 */
session_start(); //Inicio de Seccion 

// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'ligero/application/');

// Includes
require(ROOT_DIR .'ligero/system/config.php');
require(ROOT_DIR .'ligero/system/model.php');
require(ROOT_DIR .'ligero/system/view.php');
require(ROOT_DIR .'ligero/system/controller.php');
require(ROOT_DIR .'ligero/system/ligero.php');


global $config;// Define base URL
define('BASE_URL', $config['base_url']);
//Static
define('STATIC_URL', $config['base_url']);

ligero();

?>
