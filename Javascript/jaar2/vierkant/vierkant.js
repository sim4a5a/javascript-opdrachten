function myFunction(){
  var width = document.getElementById("width").value;
  var height = document.getElementById("height").value;
  var color = document.getElementById("color").value;
  document.getElementById("square").style.width = width + "px";
  document.getElementById("square").style.height = height + "px";
  document.getElementById("square").style.backgroundColor = color;

}
