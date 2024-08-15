<?php

require_once 'config/config.php';

// Load Helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';


// Libraries autoload
function app_autoload($class_name): void
{
    require_once 'libraries/' . $class_name . '.php';
}

spl_autoload_register('app_autoload');




