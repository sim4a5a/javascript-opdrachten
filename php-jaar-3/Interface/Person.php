<?php

require_once('Showinfo.php');

class Person implements InfoInterface {

    public $name;
    private $age;
    public function __construct($name) {
        $this->name = $name;
    }
    public function showInfo() {
        return 'Dit is ' . $this->name . ' en zijn/haar leeftijd is ' . $this->age;
    }
    public function setAge($age) {
        if ($age >= 0 && $age <= 150) {
            $this->age = $age;
        }
        return $age;
    }
    public function getAge($age) {
        $this->age = $age;
    }
    public function adultOrNot() {
        if ($this->age > 18) {
            return true;
        } else {
            return false;
        }
    }
}
$tim = new Person('Tim', 21);
echo $tim->showInfo();
echo $tim->setAge(150);
echo "<br>";
$sharron = new Person('Shannon', 21);
echo $sharron->showInfo();





 ?>
