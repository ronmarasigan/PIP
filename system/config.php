<?php 
    // Mode
    $config['production'] = false;

    // URL
    if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
        $config['base_url'] = 'https://'.$_SERVER['HTTP_HOST'].'/';
    } else {
        $config['base_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/';
    }

    // Database credentials and default/permitted controllers
    require_once('db.php');
    require_once('controllers.php');
?>
