<?php


class Car {

  public $brand;
  public $model;
  private $fuel = null;
  private $color;

  public function ___construct($brand, $model, $fuel, $color = 'green') {
    $this->brand = $brand;
    $this->model = $model;
    $this->fuel = $fuel;
    $this->color = $color;
  }

  public function showInfo() {
     return 'Merk: ' . $this->brand . ', model: ' . $this->model . ', kleur: ' . $this->color . ', brandstof: ' . $this->fuel;
   }y



  public function getFuel(){
    return $this->fuel;

  }

  public function setFuel($fuel) {
    $this->fuel = $fuel;

  }

  public function getColor() {
    return $this->color;
  }

  public function setColor($color){
    if ($color == 'green' || $color == 'red' || $color == 'blue') {
      $this->color = $color;
    }
    return $this->color;
  }

  public function GoodFuel() {
    if ($this->fuel == 'Electric') {
      return true;
    } else {
      return false;
    }
  }

}


$ford = new Car('Ford', 'Mustang');
$ford->setFuel('Gasoline');
echo $ford->getFuel();
echo $ford->showInfo();
echo $ford->setColor('red');
var_dump($ford->GoodFuel());


 ?>
