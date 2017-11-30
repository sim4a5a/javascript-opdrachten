<?php
class Calculate{
  protected $numberOne = null;
  protected $numberTwo = null;
  protected $values = array();
  protected $result = null;



  public function showResult(){
    return $this->result;
  }
  public function NumberOne(){
    return $this->numberOne;
  }
  public function NumberTwo(){
    return $this->numberTow;
  }
  public function setArray($values){
      $this->values = $values;
  }

}
class Adding extends Calculate{
  public function cal(){
      $this->result = $this->numberOne + $this->numberTwo;
  }
  public function calMulti(){
    foreach ($this->values as $key => $value) {
      $this->result = ($this->result + $value);
    }
 }
}

class Subtracting extends Calculate{
  public function cal(){
      $this->result = $this->numberOne - $this->numberTwo;
  }
  public function calMulti(){
    foreach ($this->values as $key => $value) {
      $this->result = ($value - $this->result);
    }
 }
}
class Multiply extends Calculate{
  public function cal(){
      $this->result = $this->numberOne * $this->numberTwo;
  }
  public function calMulti(){
    foreach ($this->values as $key => $value) {
     if($this->result === null){
        $this->result = $value;
    }
    else{
        $this->result = ($value * $this->result);
    }
    }
 }
}
class Divide extends Calculate{
    public function cal(){
        $this->result = $this->numberOne / $this->numberTwo;
    }
    public function calMulti(){
      foreach ($this->values as $key => $value) {
        if($this->result === null){
          $this->result = $value;
        }
        else{
        $this->result = ($value / $this->result);
      }
      }
   }


}


$Adding = new Adding();
$Adding->setArray(array(10,2,1));
$Adding->calMulti();
echo $Adding->showResult();
echo '<br>';
$Subtracting = new Subtracting();
$Subtracting->setArray(array(13,5,4));
$Subtracting->calMulti();
echo $Subtracting->showResult();
echo '<br>';
$Multiply = new Multiply();
$Multiply->setArray(array(1,2,3));
$Multiply->calMulti();
echo $Multiply->showResult();
echo '<br>';
$Divide = new Divide();
$Divide->setArray(array(11,69,15));
$Divide->calMulti();
echo $Divide->showResult();
echo '<br>';







 ?>
