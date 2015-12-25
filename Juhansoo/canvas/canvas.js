/**
 * Build a canvas and build on it.
 * 
 * @author rasmus
 */
var buildCanvas = function(x, y, width, height) {
	var canvas = document.getElementById("canvas");
	var context = canvas.getContext("2d");
	context.rect(x, y, width, height);
	context.stroke();
}

var showHide = function(parameters) {
	var element = document.getElementById(parameters.id);
	if (element.style.display == "block") {
		element.style.display = "none";
		parameters.button.innerHTML = "Show";
	}
	else {
		element.style.display = "block";
		parameters.button.innerHTML = "Hide";
	}
}

/**
 * Draw a rectangle according to the coordinates and dimensions.
 */
var drawRect = function() {	
	x = document.getElementById("x").value * 1;
	y = document.getElementById("y").value * 1;
	width = document.getElementById("width").value * 1;
	height = document.getElementById("height").value * 1;
	
	var canvas = document.getElementById("canvas");
	var context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
//	canvas.width = canvas.width;

//	Rectangle
	
	context.beginPath();
	context.fillStyle = "yellow";
	context.fillRect(x, y, width, height);
	context.rect(x, y, width, height);
	context.stroke();
	context.closePath();
	
	var minHeight = height * 0.2 + y;
	var maxHeight = height * 0.8 + y;
	var minWidth = width * 0.2 + x;
	var maxWidth = width *0.8 + x;
	
//	R
	
	context.beginPath();
	context.moveTo(minWidth + x, maxHeight + y);
	context.lineTo(minWidth + x, minHeight + y);
	context.moveTo(minWidth + x, maxHeight * 3 + y);
	context.lineTo(minWidth * 3, maxHeight + y);
	context.stroke();
	context.closePath();
	context.beginPath();
	context.moveTo(minWidth * 2 + x, height / 5 + y);
	context.quadraticCurveTo(width / 5 * 3 + x, width / 5 * 2 + x, height / 5 * 3 + x, height / 5 * 3 + y);
//	context.bezierCurveTo(140, 10, 388, 10, 388, 170);
	context.stroke();
	context.closePath();
}

function changeBackground() {
	var hex = Math.floor(Math.random() * 0xFFFFFF);
	var result = "#" + ("000000" + hex.toString(16)).substr(-6);
	document.body.style.backgroundColor = result;
}