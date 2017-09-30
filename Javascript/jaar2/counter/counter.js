document.querySelector("[data-time='20']").addEventListener("click", function(){init(20000);});
document.querySelector("[data-time='300']").addEventListener("click", function(){init(300000);});
document.querySelector("[data-time='900']").addEventListener("click", function(){init(900000);});
document.querySelector("[data-time='1200']").addEventListener("click", function(){init(1200000);});
document.querySelector("[data-time='3600']").addEventListener("click", function(){init(3600000);});

document.querySelector("#custom input").addEventListener("change", function(){init(document.querySelector("#custom input").value * 100);});

var Time;
var now;
var endTime;
var x;

function init(Count)
{
	clearInterval(x);
	Time = Count;
	x = setInterval(CountDown, 1000)
	now = new Date().getTime();
	endTime = now + Time;
	Endtime(endTime);
}

function CountDown(Count)
{
	var minutes = Math.floor((Time % (1000 * 60 * 60)) / (1000 * 60));
	var seconds = Math.floor((Time % (1000 * 60)) / 1000);

	if(minutes == 0){minutes = '00'}
	if(seconds == 0 ){seconds = '00'}

	document.querySelector("div .display__time-left").innerHTML = minutes + ':' + seconds;

	if (new Date().getTime() >= endTime) {
		clearInterval(x);
		document.querySelector("div .display__time-left").innerHTML =  '00:00';
	}
	else
	{
		Time -= 1000;
	}
}

function Endtime(endtime)
{
	var hours = Math.floor((endtime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	var minutes = Math.floor((endtime % (1000 * 60 * 60)) / (1000 * 60));

	document.querySelector("div .display__end-time").innerHTML = "Done at " + (hours+2) + ":" + minutes;

}
