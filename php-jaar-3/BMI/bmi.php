<!DOCTYPE html>
<html>
<head>
  <title>Bereken BMI</title>
  <link rel="stylesheet" href="bmi.css" type="text/css">
</head>

<body>
  <form action="" method="post" class="form">
    <table>
      <tr>
        <td>Uw gewicht in kg:</td>
        <td><input type="int" name="gewicht"/></td>
      </tr>
      <tr>
        <td>Uw lengte in cm:</td>
        <td><input type="int" name="lengte"/></td>
      </tr>
      <tr>
        <td><input type="submit" name="bereken" value="Bereken BMI"/></td>
      </tr>
    </table>
  </form><br><br>

  <?php

  //BMI calculation

  if(isset($_POST['bereken'])) {
  $gewicht = $_POST['gewicht'];
  $lengte = $_POST['lengte'];

  $lengte =  $lengte / 100;
  $kwadraat = $lengte * $lengte;
  $bmi = $gewicht / $kwadraat;
  $bmi = round($bmi);
  echo "Gewicht:" . $gewicht . "<br>Lengte:" . $lengte . "<br>Uw BMI is:" . $bmi;
}

  //change color

  function colorCookie($color) {
  setcookie('color', $color, time() + 1000);
}

  if(isset($_GET['color'])) {
    updateColorCookie($_GET['color']);
    changeColor($_GET['color']);
  } else if(isset($_COOKIE['color'])) {
    changeColor($_COOKIE['color']);
  } else {
    changeColor();
  }

  function changeColor($color = false) {
    if(!$color) {
      echo "<body>";
    } else {
      echo '<body style="background-color: ' . $color . ';">';
    }
  }

  ?>
<br><br>
<h2>Kies een achtergrond kleur:</h2>
    <button><a href="?color=blue">blauw</a></button>
    <button><a href="?color=red">rood</a></button>
</body>
</html>
