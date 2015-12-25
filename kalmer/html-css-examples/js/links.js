/**
 * This function draws a canvas with the possibility to draw on it with mouse.
 * 
 * @author kalmer
 */
var drawCanvas = function()
{
	/**
	 * @author kalmer
	 * @variables Object grab the canvas element
	 */
	var canvas = document.querySelector('canvas');
	/**
	 * @author kalmer
	 * @variables Object get the context for API access
	 */
	var c = canvas.getContext('2d');
	/**
	 * @author kalmer
	 * @variables int the x-coordinate of the mouse cursor
	 */
	var mouseX = 0;
	/**
	 * @author kalmer
	 * @variables int the y-coordinate of the mouse cursor
	 */
	var mouseY = 0;
	/**
	 * @author kalmer
	 * @variables int the width of the canvas in pixels
	 */
	var width = 300;
	/**
	 * @author kalmer
	 * @variables int the height of the canvas in pixels
	 */
	var height = 300;
	/**
	 * @author kalmer
	 * @variables string the color on the brush
	 */
	var colour = 'hotpink';
	var mousedown = false;

	// resize the canvas
	canvas.width = width;
	canvas.height = height;

	/**
	 * This function draws a path to the canvas while the mouse main button is pressed.
	 * 
	 * @author kalmer
	 */
	function draw()
	{
		if (mousedown)
		{
			// set the colour
			c.fillStyle = colour;
			// start a path and paint a circle of 20 pixels at the mouse
			// position
			c.beginPath();
			c.arc(mouseX, mouseY, 10, 0, Math.PI * 2, true);
			c.closePath();
			c.fill();
		}
	}

	// get the mouse position on the canvas (some browser trickery involved)
	canvas.addEventListener('mousemove', function(event)
	{
		if (event.offsetX)
		{
			mouseX = event.offsetX;
			mouseY = event.offsetY;
		}
		else
		{
			mouseX = event.pageX - event.target.offsetLeft;
			mouseY = event.pageY - event.target.offsetTop;
		}
		// call the draw function
		draw();
	}, false);

	canvas.addEventListener('mousedown', function(event)
	{
		mousedown = true;
	}, false);
	canvas.addEventListener('mouseup', function(event)
	{
		mousedown = false;
	}, false);

	var link = document.createElement('a');
	link.innerHTML = 'Laen pildi alla.';
	link.addEventListener('click', function(ev)
	{
		link.href = canvas.toDataURL();
		link.download = "mypainting.png";
	}, false);
	document.getElementById("linkOfCanvas").appendChild(link);
}