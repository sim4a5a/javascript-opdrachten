<?php
session_start();
?>
<?php
if(isset($_SESSION['user'])) {
  header("location:home.php");
}
if(isset($_POST['login'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];

if($user == "open" && $pass == "sesame") {
  $rem = $_POST['remember'];
  if(isset($_POST['remember'])) {
  setcookie('user', $user, time()+60*60*7);
}
  $_SESSION['use']=$user;
  echo '<script type="text/javascript"> window.open("home.php", "_self");</script>';
} else {
  echo "Verkeerde gebruikersnaam of wachtwoord";
}
}

?>
<html>
<head>
<title>Login</title>
</head>

<body>

<form action="" method="post">
    <table width="200" border="0">
  <tr>
    <td>Gebruikersnaam</td>
    <td><input type="text" name="user"></td>
  </tr>
  <tr>
    <td>Wachtwoord</td>
    <td><input type="password" name="pass"></td>
  </tr>
  <tr>
    <td><input type="checkbox" name="remember" value="1">Remember me</td>
    <td><input type="submit" name="login" value="Login"></td>
    <td></td>
  </tr>
</table>
</form>

</body>
</html>
