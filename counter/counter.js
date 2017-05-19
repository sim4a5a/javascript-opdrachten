var counterDiv = document.getElementById("counter");
var counter = 0;


function count() {
  counter += 1;
  counterDiv.innerHTML = counter;

  if (counter === 100) {
    document.body.style.backgroundColor = "black";
    document.body.style.color = "white";
    clearInterval(int);
  }
}

var int  = setInterval(count, 70);
