/**
 * 
 */

var makeRequest = function() {
	var httpRequest;
	httpRequest = new XMLHttpRequest();
	if (!httpRequest) {
		alert('Giving up :( Cannot create an XMLHTTP instance');
		return false;
	}
	httpRequest.onreadystatechange = function(){
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
					console.log(httpRequest.responseText);
				} else {
					console.log('20: There was a problem with the request.');
				}
			}
	};
	httpRequest.open('GET', "http://localhost/pstk/marten/php/opilased.php");
	httpRequest.send();
}
