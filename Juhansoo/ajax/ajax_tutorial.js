/**
 * 
 */
document.getElementById("ajaxButton").onclick = function() {
	makeRequest({
		method : 'GET'
	});
};

document.getElementById("buttonForSendingData").onclick = function() {
	makeRequest({
		method : 'POST',
		parameters : 'latitude=' + document.getElementById('inputForLatitude').value
	});
};

function makeRequest(parameters) {
	httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (httpRequest.readyState === XMLHttpRequest.DONE) {
			if (httpRequest.status === 200) {
				var response = JSON.parse(httpRequest.responseText)
				console.log(response['jannseni']['latitude']);
			} else {
				console.log("Php file not found!");
			}
		}
	}
	
	httpRequest.open(parameters.method, 'http://localhost/pstk/Juhansoo/ajax/ajax_tutorial.php', true);

	if ('POST' === parameters.method) {
		httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	}
	
	httpRequest.send(parameters.parameters);
};