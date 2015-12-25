/**
 *  This function builds canvas and drwas things on it. //dokumenteerimine
 *	@author nimi
*/

var buildCanvas = function(x, y, witdh, height) {
var canvas = document.getElementsByTagName("canvas")[0]; 
var context = canvas.getContext("2d");
context.rect(x, y, witdh, height);
context.stroke();
}

/**
 * This function draws a rectangle according to the coordinates and sizes entered in form
 */

var drawRect = function(){
	var canvas = document.getElementsByTagName("canvas")[0]; 
	//canvas.width = canvas.width;
	var context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
	
	x = document.getElementById("x").value * 1;
	y = document.getElementById("y").value * 1;
	width = document.getElementById("width").value * 1;
	height = document.getElementById("height").value * 1;
	
//Ristkülik
	context.beginPath();
	context.rect(x, y, width, height);
	context.stroke();
	context.closePath();

//Tähed
	var minHeight = height * 0.33 + y;				
	var halfHeight = height * 0.5 + y;				
	var maxHeight = height * 0.67 + y;				
	var heightOfLetter = maxHeight - minHeight;	    
	var halfHeightOfLetter = heightOfLetter / 2; 	
	var widthOfLetter = width * 0.1;				
	var halfWidthOfLetter = widthOfLetter / 2;		
	
//E
	context.beginPath();
	var xOfE = width * 0.1 + x;		
	context.moveTo(xOfE, maxHeight);	
	context.lineTo(xOfE, minHeight);	
	
	var xEndOfE = xOfE + widthOfLetter;
	context.moveTo(xOfE, maxHeight);
	context.lineTo(xEndOfE, maxHeight);
	
	var xEndOfE = xOfE + widthOfLetter;
	context.moveTo(xOfE, halfHeight);
	context.lineTo(xEndOfE, halfHeight);
	
	var xEndOfE = xOfE + widthOfLetter;
	context.moveTo(xOfE, minHeight);
	context.lineTo(xEndOfE, minHeight);
	
	var xEndOfE = xOfE + widthOfLetter;
	context.stroke();
	context.closePath();

//R
	context.beginPath();
	var xOfR = width * 0.25 + x;			
	context.moveTo(xOfR, maxHeight);	
	context.lineTo(xOfR, halfHeight);


	context.arc(xOfR, minHeight*1.25, halfHeight/6, 1.5 * Math.PI, 0.5 * Math.PI);

	var xEndOfR = xOfR + widthOfLetter;	
	context.moveTo(xEndOfR, maxHeight);
	context.lineTo(xOfR, halfHeight);
	
	context.stroke();
	context.closePath();

//I
	context.beginPath();
	var xOfI = width * 0.4 + x;		//äärest sisestatud laius * 0.5 + sisestatud x-koordinaat
	context.moveTo(xOfI, maxHeight);	//liigu tähe maksimaalsesse kõrgusesse
	context.lineTo(xOfI, minHeight);	//ja tõmba joon kuni tähe kõrguse miinimumini
	
	context.stroke();
	context.closePath();
	
//K 
	context.beginPath();
	var xOfK = (width * 0.45) + x;					
	context.moveTo(xOfK, minHeight);				
	context.lineTo(xOfK, maxHeight);
	
	var xEndOfK = xOfK + widthOfLetter;				
	context.moveTo(xEndOfK, minHeight);
	context.lineTo(xOfK, halfHeight);
	context.lineTo(xEndOfK, maxHeight);
	
	context.stroke();
	context.closePath();

//A 
	context.beginPath();
	var xOfA = (width * 0.65) + x;					
	context.moveTo(xOfA / 1.1, maxHeight);				
	context.lineTo(xOfA, minHeight);					
	context.moveTo(xOfA * 1.1, maxHeight);	
	context.lineTo(xOfA, minHeight);
	
	var xEndOfA = (width * 0.684) + x;
	context.moveTo(xOfA * 0.955, halfHeight);
	context.lineTo(xEndOfA, halfHeight);
	
	context.stroke();
	context.closePath();
	


}

