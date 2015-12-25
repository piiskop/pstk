/**
 * 
 */
document.getElementById("buttonForGettingData").onclick = function() {
	makeRequest({
		method : 'GET'
	});
};

document.getElementById("buttonForSendingData").onclick = function() {
	makeRequest({
		method : 'POST'
	});
};

function start() {
	// Old compatibility code, no longer needed.
	if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+ ...
		httpRequest = new XMLHttpRequest(); // muutuja klassist
											// XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE 6 and older
		httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
	}

	httpRequest.onreadystatechange = function() {
		if (httpRequest.readyState === XMLHttpRequest.DONE) {
			// everything is good, the response is received
			if (httpRequest.status === 200) {
				console.log(httpRequest.responseText);
			} else {
				console.log("error ???");
			}
		} else {
			
			console.log("Still not ready" + httpRequest.readyState);
		}
	}
	// onreadystatechange võib olla ka onload (alles siis kui kõik asjad on laetud)
	// vormide puhul kasutatakse get ja post, sest teised pole vormide jaoks

	httpRequest.open('GET', 'http://localhost/pstk/erika/ajax.php', true); // esimene parameeter on GET, teine address, kuhu andmeid
	// saata või kust küsida ja true = kas toimetame sünkroonselt või
	// asünkroonselt, siia saab panna ka kasutajanime, parooli
	httpRequest.send(null); // kui on get, siis me ei saada midagi kaasa, kui on post, siis posti parameetrid
};

document.getElementById("buttonForGettingData").onclick = start;


