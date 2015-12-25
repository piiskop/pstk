/**
 * rectangles
 */
console.log(" 4 ");
var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");

//liigutaja
x = 100;
y = 30;
//		Paremale, alla, vasakule, ülesse
context.rect(x+33, y+45, 160, 1);
context.fillStyle = "green";
context.fill();


context.lineWidth = 3;
context.strokeStyle = "green";
context.stroke();


 //E-täht
//ülemine punkt
//alumine punkt
context.moveTo(x+60, y+15);
context.lineTo(x+60, y+40);

context.moveTo(x+60, y+17);
context.lineTo(x+80, y+17);

context.moveTo(x+60, y+28);
context.lineTo(x+75, y+28);

context.moveTo(x+60, y+38);
context.lineTo(x+80, y+38);

// R-täht
context.moveTo(x+90, y+15);
context.lineTo(x+90, y+40);

context.moveTo(x+90, y+17);
context.lineTo(x+110, y+17);

context.moveTo(x+108, y+17);
context.lineTo(x+108, y+28);

context.moveTo(x+90, y+28);
context.lineTo(x+110, y+28);

context.moveTo(x+90, y+28);
context.lineTo(x+110, y+38);

//G-täht
context.moveTo(x+120, y+15);
context.lineTo(x+120, y+40);

context.moveTo(x+120, y+17);
context.lineTo(x+140, y+17);

context.moveTo(x+120, y+38);
context.lineTo(x+140, y+38);

context.moveTo(x+138, y+28);
context.lineTo(x+138, y+38);

context.moveTo(x+130, y+29);
context.lineTo(x+138, y+29);

//O-täht
context.moveTo(x+150, y+15);
context.lineTo(x+150, y+40);

context.moveTo(x+150, y+17);
context.lineTo(x+170, y+17);

context.moveTo(x+150, y+38);
context.lineTo(x+170, y+38);

context.moveTo(x+170, y+15);
context.lineTo(x+170, y+40);
//Sisestamine
context.stroke();

/**
 * This function shows the contents' block according to the mouse click
 * position.
 * 
 * @author kalmer
 * @param incident the mouse incident
 */
function showContents(incident)
{
	console.log(" 49 ");
	//otsib id osa ja style võtab lõpus selelst
	var containerForContents = document.getElementById("containerForContents").style;
	if (containerForContents.display == "none")
	{
		incident = incident ? incident : window.event;

		if (isNaN(window.scrollX))
		{
			containerForContents.top = incident.clientY + "px";
			containerForContents.left = incident.clientX + "px";

		}
		//see osa sisaldab pudutusi puuteplaadile
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
		//kui kõik on tehtud siis kuvatakse
		containerForContents.display = "block";
	}
	else
	{
		containerForContents.display = "none";
	}

}