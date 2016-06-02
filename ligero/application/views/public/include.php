<?php

defined('APP_DIR') OR exit('-_- no eres Humano ?');
$url = dameURL();

if ($url == "/" or $url == "/main") {
    echo '<link rel="stylesheet" href="'.STATIC_URL.'css/style.css" type="text/css" media="screen" />';
} else {
     echo '<link rel="stylesheet" href="'.STATIC_URL.'css/style.css" type="text/css" media="screen" />';
}