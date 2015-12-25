/**
 * 
 */
var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");


kaugus=5;
ylalt =10;


// context.rect(kaugus vasakult, ülalt, ruudu laius, ruudu kõrgus);
context.beginPath();
contextlineWidth ="15";
context.strokeStyle="green";
context.rect(kaugus, ylalt, 100, 40);
context.stroke();

context.font="30px Arial";
context.strokeText("Tere Maailm", kaugus+1, ylalt+80);
context.stroke();

