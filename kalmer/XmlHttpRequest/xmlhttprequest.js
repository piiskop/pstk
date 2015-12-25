/**
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @file example of AJAX
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
/**
 * This function makes a request.
 * 
 * @param string
 *            parameters.method either <code>GET</code> or <code>POST</code>
 */
function makeRequest(parameters) {
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function() {
		console.log(" 12 ");
		try {
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
					console.log(" 17 ");
					var response = JSON.parse(httpRequest.responseText);
					console.log(response.liens);
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
	httpRequest.ontimeout = function() {
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
		console.log(response.liens[1]['reference']);
		document.getElementById("target").value = response.liens[0].target;

	});
	httpRequest.addEventListener("error", function(evt) {
		console.log("An error occurred while transferring the file.");

	});
	httpRequest.addEventListener("abort", function(evt) {
		console.log("The transfer has been canceled by the user.");

	});
	var address = 'http://localhost/pstk/kalmer/XmlHttpRequest/';
	httpRequest.open(parameters.method, address, true);
	httpRequest.timeout = 2000;
	var argumentsToBeSent = '';
	if ('POST' === parameters.method) {
		argumentsToBeSent += '&target='
				+ document.getElementById('target').value;
		httpRequest.setRequestHeader("Content-Type",
				"application/x-www-form-urlencoded");
	}
	httpRequest.send(argumentsToBeSent);
}
