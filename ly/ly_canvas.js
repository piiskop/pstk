function startDraw() {
	var canvas = document.getElementById("canvas");
	var context = canvas.getContext("2d");
	context.clearRect(0, 0, 900, 500);
	return context;
}
function draw() {
	var context = startDraw();

	context.fillStyle = "blue";
	context.fillRect(10, 10, 150, 200);

	context.fillStyle = "rgba(243,150,11,0.5)";
	context.fillRect(55, 150, 150, 200);

	context.fillStyle = "yellow";
	context.fillRect(10, 300, 150, 200);
	context.clearRect(20, 350, 80, 80);

	context.lineWidth = 6;
	context.strokeStyle = "blue";

	context.strokeRect(30, 375, 45, 45);
}
function drawHouse() {
	var context = startDraw();
	context.fillStyle = "green";
	context.fillRect(400, 150, 700, 500);

	context.clearRect(470, 250, 150, 80);
	context.strokeRect(480, 260, 125, 60);
	context.clearRect(660, 250, 150, 80);
	context.strokeRect(670, 260, 125, 60);

	context.fillStyle = "rgba(243,150,11,0.5)";
	context.fillRect(670, 260, 125, 40);

	context.beginPath();
	context.moveTo(900, 150);
	context.lineTo(650, 50);
	context.lineTo(400, 150);
	context.fillStyle = "brown";
	context.fill();

	context.beginPath();
	context.moveTo(670, 350);
	context.lineTo(670, 750);
	context.lineTo(470, 750);
	context.lineTo(470, 350);
	context.fillStyle = "brown";
	context.fill();

	context.beginPath();
	context.arc(75, 75, 50, 0, Math.PI * 2, true)
	context.closePath();
	context.fillStyle = "yellow";
	context.fill()
}
function drawArcs() {
	var context = startDraw();
	context.fillStyle = 'black';
	console.log(context.fillStyle);
	for (var i = 0; i < 4; i++) {
		for (var j = 0; j < 3; j++) {
			context.beginPath();
			var x = 225 + j * 50; // x coordinate
			var y = 25 + i * 50; // y coordinate
			var radius = 20; // Arc radius
			var startAngle = 0; // Starting point on circle
			var endAngle = Math.PI + (Math.PI * j) / 2; // End point on
			// circle
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

	
	// Quadratric curves example jutumull
	context.beginPath();
	context.moveTo(75, 25);
	context.quadraticCurveTo(25, 25, 25, 62.5);
	context.quadraticCurveTo(25, 100, 50, 100);
	context.quadraticCurveTo(50, 120, 30, 125);
	context.quadraticCurveTo(60, 120, 65, 100);
	context.quadraticCurveTo(125, 100, 125, 62.5);
	context.quadraticCurveTo(125, 25, 75, 25);
	context.stroke();

	// Quadratric curves example süda
    context.beginPath();
    context.moveTo(75,40);
    context.bezierCurveTo(75,37,70,25,50,25);
    context.bezierCurveTo(20,25,20,62.5,20,62.5);
    context.bezierCurveTo(20,80,40,102,75,120);
    context.bezierCurveTo(110,102,130,80,130,62.5);
    context.bezierCurveTo(130,62.5,130,25,100,25);
    context.bezierCurveTo(85,25,75,37,75,40);
    context.fill();
}
document.getElementById("kaared").onclick = drawArcs;
document.getElementById("maja").onclick = drawHouse;
document.getElementById("button").onclick = draw;
