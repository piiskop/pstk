function startDrawing() {
	var canvas = document.getElementById("canvas");
	var context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
	return context;
}
function drawHouse() {
	var context = startDrawing();
	context.clearRect(0, 0, canvas.width, canvas.height);
	context.fillStyle = "lightgreen";
	context.fillRect(10, 10, 480, 480);
	context.clearRect(100, 100, 100, 100);
	context.strokeRect(100, 100, 100, 90);
	context.fillStyle = "lightblue";
	context.fillRect(100, 100, 99, 89);
	context.clearRect(290, 100, 100, 100);
	context.strokeRect(290, 100, 100, 50);
	context.strokeStyle = "blue";
	context.fillRect(290, 100, 99, 49);
	context.beginPath();
	context.moveTo(240, 200);
	context.lineTo(265, 225);
	context.lineTo(240, 250);
	context.lineTo(215, 225);
	context.closePath();
	context.fill();
	context.fillStyle = "red";

}

function drawTriangle() {
	var ctx = startDrawing();
	ctx.beginPath();
	ctx.moveTo(75, 50);
	ctx.lineTo(100, 75);
	ctx.lineTo(100, 25);
	ctx.fill();
}

function drawFace() {
	var canvas = document.getElementById('canvas');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');
		var ctx = startDrawing();
		ctx.beginPath();
		ctx.arc(75, 75, 50, 0, Math.PI * 2, true); // Outer circle
		ctx.moveTo(110, 75);
		ctx.arc(75, 75, 35, 0, Math.PI, false); // Mouth (clockwise)
		ctx.moveTo(65, 65);
		ctx.arc(60, 65, 5, 0, Math.PI * 2, true); // Left eye
		ctx.moveTo(95, 65);
		ctx.arc(90, 65, 5, 0, Math.PI * 2, true); // Right eye
		ctx.stroke();
	}
}

function drawArcs() {
	var ctx = startDrawing();
	for (var i = 0; i < 4; i++) {
		for (var j = 0; j < 3; j++) {
			ctx.beginPath();
			var x = 25 + j * 50; // x coordinate
			var y = 25 + i * 50; // y coordinate
			var radius = 20; // Arc radius
			var startAngle = 0; // Starting point on circle
			var endAngle = Math.PI + (Math.PI * j) / 2; // End point on circle
			var anticlockwise = i % 2 == 0 ? false : true; // clockwise or
			// anticlockwise

			ctx.arc(x, y, radius, startAngle, endAngle, anticlockwise);

			if (i > 1) {
				ctx.fill();
			} else {
				ctx.stroke();
			}
		}
	}
}

function drawCurves() {
	var ctx = startDrawing();
	// Quadratric curves example
	ctx.beginPath();
	ctx.moveTo(75, 25);
	ctx.quadraticCurveTo(25, 25, 25, 62.5);
	ctx.quadraticCurveTo(25, 100, 50, 100);
	ctx.quadraticCurveTo(50, 120, 30, 125);
	ctx.quadraticCurveTo(60, 120, 65, 100);
	ctx.quadraticCurveTo(125, 100, 125, 62.5);
	ctx.quadraticCurveTo(125, 25, 75, 25);
	ctx.stroke();
}

function drawHeart() {
	var ctx = startDrawing();
	// Quadratric curves example
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
document.getElementById("buttonForCurves").onclick = drawCurves;
document.getElementById("buttonForHeart").onclick = drawHeart;
