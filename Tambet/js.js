/**
 * se siin on peidetud nupu funcs
 */

function showContents(incident) {
	console.log(" 49 ");
	var containerForContents = document.getElementById("containerForContents").style;
	if (containerForContents.display == "none") {
		incident = incident ? incident : window.event;

		if (isNaN(window.scrollX)) {
			containerForContents.top = incident.clientY + "px";
			containerForContents.left = incident.clientX + "px";

		} else if (incident.touches) {
			var touchobj = incident.changedTouches[0]; // reference first touch
														// point (ie: first
														// finger)

			var startX = parseInt(touchobj.clientX); // get x position of
														// touch point relative
														// to left
			var startY = parseInt(touchobj.clientY); // get x position of
														// touch point relative
														// to left
			containerForContents.top = startY + "px";
			containerForContents.left = startX + "px";
		} else {
			containerForContents.top = incident.clientY + "px";
			containerForContents.left = incident.clientX + "px";
		}

		containerForContents.display = "block";
	}

}

/**
 * sees siin on javas joonistamiseks
 */

var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");

context.moveTo(0, 0);
context.lineTo(10, 20);
context.moveTo(10, 20);
context.lineTo(20, 0);

context.moveTo(30, 20);
context.lineTo(30, 0);

context.moveTo(60, 20);
context.lineTo(60, 0);
context.moveTo(40, 0);
context.lineTo(60, 0);
context.moveTo(40, 0);
context.lineTo(80, 0);

context.moveTo(85, 0);
context.lineTo(115, 0);
context.moveTo(85, 0);
context.lineTo(85, 10);
context.moveTo(85, 10);
context.lineTo(115, 10);
context.moveTo(115, 10);
context.lineTo(115, 20);
context.moveTo(85, 20);
context.lineTo(115, 20);
context.stroke();

// context.rect(kaugus ülalt, kaugus alt, ruudu laius, ruudu kõrgus);
context.beginPath();
contextlineWidth = "15";
context.strokeStyle = "green";

context.rect(100, 30, 100, 40);
// context.fillStyle="#FF0000";
// context.fill();
context.stroke();

context.font = "30px Arial";
context.strokeText("Tere Maailm", 5, 95);
context.stroke();

context.font = "30px Arial";
context.fillText("Tere Maailm", 5, 120);
context.stroke();
