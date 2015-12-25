/**
 * 
 */
/*document.getElementById
var httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = function(){
	if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+ ...
	    httpRequest = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE 6 and older
	    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
}
	httpRequest.open('GET', 'http://www.example.org/some.file', true);
	httpRequest.send(null);*/


/**
 * @author Arnold
 * @example of AJAX
 */
document.getElementById("buttonForGettingData").onclick = function() {
	makeRequest();
//document.getElementById("buttonForGettingData").onclick = function() {
	makeRequest();
};
function makeRequest(///<<<<</////) {
	console.log(" 25 ");
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function() {
		try {
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
					console.log(httpRequest.responseText);
					// perfect!
				} else {
					// there was a problem with the request,
					// for example the response may contain a 404 (Not Found)
					// or 500 (Internal Server Error) response code
				}
			} else {
				// still not ready
			}

		} catch (e) {
			console.log(e.description);
		}
	};
httpRequest
			.open(
					'muutuja',/////<<<<<<<//////////////
					'http://localhost/pstk/Arnold/Arnold2/TUTORIAL/iteratingoverarray/http.php',
					true);
if ('POST' === parameters.method) {
	argumentsToBeSend += '&target=' + document.getElementById('target').value;
}
	httpRequest.setRequestHeader('Cache-Control', 'no-cache');
	httpRequest.send(null);
}
};

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * 
 */
/*document.getElementById("buttonForGettingData").onclick = function() {
	makeRequest({
		method : 'GET'
	});
};
function makeRequest(parameters) {
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function() {
		console.log(" 12 ");
		try {
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
					if ('json' === httpRequest.responseType) {
						console.log(" 17 ");
						var response = JSON.parse(httpRequest.responseText);
						console.log(response.liens);
					} else {
						console.log(" 22 ");
						console.log(" 20: tüüp: " + httpRequest.responseType);
					}
				} else {
					console.log(" 19: staatus: " + httpRequest.status);
				}
			} else {
				console.log(" 24: valmiduse aste: " + httpRequest.readyState);
			}

		} catch (e) {
			console.log(e.description);
		}
	};
	httpRequest.ontimeout = function()
	{
		console.log(" 37: tundub, et liiga kaua võtaks päring aega.");
	}
	httpRequest.addEventListener("progress", function(oEvent) {
		if (oEvent.lengthComputable) {
			var percentComplete = oEvent.loaded / oEvent.total;
			// ...
		} else {
			// Unable to compute progress information since the total size is
			// unknown
		}

	});
	httpRequest.addEventListener("load", function(evt) {
		console.log("The transfer is complete.");
		var response = JSON.parse(httpRequest.responseText);
		console.log(response.liens[0]);

	});
	httpRequest.addEventListener("error", function(evt) {
		console.log("An error occurred while transferring the file.");

	});
	httpRequest.addEventListener("abort", function(evt) {
		console.log("The transfer has been canceled by the user.");

	});
	var address = 'http://localhost/pstk/Arnold/XmlHttpRequest/';
	httpRequest.open(parameters.method, address, true);
	httpRequest.timeout = 2000;
	if ('POST' === parameters.method) {
		httpRequest.setRequestHeader("Content-Type",
				"application/x-www-form-urlencoded");
	}
	httpRequest.send(null);
}*/


