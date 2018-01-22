<?php

/**
 * Global functions
*/

/**
 * Renders given view file
 * @param string $viewPath
 * @param array $vars
*/

function loadView($viewPath, $vars = []) {

  // make "normal" vars for view
  extract($vars);

  // load view file
  include APP_PATH . '/views/' . $viewPath . '.php';
}

/**
 * Get current database connection, when called first time the connection will be created
 * @staticvar recource $connection
 * @return \PDO
 * @throws Exception
 */

 function getDbConnection() {

   static $connection = null;

   // return connection when already exists
   if($connection !==  null) {
     return $connection;
   }

   // database settings
   // @todo should be part of app configuration settings
   $host = 'localhost';
   $dbname = 'my_web_app';
   $username = 'root';
   $password = '';

   try {
    $connection = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);

    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    throw new Exception('Connection failed: ' . $e->getMessage());
}

return $connection;
}

 ?>
