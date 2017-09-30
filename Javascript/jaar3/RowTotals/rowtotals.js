var number = [
  [9, 21,14, 7],
  [11, 5, 27, 15],
  [29, 17, 6, 24],
];

var count = 0;

  number.forEach(function(value, index, arr){
  document.write("<tr><td><b>" + index +  "</b></td>");
  document.write("<td>" + arr[index][0] + "</td>");
  document.write("<td>" + arr[index][1] + "</td>");
  document.write("<td>" + arr[index][2] + "</td>");
  document.write("<td>" + arr[index][3] + "</td>");
  var calculate = arr[index][0] + arr[index][1] + arr[index][2] + arr[index][3];
  document.write("<td>" + calculate + "</td></tr>");

});
