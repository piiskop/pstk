/**
 * 
 */

function showContents(incident)
{
	console.log(" 49 ");
	var containerForContents = document.getElementById("sisukord").style;
	if (containerForContents.display == "none")
	{
		incident = incident ? incident : window.event;

		if (isNaN(window.scrollX))
		{
			containerForContents.top = incident.clientY + "px";
			containerForContents.left = incident.clientX + "px";

		}
		else if (incident.touches)
		{
			var touchobj = incident.changedTouches[0]; // reference first touch point (ie: first finger)

			var startX = parseInt(touchobj.clientX); // get x position of touch point relative to left 
			var startY = parseInt(touchobj.clientY); // get x position of touch point relative to left 
			containerForContents.top = startY + "px";
			containerForContents.left = startX + "px";
		}
		else
		{
			containerForContents.top = incident.clientY + "px";
			containerForContents.left = incident.clientX + "px";
		}

		containerForContents.display = "block";
	}
	else
	{
		containerForContents.display = "none";
	}


}