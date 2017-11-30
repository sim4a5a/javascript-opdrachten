<style>

img {
  width: 20em;
}
</style>
<?php

  abstract class Dice {
    private $startNumber;
    private $endNumber;
    private $randomNumber;

    public function __construct($startNumber, $endNumber) {
      $this->startNumber = $startNumber;
      $this->endNumber = $endNumber;
    }

    private function getStartNumber() {
      return($this->startNumber);
    }

    private function getEndNumber() {
      return($this->endNumber);
    }

    protected function generateNumber() {
      $this->randomNumber = rand($this->getStartNumber(), $this->getEndNumber());
      return($this->randomNumber);
    }

    public function getNumber() {
      return($this->generateNumber());
    }

    abstract public function roll();

  }

  class WhiteDice extends Dice {
   private $allPictures = [
     'images/dice-six-faces-one.png',
     'images/dice-six-faces-two.png',
     'images/dice-six-faces-three.png',
     'images/dice-six-faces-four.png',
     'images/dice-six-faces-five.png',
     'images/dice-six-faces-six.png',

   ];

   public function roll() {
     $diceNumber = $this->generateNumber();
     return($this->allPictures[$diceNumber-1]);
   }

  }

  class BlackDice extends Dice {
    private $allPictures = [
        'images/inverted-dice-1.png',
        'images/inverted-dice-2.png',
        'images/inverted-dice-3.png',
        'images/inverted-dice-4.png',
        'images/inverted-dice-5.png',
        'images/inverted-dice-6.png',
      ];

      public function roll() {
        $diceNumber = $this->generateNumber();
        return($this->allPictures[$diceNumber-1]);
      }

    }

    class PerspectiveDice extends Dice {
      private $allPictures = [
          'images/perspective-dice-six-faces-one.png',
          'images/perspective-dice-six-faces-two.png',
          'images/perspective-dice-six-faces-three.png',
          'images/perspective-dice-six-faces-four.png',
          'images/perspective-dice-six-faces-five.png',
          'images/perspective-dice-six-faces-six.png',
          'images/perspective-dice-six-faces-random.png',
        ];

        public function roll() {
          $diceNumber = $this->generateNumber();
          return($this->allPictures[$diceNumber-1]);
        }

      }

      final class ThreeDDice extends Dice {
        private $allPictures = [
            'images/perspective-dice-1.png',
            'images/perspective-dice-2.png',
            'images/perspective-dice-3.png',
            'images/perspective-dice-4.png',
            'images/perspective-dice-5.png',
            'images/perspective-dice-6.png',
          ];

          public function roll() {
            $diceNumber = $this->generateNumber();
            return($this->allPictures[$diceNumber-1]);
          }

        }

$Dice = new WhiteDice(1,6);
echo '<img src="' . $Dice->roll() . '">&nbsp;&nbsp;';
$Dice2 = new BlackDice(1,6);
echo '<img src="' . $Dice2->roll() . '">&nbsp;&nbsp';
$Dice3 = new PerspectiveDice(1,7);
echo '<img src="' . $Dice3->roll() . '">&nbsp;&nbsp';
$Dice4 = new ThreeDDice(1,6);
echo '<img src="' . $Dice4->roll() . '">&nbsp;&nbsp';






 ?>
