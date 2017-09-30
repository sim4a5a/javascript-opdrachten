<?php
session_start();
?>

<html>
  <head>
       <title> Home </title>
  </head>
  <body>
<?php

if(!isset($_SESSION['use'])){
"je bent niet ingelogged";

} else{
  echo "Je bent ingelogd<br>";
  echo "<button><a href='logout.php'> Logout</a></button> ";
}
?>
</body>
</html>
