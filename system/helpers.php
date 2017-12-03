<?php

function dd(...$item) {
    echo "<pre>";
    var_dump(...$item);
    echo "</pre>";
    die;
}

function array_flatten($input) {
    $output = array();
    array_walk_recursive($input, function ($current) use (&$output) {
        $output[] = $current;
    });
}

function env($env) {
    return $env === $GLOBALS['config']['environment'];
}
