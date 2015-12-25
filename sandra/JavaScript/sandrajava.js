function draw() {
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");

	ctx.fillStyle = "green";
	ctx.fillRect(10, 10, 100, 100);
	
	ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
	ctx.fillRect(70, 10, 100, 100);
}
document.body.onload=draw