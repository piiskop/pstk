/**
 * 
 */

var drawRect = function() {
	var xPos = document.getElementById("x").value*1;
	var yPos = document.getElementById("y").value*1;
	var xSize = document.getElementById("width").value*1;
	var ySize = document.getElementById("height").value/2;
	var xScale = xSize/100;
	var yScale = ySize/100;
	var sScale = xSize*ySize/10000 
	var canvas = document.getElementsByTagName("canvas")[0];
	var context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
	//Raam
	context.beginPath();
	context.rect(xPos,yPos,xSize,ySize);
	context.stroke();
	context.closePath();
	//Täht A
	context.beginPath();
	context.moveTo(xPos+30*xScale,yPos+ySize-10*yScale);
	context.lineTo(xPos+50*xScale,yPos+10*yScale);
	context.lineTo(xPos+70*xScale,yPos+ySize-10*yScale);
	context.moveTo((xPos+50*xScale)-(xSize-60*xScale)*0.30,yPos+ySize-40*yScale);
	context.lineTo((xPos+50*xScale)+(xSize-60*xScale)*0.30,yPos+ySize-40*yScale);
	context.stroke();
	context.closePath();
}