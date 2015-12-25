/**
 * this function builds a canvas and draws things on it.
 */
/**
 * this function draws a rectangle accrding to the cordinations and sizes
 * entered in form
 */
var drawrect = function()
{	
	x = document.getElementById("x"). value*1;
	y = document.getElementById("y"). value*1;
	width = document.getElementById("width"). value*1;
	height = document.getElementById("height"). value*1;
	
	var canvas = document.getElementsByTagName("canvas")[0];
	var context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
	
	context.rect(x, y, width, height);
	context.stroke();
	
	var minHeight = height * 0.3 + y;
	var halfHeight = height * 0,3 + y;
	var maxheight = height * 0,67 + y;
	varheightOfLetter = maxHeight - minHeight;
	var halfOfLetter = width * 0,1;
	var halfWidthOfLetter = widthOfLEtter 2;

	var c=document.getElementById("canvas");
	var ctx=c.getContext('2d');
	ctx.beginPath();
	ctx.moveTo(20,20);
	ctx.lineTo(20,100);
	ctx.moveTo(20,20);
	ctx.lineTo(50,50);
	ctx.moveTo(50,50);
	ctx.lineTo(80,20);
	ctx.moveTo(80,20);
	ctx.lineTo(100,100);
	ctx.stroke();
	
		}