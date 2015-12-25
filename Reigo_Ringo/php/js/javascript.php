<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">


</head>

<body onmousedown="showStuff(event)" >

<canvas id="canvas" style="width:200px;height:200px;"></canvas>

<div>karuke kappas mööda teed</div>
<div id="stuffThatsShown" style="display:none;top:0;left:0;"><a onclick="kao()">ta sittus püksi</a></div>

<script>


function joonista(x, y){

var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");
context.moveTo(x, y);
context.lineTo(x + 50, y + 50);
context.stroke();
context.rect(x, y, x, y)
}

joonista(20, 20);
joonista(20, 50);
document.write('<div>x</div>');

function kao(){
	var sisu = document.getElementById("stuffThatsShown").style;
	sisu.display = "none";
}











function showStuff(incident){  //võtab sündmuse

	var containerForContents = document.getElementById("stuffThatsShown").style;   //paneb muutujasse elemendi stiili
	if (containerForContents.display == "none")      //kui display=none;
	{
		incident = incident ? incident : window.event;   //muutuja incident = kui on siis = toimunud sündmus, kui ei siis 
		                                                 //= window sündmus
		//document.write(incident);
		if (isNaN(window.scrollX))       //kui pole number window x asi
		{
			containerForContents.top = incident.clientY + "px";  //siis elemendi ülemine ja vasak = sündmuse x ja y 
			containerForContents.left = incident.clientX + "px";

		}
		else if (incident.touches)  //kui sündmuseks on käppimine
		{
			var touchobj = incident.changedTouches[0];  //muutuja = sündmuse esimene käpe

			var startX = parseInt(touchobj.clientX);  //muutuja x = täisarv esimese käppe x koordinaadist
			var startY = parseInt(touchobj.clientY);  //muutuja y = täisarv esimese käppe y koordinaadist 
			containerForContents.top = startY + "px";  //elemendi ülemine pool = käppe y koordinaat pikslites
			containerForContents.left = startX + "px";
		}
		else
		{
			containerForContents.top = incident.clientY + "px";   //elemendi ülemine margin = sündmuse y koordinaat pikslites
			containerForContents.left = incident.clientX + "px";
		}

		containerForContents.display = "block";  //suurus elemedile antud, nüüd näitab seda
	}

}

</script>
</body>
</html>