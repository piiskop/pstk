/**
 * This script connects to the website with AJAX, then "GET"s an array from pupils.php
 * @author Alar Aasa <alar@alaraasa.ee>
 */

var makeRequest=function(axParam){
	if (axParam == "GET"){ 
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
	    httpRequest.open('GET', "pupils.php");
	    httpRequest.send();
	 }
	 else if(axParam=="POST"){
			
	 } 
}