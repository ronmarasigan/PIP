<?php
/**
 * Header View 
 *
 * This should be included at the top of all other views
 *
 * @author Gilbert Pellegrom
 * @package PIP
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    
    <title><?php echo ( isset($title)) ? $title : ''; ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/style.css" type="text/css" media="screen" />
</head>
<body>
