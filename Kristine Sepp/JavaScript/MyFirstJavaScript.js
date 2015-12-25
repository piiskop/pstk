/**
 * 
 */

/*
var commonParameters = [ { 'Laul' : 'Mälestused', 'Esitaja' : 'Koit Toome' }, {
'Laul' : 'Mis värvi on armastus?', 'Esitaja' : 'Uno Loop' } ]; 

var laul3 = {
'Laul' : 'Ilus laul', Esitaja : 'Anne Veski' }; commonParameters.push(laul3);

for ( var reanumber in commonParameters) {
 * console.log(commonParameters[reanumber].Laul);
 * console.log(commonParameters[reanumber].Esitaja); }
 * 
 * commonParameters.forEach (function (value, index, object) {
 * console.log(value.Laul); });
 * 

	 * var teineLaul = commonParameters[1].Laul;
	 * 
	 * commonParameters.splice(0, 1);

/*
 * var canvas = document.getElementById("canvas"); var context =
 * canvas.getContext("2d"); var x = 45; var y = 15; var n = 40; var m = 90;
 * context.beginPath(); context.rect(x, y, n, m); context.stroke();
 * context.closePath();
 * 
 * context.beginPath();
 * 
 * context.moveTo(x + 5, y + 5); context.lineTo(x + 5, m + 10);
 * 
 * context.moveTo(x + 5, x + 15); context.lineTo(x + 25, y + 5);
 * 
 * context.moveTo(x + 5, x + 15); context.lineTo(x + 25, m + 10);
 * context.stroke(); context.closePath();
 * 
 * function getRandomIntInclusive(parameters) { return Math.floor(Math.random() *
 * (parameters.max - parameters.min + 1)) + parameters.min; } function
 * setGlobal(parameters) { window[parameters.name] = parameters.value; } var
 * setBackground = function(parameters) { var red = getRandomIntInclusive({ min :
 * 0, max : 255 });
 * 
 * var blue = getRandomIntInclusive({ min : 0, max : 255 });
 * 
 * var green = getRandomIntInclusive({ min : 0, max : 255 });
 * 
 * if (parameters.appWide) { setGlobal({ 'name' : "red", value : red });
 * setGlobal({ 'name' : "blue", value : blue }); setGlobal({ 'name' : "green",
 * value : green }); document.body.style.backgroundColor = "rgb(" + window.red + ", " +
 * window.blue + ", " + window.green + ")"; } else {
 * document.body.style.backgroundColor = "rgb(" + red + ", " + blue + ", " +
 * green + ")"; } }
 * 
 * var showHide = function(parameters) { var element =
 * document.getElementById(parameters.id); if (element.style.display == "block") {
 * element.style.display = "none"; parameters.button.innerHTML = 'Näitan.'; }
 * else { element.style.display = "block"; parameters.button.innerHTML =
 * 'Peidan.'; } }
 * 
 * 
 *  /* function start() { var button = document.getElementById("startButton");
 * if (button.click === true) {
 * document.getElementById("startButton").style.display = "none";
 * document.getElementById("EsimeneKüsimus").style.display = "block"; } }
 */

function calculateEviction() {
	var checkbox = document.getElementById("EsimeneKüsimus");
	if (checkbox.checked === true) {
		document.getElementById("Esimene").style.display = "none";
		document.getElementById("Teine").style.display = "block";
	} else {
		document.getElementById("Esimene").style.display = "none";
		document.getElementById("Kolmas").style.display = "block";
	}
}

function calculateEviction1 () {
	var checkbox = document.getElementById("TeineKüsimus");
	if (checkbox.checked === true) {
		document.getElementById("Teine").style.display = "none";
		document.getElementById("Neljas").style.display = "block";
	} else {
		document.getElementById("Teine").style.display = "none";
		document.getElementById("Viies").style.display = "block";
	}
}

function calculateEviction2 () {
	var checkbox = document.getElementById("KolmasKüsimus");
	if (checkbox.checked === true) {
		document.getElementById("Kolmas").style.display = "none";
		document.getElementById("Teine").style.display = "block";
	} else {
		document.getElementById("Kolmas").style.display = "none";
		document.getElementById("Neljas").style.display = "block";
	}
}
