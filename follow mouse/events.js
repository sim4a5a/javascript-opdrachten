function SomeEvent(event) {
  var x = event.pageX + "px";
  var y = event.pageY + "px";
  document.getElementById("rondje").style.top = y;
  document.getElementById("rondje").style.left = x;

}

function ClickEvent(event) {
  document.getElementById("rondje").style.backgroundColor = "red";
  document.getElementById("rondje").style.borderRadius = "0px";
  document.getElementById("rondje").style.width = "50px";
  document.getElementById("rondje").style.height ="50px";
}


document.addEventListener("mousemove" , SomeEvent);
document.addEventListener("click" , ClickEvent);
