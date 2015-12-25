function drawEllipse(context, centerX, centerY, width, height) {

	context.beginPath();

	context.moveTo(centerX, centerY - height / 2); // A1

	context.bezierCurveTo(centerX + width / 2, centerY - height / 2, // C1
	centerX + width / 2, centerY + height / 2, // C2
	centerX, centerY + height / 2); // A2

	context.bezierCurveTo(centerX - width / 2, centerY + height / 2, // C3
	centerX - width / 2, centerY - height / 2, // C4
	centerX, centerY - height / 2); // A1

	context.stroke();
	context.closePath();
	
	return context;
}

/**
 * This function draws a rectangle according to the coordinates and sizes
 * entered in form.
 * 
 */
var drawRect = function() {
	x = document.getElementById("x").value * 1;
	y = document.getElementById("y").value * 1;
	width = document.getElementById("width").value * 1;
	height = document.getElementById("height").value * 1;

	var canvas = document.getElementsByTagName("canvas")[0];
	var context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);

	// Rectangle

	context.beginPath();
	context.fillStyle = "yellow";
	context.rect(x, y, width, height);
	context.stroke();
	context.closePath();

	// Letters

	var minHeight = height * 0.33 + y;
	var halfHeight = height * 0.5 + y;
	var maxHeight = height * 0.67 + y;
	var heightOfLetter = maxHeight - minHeight;
	var halfHeightOfLetter = heightOfLetter / 2;
	var widthOfLetter = width * 0.1;
	var halfWidthOfLetter = widthOfLetter / 2;

	// K

	context.beginPath();
	var xOfK = (width * 0.1) + x;
	console.log(" 39: x: " + x + ", width: " + width + ", xOfK: " + xOfK);
	context.moveTo(xOfK, minHeight);
	context.lineTo(xOfK, maxHeight);
	var xEndOfK = xOfK + widthOfLetter;
	context.moveTo(xEndOfK, minHeight);
	context.lineTo(xOfK, halfHeight);
	context.lineTo(xEndOfK, maxHeight);
	context.stroke();
	context.closePath();


	// M

	context.beginPath()
	var xOfM = width * 0.3 + x * 1;
	context.moveTo(xOfM, maxHeight);
	context.lineTo(xOfM, minHeight);
	context.lineTo(xOfM + widthOfLetter / 2, halfHeight);
	var xEndOfM = xOfM + widthOfLetter;
	context.lineTo(xEndOfM, minHeight);
	context.lineTo(xEndOfM, maxHeight);
	context.stroke();
	context.closePath();

	// O

	context.beginPath()
	var xOfO = width * 0.55 + x;
	context = drawEllipse(context, xOfO, halfHeight, widthOfLetter, heightOfLetter);
	//	context.moveTo(xOfO, halfHeight - halfHeightOfLetter); // A1
//	context.bezierCurveTo(xOfO + halfWidthOfLetter, halfHeight
//			- halfHeightOfLetter, // C1
//	xOfO + widthOfLetter / 2, halfHeight + halfHeightOfLetter, // C2
//	xOfO, halfHeight + halfHeightOfLetter); // A2
//	context.bezierCurveTo(xOfO - halfWidthOfLetter, halfHeight
//			+ halfHeightOfLetter, // C3
//	xOfO - halfWidthOfLetter, halfHeight - halfWidthOfLetter, // C4
//	xOfO, halfHeight - halfHeightOfLetter); // A1
	// context.arc(xOfO, halfHeight, halfWidthOfLetter, 0, 2 * Math.PI, true);
	context.stroke();
	context.closePath();
//	R
//	context.beginPath();
//	context.moveTo(width / 5 * 2, height / 5 * 4);
//	context.lineTo(width / 5 * 2, height / 5);
//	context.moveTo(width / 5 * 2, height / 5 * 3);
//	context.lineTo(width / 5 * 3, height / 5 * 4);
//	context.stroke();
//	context.closePath();
//	context.beginPath();
//	context.arc(width / 5 * 2, height / 5 * 2, height / 5, 1.5 * Math.PI, 0.5 * Math.PI, false);
//	context.moveTo(width / 5 * 2, height / 5);
//	context.quadraticCurveTo(width / 5 * 3, 10, width / 5 * 2, height / 5 * 3);
//	context.stroke();
//	context.closePath();

	
// E
	context.beginPath()
	var xOfE = width * 0.3 + x * 4;
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
	
}

