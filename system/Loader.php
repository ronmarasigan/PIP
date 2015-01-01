<?php
// Includes
$config['default_controller'] = 'main'; // Default controller to load
$config['error_controller'] = 'error'; // Controller used for errors (e.g. 404, 500 etc)

require(ROOT_DIR .'config/Config.php');
require(ROOT_DIR .'config/ConfigOverride.php');
require(ROOT_DIR .'system/engine/Model.php');
require(ROOT_DIR .'system/engine/View.php');
require(ROOT_DIR .'system/engine/Controller.php');
require(ROOT_DIR .'system/Startup.php');

?>
