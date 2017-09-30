document.addEventListener("mousemove", coordination);
var followX = [];
var followY = [];
  function coordination(){
    var x = event.clientX;
    var y = event.clientY;
    followX.push(x);
    followY.push(y);
  }

var i = 0;
document.addEventListener("click", followMouse);

  function followMouse(){
    document.removeEventListener("click", followMouse);
    document.removeEventListener("mousemove", coordination);
    var mouse = setInterval(function(){
    if(i == followY.length){
      document.addEventListener("mousemove", coordination);
      document.addEventListener("click", followMouse);
      clearInterval(mouse);
      i = 0;
      followX = [];
      followY = [];
    }
    else{
      document.getElementById('rondje').style.left = followX[i]+'px';
      document.getElementById('rondje').style.top = followY[i]+'px';
      i++;
    }
  });
  }
