/**
 * 
 */
/*
function showDescription(this) {
	var checkbox = document.getElementByClassName("RequestItem");
	if (onmouseenter === true) {
		document.getElementById("Esimene").style.display = "none";
		document.getElementById("Teine").style.display = "block";
	} else {
		document.getElementById("Esimene").style.display = "none";
		document.getElementById("Kolmas").style.display = "block";
	}
}
*/
/*
function showDescription() {
	var onmouseenter = document.getElementById("Esimene");
	if (onmouseenter === true)
	document.getElementById("Kirjeldus").style.display = "none";
}
*/

function showDescription() {
	document.getElementById("Kirjeldus").style.display = "block";
}

function leaveDescription(){
	document.getElementById("Kirjeldus").style.display = "none";
}