<?php
    // Base paths
    define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
    define('APP_DIR', ROOT_DIR .'application/');
    require(ROOT_DIR .'system/config.php');
    
    // Settings 
    global $config;
    define('BASE_URL', $config['base_url']);

    /* Secure session
    if(session_id() == '' || !isset($_SESSION)) {
        session_name($config['session_name']);
        session_set_cookie_params($lifetime = $config['cookie_lifetime'], $secure = $config['https_cookie'], $http_only = $config['http_only']);
        session_start();
    } else {
        session_start();
    } */

    // Start a session
    session_start(); 
    
    // Set variable for tracking the number of requests per session id
    if(!isset($_SESSION['regen'])) {
        $_SESSION['regen'] = 0;
    }
    
    // Rotate session id every N requests to protect from session fixation
    if(++$_SESSION['regen'] > $config['rotation_interval']) {
        $_SESSION['regen'] = 0;
        session_regenerate_id(true);
    }     
    
    // PHP settings for dev mode 
    if(!$config['production']) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('memory_limit', '-1');
        set_time_limit(0);
    }

    // Base classes for application
    require(ROOT_DIR .'system/model.php');
    require(ROOT_DIR .'system/view.php');
    require(ROOT_DIR .'system/controller.php');
    require(ROOT_DIR .'system/pip.php');

    // Call PIP
    pip();
?>
