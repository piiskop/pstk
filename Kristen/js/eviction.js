document.write("<form><p>Is the victim home?<br>" +
		"<label for=\"home\">YES: </label>" +
		"<input type=\"radio\" name=\"home\" value=\"y\" onchange=\"isHome()\">" +
		"<label for=\"home\">NO: </label>" +
		"<input type=\"radio\" name=\"home\" value=\"n\" onchange=\"notHome()\">" +
	"</p></form>");
function isHome(){
	document.write("<form><p>Does the victim agree<br>" +
			"<label for=\"agree\">YES: </label>" +
			"<input type=\"radio\" name=\"agree\" value=\"y\" onchange=\"evict()\">" +
			"<label for=\"agree\">NO: </label>" +
			"<input type=\"radio\" name=\"agree\" value=\"n\" onchange=\"notAgree()\">" +
			"</p></form>");
};
function notHome(){
	document.write("<form><p>Is the victim reachable via phone?<br>" +
			"<label for=\"reach\">YES: </label>" +
			"<input type=\"radio\" name=\"reach\" value=\"y\" onchange=\"isHome()\">" +
			"<label for=\"reach\">NO: </label>" +
			"<input type=\"radio\" name=\"reach\" value=\"n\" onchange=\"evict()\">" +
			"</p></form>");
};
function notAgree(){
	document.write("<h1>Victim is not agreeing to eviction</h1>");
	setTimeout(reload,5000);
	var counter = 5;
	document.write("Reloading in " + counter + " secs<br>");
	  setInterval(function() {
	    counter--;
	    if (counter >= 0) {
	    	document.write("Reloading in " + counter + " secs<br>");
	    };
	    }, 1000);
};
function reload(){
	window.location.reload(1);
};
function evict(){
	document.write("<form><h1>START EVICTION PROTOCOL!!!</h1></form>");
	setTimeout(reload ,5000);
	var counter = 5;
	document.write("Reloading in " + counter + " secs<br>");
	  setInterval(function() {
	    counter--;
	    if (counter >= 0) {
	    	document.write("Reloading in " + counter + " secs<br>");
	    };
	    }, 1000);
};