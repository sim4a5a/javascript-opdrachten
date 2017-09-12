function multiplyModule() {

  function multiply() {
    var numberOne = document.querySelector('input[name="firstNumber"]').value;
    var numberTwo = document.querySelector('input[name="secondNumber"]').value;
    document.querySelector("#result").innerHTML = numberOne * numberTwo;
  }

  document.querySelector('#multiply').addEventListener('click', multiply);
}

multiplyModule();
