<?php

function dd(...$item) {
    echo "<pre>";
    var_dump(...$item);
    echo "</pre>";
    die;
}

function env($env) {
    return $env === $GLOBALS['config']['environment'];
}
