function startDrawing() {
	var canvas = document.getElementById("c1");
	var ctx = canvas.getContext("2d");
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	return ctx;
}
function drawRetangle() {
	var ctx = startDrawing();
	ctx.fillStyle = "yellow";
	ctx.fillRect(20, 20, 200, 100);
	ctx.strokeRect(20, 20, 200, 100);
	ctx.fillStyle = "rgba(50,0,100,0.25)";
	ctx.fillRect(60, 60, 300, 200);
	ctx.clearRect(80, 80, 250, 150);
	ctx.strokeRect(100, 100, 200, 100);
	ctx.fillStyle = "rgba(40,150,10,0.50)";
	ctx.fillRect(120, 120, 150, 50);

}
function drawCircles() { // ringid ja kurvid
	var ctx = startDrawing();
	for (var i = 0; i < 4; i++) {
		for (var j = 0; j < 3; j++) {
			ctx.beginPath();
			var x = 200 + j * 50; // x coordinate
			var y = 200 + i * 50; // y coordinate
			var radius = 20; // Arc radius
			var startAngle = 0; // Starting point on circle
			var endAngle = Math.PI + (Math.PI * j) / 2; // End point on circle
			var anticlockwise = i % 2 == 0 ? false : true; // clockwise or
			// anticlockwise

			ctx.arc(x, y, radius, startAngle, endAngle, anticlockwise);

			if (i > 1) {
				ctx.fillStyle = "red";
				ctx.fill();
			} else {
				ctx.stroke();
			}
		}
	}
	ctx.beginPath();
	ctx.moveTo(75, 25);
	ctx.quadraticCurveTo(25, 25, 25, 62.5);
	ctx.quadraticCurveTo(25, 100, 50, 100);
	ctx.quadraticCurveTo(50, 120, 30, 125);
	ctx.quadraticCurveTo(60, 120, 65, 100);
	ctx.quadraticCurveTo(125, 100, 125, 62.5);
	ctx.quadraticCurveTo(125, 25, 75, 25);
	ctx.closePath();
	ctx.stroke();
}
function drawHouse() {
	var ctx = startDrawing();

	ctx.fillStyle = "green"; // maja
	ctx.fillRect(50, 300, 400, 250);
	ctx.clearRect(70, 330, 100, 60);
	ctx.fillStyle = "blue";
	ctx.fillRect(150, 100, 45, 100);
	ctx.beginPath();
	ctx.moveTo(172, 100);
	ctx.lineTo(175, 80);
	ctx.lineTo(175, 30);
	ctx.fillStyle = "black";
	ctx.closePath();
	ctx.fill();
	ctx.lineWidth = 5;
	ctx.strokeStyle = "brown"
	ctx.strokeRect(70, 330, 100, 60);
	ctx.fillStyle = "yellow";
	ctx.fillRect(73, 332, 94, 30);
	ctx.clearRect(200, 330, 100, 60);
	ctx.strokeRect(200, 330, 100, 60);
	ctx.fillStyle = "yellow";
	ctx.fillRect(203, 332, 94, 50);
	ctx.clearRect(330, 330, 100, 60);
	ctx.strokeRect(330, 330, 100, 60);
	ctx.fillStyle = "violet";
	ctx.fillRect(333, 333, 94, 40);
	ctx.beginPath();
	ctx.moveTo(40, 300);
	ctx.lineTo(250, 80);
	ctx.lineTo(460, 300);
	ctx.fillStyle = "darkbrown";
	ctx.fill();

	ctx.fillStyle = "violet"; // puu
	ctx.fillRect(584, 420, 30, 150);
	ctx.beginPath();
	ctx.arc(600, 330, 100, 0, Math.PI * 2, true);
	ctx.stroke();
	ctx.fillStyle = "green";
	ctx.fill();
	
	ctx.beginPath(); // süda
    ctx.moveTo(75,40);
    ctx.bezierCurveTo(75,37,70,25,50,25);
    ctx.bezierCurveTo(20,25,20,62.5,20,62.5);
    ctx.bezierCurveTo(20,80,40,102,75,120);
    ctx.bezierCurveTo(110,102,130,80,130,62.5);
    ctx.bezierCurveTo(130,62.5,130,25,100,25);
    ctx.bezierCurveTo(85,25,75,37,75,40);
    ctx.fillStyle = "red";
    ctx.fill();

	ctx.beginPath(); // rohi
	ctx.moveTo(564, 570);
	ctx.lineTo(574, 550);
	ctx.lineTo(584, 570);
	ctx.lineTo(594, 540);
	ctx.lineTo(610, 560);
	ctx.lineTo(620, 530);
	ctx.lineTo(630, 570);
	ctx.lineTo(640, 550);
	ctx.lineTo(650, 570);
	ctx.fillStyle = "green";
	ctx.fill();

	ctx.beginPath(); // lill
	ctx.arc(600, 330, 100, 0, Math.PI * 2, true);
	ctx.stroke();
	ctx.fillStyle = "green";
	ctx.fill();
}
document.getElementById("retangle").onclick = drawRetangle;
document.getElementById("house").onclick = drawHouse;
document.getElementById("circles").onclick = drawCircles;