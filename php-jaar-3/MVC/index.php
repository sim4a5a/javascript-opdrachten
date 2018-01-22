<?php

// exec controller actie
// index.php?controller=page&action=about
// index.php?controller=page&action=home


/**
* initialization f.e.
*   - making DB connection
*   - start sessions
*   - loading configuration setting / files
*   - loading language settings / files
*/

// constants
define('APP_PATH', __DIR__);

//includes
require_once 'libs/functions.php';

// get sanitized vars ("controller" and "action")
$controller = filter_input(INPUT_GET, 'controller', FILTER_SANITIZE_URL);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_URL);

// set default controller and action
if($controller ===  null || $action === null) {
  $controller = 'page';
  $action = 'home';
}


// load controller file (when file exists)
$controllerClassName = ucfirst($controller) . 'Controller';
$controllerFile = 'controllers/' . $controllerClassName . ".php";

if (file_exists($controllerFile)) {
  require_once $controllerFile;
} else {
  throw new Exception('Controller "' .$controllerFile .'" file does not exist');
}

// create controller object (when class exists)
if(class_exists($controllerClassName)) {
  $controllerObject = new $controllerClassName();
} else {
  throw new Exception('Class "' . $controllerClassName .'" does not exist');
}

// call action method (when method exists)
if(method_exists($controllerObject, $action)) {
  $controllerObject->{$action} ();
} else {
  throw new Exception('Action "' . $action .'" does not exist');
}



 ?>
