/*
 * This function draws a canvas
 */
/*
var buildCanvas=function(x,y,width, height){var canvas = document.getElementById("c");
var context = canvas.getContext("2d");
context.rect(x, y, width, height);
context.stroke();}
*/

var getData=function(){
	var x=document.getElementById("x").value;
	var y=document.getElementById("y").value;
	var width=document.getElementById("width").value;
	var height=document.getElementById("height").value;
	var canvas = document.getElementById("c");
	canvas.width=canvas.width;
	var context = canvas.getContext("2d");
	context.beginPath();
	context.moveTo(0,0);
	context.lineTo(0,100);
	context.moveTo(0,0);
	context.lineTo(100,0);
	context.moveTo(100,0);
	context.lineTo(100,200);
	context.lineTo(50,200);
	context.arc(0,150,5,0,Math.PI/6);
	//context.arc(50,150,5,0,Math.PI/6);
	context.rect(x, y, width, height);	
	context.stroke();

	//J täht
	
}