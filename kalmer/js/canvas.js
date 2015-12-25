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
 * @author kalmer
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
	context = drawEllipse(context, xOfO, halfHeight, widthOfLetter,
			heightOfLetter);
	// context.moveTo(xOfO, halfHeight - halfHeightOfLetter); // A1
	// context.bezierCurveTo(xOfO + halfWidthOfLetter, halfHeight
	// - halfHeightOfLetter, // C1
	// xOfO + widthOfLetter / 2, halfHeight + halfHeightOfLetter, // C2
	// xOfO, halfHeight + halfHeightOfLetter); // A2
	// context.bezierCurveTo(xOfO - halfWidthOfLetter, halfHeight
	// + halfHeightOfLetter, // C3
	// xOfO - halfWidthOfLetter, halfHeight - halfWidthOfLetter, // C4
	// xOfO, halfHeight - halfHeightOfLetter); // A1
	// context.arc(xOfO, halfHeight, halfWidthOfLetter, 0, 2 * Math.PI, true);
	context.stroke();
	context.closePath();

	var link = document.createElement('a');
	link.innerHTML = 'Laen pildi alla.';
	link.addEventListener('click', function(ev) {
		link.href = canvas.toDataURL();
		link.download = "mypainting.png";
	}, false);
	document.getElementById("linkOfCanvas").appendChild(link);
}

function drawRectangles() {
	var ctx = startDrawing();
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.fillRect(25, 25, 100, 100);
	ctx.clearRect(45, 45, 60, 60);
	ctx.strokeRect(50, 50, 50, 50);
}

document.getElementById("buttonForRectangles").onclick = drawRectangles;

function startDrawing() {
	var canvas = document.getElementById('canvas');
	var context = canvas.getContext('2d');
	context.clearRect(0, 0, canvas.width, canvas.height);
	return context;
}

function drawHouse() {
	var context = startDrawing();
	context.fillStyle = 'green';
	context.fillRect(10, 10, 480, 480);
	context.clearRect(100, 100, 100, 100);
	context.strokeRect(100, 100, 100, 90);
	context.fillStyle = 'blue';
	context.fillRect(100, 100, 99, 89);
	context.clearRect(290, 100, 100, 100);
	context.strokeRect(290, 100, 100, 50);
	context.fillRect(290, 100, 99, 49);
	context.beginPath();
	context.moveTo(240, 200);
	context.lineTo(265, 225);
	context.lineTo(240, 250);
	context.lineTo(215, 225);
	context.closePath();
	context.fillStyle = 'yellow';
	context.fill();
}
function drawTriangle() {
	var context = startDrawing();
	context.beginPath();
	context.lineWidth = 5;
	context.moveTo(75, 50);
	context.lineTo(100, 75);
	context.lineTo(100, 25);

	context.stroke();
}
function drawFace() {
	var context = startDrawing();
	context.beginPath();
	context.arc(75, 75, 50, 0, Math.PI * 2, true); // Outer circle
	context.moveTo(110, 75);
	context.arc(75, 75, 35, 0, Math.PI, false); // Mouth (clockwise)
	context.moveTo(65, 65);
	context.arc(60, 65, 5, 0, Math.PI * 2, true); // Left eye
	context.moveTo(95, 65);
	context.arc(90, 65, 5, 0, Math.PI * 2, true); // Right eye
	context.stroke();
}
function drawArcs() {
	var context = startDrawing();
	for (var i = 0; i < 4; i++) {
		for (var j = 0; j < 3; j++) {
			context.beginPath();
			var x = 25 + j * 50; // x coordinate
			var y = 25 + i * 50; // y coordinate
			var radius = 20; // Arc radius
			var startAngle = 0; // Starting point on circle
			var endAngle = Math.PI + (Math.PI * j) / 2; // End point on circle
			var anticlockwise = i % 2 == 0 ? false : true; // clockwise or
			// anticlockwise

			context.arc(x, y, radius, startAngle, endAngle, anticlockwise);

			if (i > 1) {
				context.fill();
			} else {
				context.stroke();
			}
		}
	}
}
function drawBubble() {
	var context = startDrawing();
	context.beginPath();
	context.moveTo(75, 25);
	context.quadraticCurveTo(25, 25, 25, 62.5);
	context.quadraticCurveTo(25, 100, 50, 100);
	context.quadraticCurveTo(50, 120, 30, 125);
	context.quadraticCurveTo(60, 120, 65, 100);
	context.quadraticCurveTo(125, 100, 125, 62.5);
	context.quadraticCurveTo(125, 25, 75, 25);
	context.stroke();
}
function drawHeart() {
	var ctx = startDrawing();
	ctx.beginPath();
	ctx.moveTo(75, 40);
	ctx.bezierCurveTo(75, 37, 70, 25, 50, 25);
	ctx.bezierCurveTo(20, 25, 20, 62.5, 20, 62.5);
	ctx.bezierCurveTo(20, 80, 40, 102, 75, 120);
	ctx.bezierCurveTo(110, 102, 130, 80, 130, 62.5);
	ctx.bezierCurveTo(130, 62.5, 130, 25, 100, 25);
	ctx.bezierCurveTo(85, 25, 75, 37, 75, 40);
	ctx.fill();
}
document.getElementById("buttonForHouse").onclick = drawHouse;
document.getElementById("buttonForTriangle").onclick = drawTriangle;
document.getElementById("buttonForFace").onclick = drawFace;
document.getElementById("buttonForArcs").onclick = drawArcs;
document.getElementById("buttonForBubble").onclick = drawBubble;
document.getElementById("buttonForHeart").onclick = drawHeart;
