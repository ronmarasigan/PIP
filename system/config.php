<?php 
    // Mode
    $config['production'] = true;

    // URL
    if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
        $config['base_url'] = 'https://'.$_SERVER['HTTP_HOST'].'/';
    } else {
        $config['base_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/';
    }
    
    // Database
    $config['db_host'] = '';
    $config['db_name'] = '';
    $config['db_user'] = '';
    $config['db_pass'] = '';

    // Controllers
    require_once('controllers.php');
?>
