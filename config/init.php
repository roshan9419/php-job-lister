<?php 
// Config file
require_once 'config.php';

// Autoloader
function __autoload($class_name) {
    require_once 'lib/'.$class_name.'.php';
}

// echo "Initialized";