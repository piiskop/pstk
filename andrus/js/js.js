/**
 * rectangles
 */
console.log(" 4 ");
var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");

horisontaalne = 100;
vertikaalne = 20;

context.rect(horisontaalne, vertikaalne, 40, 50);
context.fillStyle = "yellow";
context.fill();
context.lineWidth = 4;
context.strokeStyle = "blue";
context.stroke();
context.moveTo(horisontaalne+1, vertikaalne+4);
context.lineTo(70, 80);
context.stroke();

context.moveTo(50, 0);
context.lineTo(0, 100);
context.moveTo(0, 50);
context.lineTo(50, 0);
context.moveTo(0, 50);
context.lineTo(50, 100);
context.stroke();