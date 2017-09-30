array = [];
document.addEventListener("keypress", rainbow);
function rainbow() {
  array.push(String.fromCharCode(event.which || event.keyCode));
     if(array.toString().replace(/,/g,'').includes("cornify")) {
     cornify_add();
    }
}
