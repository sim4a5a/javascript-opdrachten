<?php

require_once('Showinfo.php');

/**
 * @param string $brand
 * @param string $model
 * @param string $fuel
 * @param string $color
 */
interface CarInterface
{
  public function ___construct($brand, $model, $fuel, $color = 'green');
  public function getFuel();
  public function setFuel($fuel);
  public function getColor();
  public function setColor($color);

}

class Car implements CarInterface, InfoInterface {

  //public functions
  public $brand;
  public $model;

  //private functions
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
   }


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
