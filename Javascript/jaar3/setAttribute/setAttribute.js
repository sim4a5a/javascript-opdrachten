function select(type){
  var doei = document.querySelectorAll(type);
  return function (blabla, valboe) {
      doei.forEach(function(value, index, arr){
        doei[index].setAttribute(blabla, valboe);
      })
  }
}
var setLinksAttr = select('a');
setLinksAttr('target', '_blank');

var setImageAttr = select('.small');
setImageAttr('width', '200');
