function oddeven() {
  var elements = document.querySelectorAll("ul[data-show-oddeven] li ");
  elements.forEach(function(element, index) {
    if(index % 2 == 0) {
      element.title = "Odd";
    }
    else {
      element.title = "Even";
    }
  });
}
oddeven();
