<?php

require_once 'config/config.php';

/*
* require_once 'libraries/Core.php';
* require_once 'libraries/Controller.php';
* require_once 'libraries/Database.php';
*/
function app_autoload($class_name)
{
    require_once 'libraries/' . $class_name . '.php';
}
spl_autoload_register('app_autoload');