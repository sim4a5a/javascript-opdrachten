<?php

abstract class User {

  private $username;
  private $password;


  public function ___construct($username, $password) {
    $this->username = $username;
    $this->password = $password;
  }

  public function getUsername() {
    return ($this->username);
  }

  public function getPassword() {
    return ($this->password);
  }

  /**
* Check if given password is correct for this user
* @param string $password
* @return boolean
*/

  private function encryptPassword($password) {
    $options = [
      'cost' => 12,
    ];
    return (password_hash($password, PASSWORD_BCRYPT, $options));
  }

  public function changePassword($password) {
    $hashedPassword = $this->encryptPassword($password);
    $this->password = $hashedPassword;
  }

  public function checkPassword($password) {
        if (password_verify($password, $this->password) === true) {
          return(true);
        }
        else {
          return(false);
        }
      }
      abstract public function doStuff();
    }


class Supervisor extends User {
  public function doStuff() {
  echo 'Thomas logged in as: Supervisor';
 }
}

class NormalUser extends User {
  public function doStuff() {
  echo 'Anna logged in as: Normal User';
 }
}


$Thomas = new Supervisor('thomas', 'legend32');
$Thomas->doStuff();
echo "<br>";
$Anna = new NormalUser('anna' , 'whatevah96');
$Anna->doStuff();








 ?>
