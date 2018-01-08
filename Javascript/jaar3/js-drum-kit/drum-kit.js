
document.addEventListener("keypress", function(event) {
  var key = event.keyCode;
  document.querySelector("audio[data-key='" + key +"']").play();
  document.querySelector("div[data-key='" + key + "']").classList.toggle('playing');
  setTimeout( function() {
  document.querySelector("div[data-key='" + key + "']").classList.toggle('playing');
}, 500);


});
