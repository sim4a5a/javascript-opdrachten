var player = document.querySelector(".player");
var vid = document.querySelector("[data-video='video']");
var vidVolume = document.querySelector("[data-video='input-volume']");
var vidProgress = document.querySelector("[data-video='video-progress']");
var vidProgressBar = document.querySelector("[data-video='progress-bar']");

function toggleFullscreen() {
  if(player.requestFullScreen) {
    player.requestFullScreen();
  } else if(player.webkitRequestFullScreen) {
    player.webkitRequestFullScreen();
  } else if(player.mozRequestFullScreen) {
    player.mozRequestFullScreen();
  }
}
function playVideo() {
  if(vid.paused) {
    vid.play();
  } else {
    vid.pause();
  }
}

function playbackVideo() {
  vid.playbackRate = document.querySelector("[data-video='input-playbackRate']").value;
}

function return10s(){
  vid.currentTime = vid.currentTime - 10;
}

function forward25s() {
  vid.currentTime = vid.currentTime + 25;
}

function volumeVideo() {
  vid.volume = vidVolume.value;
}

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
