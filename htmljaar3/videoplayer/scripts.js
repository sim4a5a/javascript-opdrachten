var player = document.querySelector(".player");
var vid = document.querySelector("[data-video='video']");
var vidVolume = document.querySelector("[data-video='input-volume']");
var vidProgress = document.querySelector("[data-video='video-progress']");
var vidProgressBar = document.querySelector("[data-video='progress-bar']");


//videplayer fullscreen
function toggleFullscreen() {
  if(player.requestFullScreen) {
    player.requestFullScreen();
  } else if(player.webkitRequestFullScreen) {
    player.webkitRequestFullScreen();
  } else if(player.mozRequestFullScreen) {
    player.mozRequestFullScreen();
  }
}

//function that plays the video if pressed on play
function playVideo() {
  if(vid.paused) {
    vid.play();
  } else {
    vid.pause();
  }
}


//function that can play the video fast or slow
function playbackVideo() {
  vid.playbackRate = document.querySelector("[data-video='input-playbackRate']").value;
}

//function that the video can go 10 seconds back
function return10s(){
  vid.currentTime = vid.currentTime - 10;
}

//function that the video can go 25 seconds forward
function forward25s() {
  vid.currentTime = vid.currentTime + 25;
}


//function that controls the volume
function volumeVideo() {
  vid.volume = vidVolume.value;
}

//function that
function barPosition() {
    var barWidthPercentage = (event.clientX - (document.body.clientWidth - vidProgress.offsetWidth) / 2) / vidProgress.offsetWidth * 100;
    vidProgressBar.style.width = barWidthPercentage + "%";
    vidProgressBar.style.flexBasis = barWidthPercentage + "%";
    vid.currentTime = (vid.duration / 100) * barWidthPercentage;
}


vid.addEventListener("timeupdate", function(){
    vidProgressBar.style.width = (vid.currentTime / vid.duration) * 100 + "%";
    vidProgressBar.style.flexBasis = (vid.currentTime / vid.duration) * 100 + "%";
});

vidProgress.addEventListener("mousedown", function(){
    barPosition();
    vidProgress.onmousemove = function() {
        barPosition();
    }
});

vidProgress.addEventListener("mouseup", function() {
    vidProgress.onmousemove = null;
});

document.querySelector("[data-video='btn-play']").addEventListener("click", playVideo);
vidVolume.addEventListener("click", volumeVideo);
vidVolume.addEventListener("mousemove", volumeVideo);
document.querySelector("[data-video='input-playbackRate']").addEventListener("click", playbackVideo);
document.querySelector("[data-video='input-playbackRate']").addEventListener("mousemove", playbackVideo);
document.querySelector("[data-skip='-10']").addEventListener("click", return10s);
document.querySelector("[data-skip='25']").addEventListener("click", forward25s);
document.querySelector("[data-video='toggle-screen']").addEventListener("click", toggleFullscreen);
