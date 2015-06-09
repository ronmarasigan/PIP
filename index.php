<?php
    session_start(); 

    define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
    define('APP_DIR', ROOT_DIR .'application/');

    require(ROOT_DIR .'system/config.php');
    require(ROOT_DIR .'system/model.php');
    require(ROOT_DIR .'system/view.php');
    require(ROOT_DIR .'system/controller.php');
    require(ROOT_DIR .'system/pip.php');

    global $config;
    define('BASE_URL', $config['base_url']);
    
    // PHP settings for dev mode 
    if(!$config['production']) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('memory_limit', '-1');
        set_time_limit(0);
    }

    // Call PIP
    pip();
?>
