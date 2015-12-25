/**
 * 
 */
document.getElementById("buttonSearchAjax").onclick = function() {
	start({
		method : 'GET'
	});
};

document.getElementById("buttonSearchAjax").onclick = function() {
	start({
		method : 'POST'
	});
};
function start(parameters) {
	httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function () {
		if (httpRequest.readyState === XMLHttpRequest.DONE) {
			if (httpRequest.status === 200) {
				console.log(response['firstName']['lastName']['pupils']);
			} else {
				console.log("error ???");
			}
		} else {
			console.log("Php file not found!");
		}
	}
}
httpRequest.open(parameters.method, 'http://localhost/pstk/Kaire/Kontrolltöö_html_css/Kontrolltöö 5.8.js', true);

if ('POST' === parameters.method) {
	httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
}

httpRequest.send(parameters.parameters);
};