document.getElementById("send").addEventListener("click", Add);

var parser = new DOMParser();

function Add() {
  var obj = getResponse("api-employees.php");
  var parse = JSON.parse(obj);

  document.getElementById("result").innerHTML = obj;
  document.getElementById("employeeName").innerHTML = "Employee name: " + parse.employees[0].name;
  document.getElementById("tabel").innerHTML = "<tr><th>Employee Name</th><tr><td>" + parse.employees[0].name + "</td></tr>";

}

function getResponse(url) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", url, false);
  xhr.send();

  return xhr.responseText;
}
