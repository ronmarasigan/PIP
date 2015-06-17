<?php 
    // Mode
    $config['production'] = false;
    
    // Session rotation interval
    $config['rotation_interval'] = 20;    
    
    // Session cookie settings
    $config['session_name'] = 'pip'; // Change me
    $config['http_only'] = true; // You really shouldn't change this
    $config['cookie_lifetime'] = 3600; // 1 hour in seconds

    // URL
    if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
        $config['base_url'] = 'https://'.$_SERVER['HTTP_HOST'].'/';
        $config['https_cookie'] = true;
    } else {
        $config['base_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/';
        $config['https_cookie'] = false;
    }

    // Database credentials and default/permitted controllers
    require_once('db.php');
    require_once('controllers.php');
?>
