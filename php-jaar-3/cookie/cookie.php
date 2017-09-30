
<?php

$cookie_tekst ="Deze website maakt gebruik van cookies. Deze dient u te accepteren.";
$cookie_tekst2 = "U heeft de voorwaarden geaccepteerd.";
setcookie('test', $cookie_tekst2, time() + 10); // 86400 = 1 day

if (!isset($_COOKIE['cookieAcceptation'])) {
  echo $cookie_tekst;
} else {
  echo $cookie_tekst2;
}
 ?>


 <form method="post">
   <input type="submit" name="cookieAcceptation" value="toestaan">
 </form>
