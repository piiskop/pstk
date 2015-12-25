function startDrawing(){
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	ctx.clearRect (0,0, canvas.width, canvas.height);
	return ctx;
}
function drawHouse(){
	var ctx= startDrawing();
	ctx.fillStyle = "hotpink";
	ctx.fillRect(20, 20, 500, 500);

	ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
	ctx.fillRect (100, 70, 100, 100);

	ctx.fillStyle = "rgba(50, 50, 50, 0.5)";
	ctx.fillRect (100, 70, 100, 80);
	ctx.strokeStyle = "pink";
	ctx.lineWidth=10;
	ctx.strokeRect(100, 70, 100, 100);

	ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
	ctx.fillRect (320, 70, 100, 100);

	ctx.fillStyle = "rgba(50, 50, 50, 0.5)";
	ctx.fillRect (320, 70, 100, 50);
	ctx.strokeStyle = "pink";
	ctx.lineWidth=10;
	ctx.strokeRect(320, 70, 100, 100);
	
    ctx.beginPath();
    ctx.arc(255,255,50,0,Math.PI*2,true);
    ctx.stroke();
    ctx.fill();
    
    ctx.fillStyle = "rgba(90, 90, 200, 0.5)";
	ctx.fillRect (225, 400, 60, 100);
	
	ctx.beginPath();
    ctx.moveTo(225,400);
    ctx.lineTo(255,360);
    ctx.lineTo(285,400);
    ctx.fill();
    
} 
function drawTriangle(){
	var ctx= startDrawing();
	ctx.beginPath();
    ctx.moveTo(75,50);
    ctx.lineTo(100,75);
    ctx.lineTo(100,25);
    ctx.fill();
  }
document.getElementById("buttonForHouse").onclick = drawHouse;
document.getElementById("buttonForTriangle").onclick = drawTriangle;
