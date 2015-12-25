function draw() {
	var canvas = document.getElementById("canvas");
	if (canvas.getContext) {
		var ctx = canvas.getContext("2d");

		ctx.fillStyle = "rgb(200,0,0)";
		ctx.fillRect(20, 20, 100, 100);

		ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
		ctx.fillRect(50, 50, 100, 100);

		ctx.fillRect(125, 25, 100, 100);
		ctx.clearRect(145, 45, 60, 60);
		ctx.strokeRect(150, 50, 50, 50);

		ctx.fillStyle = "rgb(0,128,0)";
		ctx.fillRect(10, 10, 480, 480);
		ctx.clearRect(100, 100, 100, 100);
		ctx.clearRect(290, 100, 100, 100);
		ctx.strokeRect(100, 100, 100, 90);
		ctx.fillStyle = "blue";
		ctx.strokeRect(290, 100, 100, 50);
		ctx.fillRect(100, 100, 100, 89);
		ctx.strokeRect(290, 100, 100, 50);
		ctx.fillRect(290, 100, 99, 49);
		
	    
	    ctx.beginPath();
	    ctx.moveTo(10,10);
	    ctx.lineTo(480,10);
	    ctx.lineTo(240,0);
	    ctx.fill();
	    
	    ctx.beginPath();
	    ctx.moveTo(240,200);
	    ctx.lineTo(265,225);
	    ctx.lineTo(240,250);
	    ctx.lineTo(215,225);
	    ctx.closePath();
	    ctx.fill();
	    
	    ctx.beginPath();
	    ctx.arc(75,75,50,0,Math.PI*2,true); // Outer circle
	    ctx.moveTo(110,75);
	    ctx.arc(75,75,35,0,Math.PI,false);  // Mouth (clockwise)
	    ctx.moveTo(65,65);
	    ctx.arc(60,65,5,0,Math.PI*2,true);  // Left eye
	    ctx.moveTo(95,65);
	    ctx.arc(90,65,5,0,Math.PI*2,true);  // Right eye
	    ctx.stroke();
	}
}

document.getElementById("buttonForHouse").onclick=draw;
