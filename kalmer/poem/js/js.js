/**
 * rectangles
 */
console.log(" 4 ");
var x = 50;
var y = 40;
function draw(event) {
	var canvas = document.getElementById("canvas");
	var context = canvas.getContext("2d");
	x = event.clientX;
	console.log(" 11: ", x);
	y = event.clientY;
	var width = 40;
	var height = 50;
	context.rect(x, y, width, height);
	context.fillStyle = "red";
	context.fill();
	context.lineWidth = 0;
	context.strokeStyle = "green";
	context.stroke();
	context.moveTo(50, 60);
	context.lineTo(70, 80);
	context.stroke();

	context.moveTo(x, y);
	context.lineTo(x, y + 100);
	context.moveTo(x, y + 50);
	context.lineTo(x + 50, y);
	context.moveTo(x, y + 50);
	context.lineTo(x + 50, y + 100);
	context.stroke();
	var jou = 2 + jou;
	console.log(" 32: " + jou);
}
function showCoords(evt) {
	alert("clientX value: " + evt.clientX + "\n" + "clientY value: "
			+ evt.clientY + "\n");
}

/**
 * This function shows the contents' block according to the mouse click
 * position.
 * 
 * @author kalmer
 * @param incident
 *            the mouse incident
 * @param idOfTarget
 *            the ID of the target container
 */
function showContents(incident, idOfTarget) {
	console.log(" 49 ");
	var containerForContents = document.getElementById(idOfTarget).style;
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
 * This function hides the contents and goes to the link.
 * 
 * @author kalmer
 * @param object
 *            element the element to be hidden
 * @param string
 *            link the target of the link
 * @returns {Boolean} <code>false</code> because we do not want the page to
 *          jump
 */
function go(element, link) {
	window.location.href = link;
	element.parentNode.parentNode.parentNode.style.display = 'none';
	return false;
}

var array = new Uint32Array(10);
window.crypto.getRandomValues(array);

console.log("Your lucky numbers:");
for (var i = 0; i < array.length; i++) {
    console.log(array[i]);
}