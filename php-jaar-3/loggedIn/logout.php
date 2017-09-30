<?php
 session_start();
  echo "Je bent uitgelogd";
  session_destroy();   // function that Destroys Session
  header("Location: Login.php");
?>
