/**
 * @var raw data of pupils
 */
var pupils = [ {
	firstName : "kaire",
	lastName : "ojastu",
	canProgram : false
}, {
	firstName : "raiko",
	lastName : "ojaste",
	canProgram : false
}, {
	firstName : "eleri",
	lastName : "apsolon",
	canProgram : false
}, {
	firstName : "sander",
	lastName : "mets",
	canProgram : false
}, {
	firstName : "maarika",
	lastName : "erika",
	canProgram : false
}, {
	firstName : "kristen",
	lastName : "aeg",
	canProgram : false
}, {
	firstName : "keijo",
	lastName : "palts",
	canProgram : false
}, {
	firstName : "ingmar",
	lastName : "nurmiste",
	canProgram : false
}, {
	firstName : "ženja",
	lastName : "fokin",
	canProgram : false

} ];


console.log('lenth of pupils array: ', pupils.length);

/**
 * middle point of the binary search used later in fave function to chech which
 * name will be overwritten
 */
var middle;
/**
 * binary search function to find pupil
 * 
 * @function
 * @author Raiko Heinla
 */

var binarySearch = function() {
	console.log(pupils);
	// gets name to search for from html form
	var target = document.getElementById("insertName").value;
	var target = target.toLowerCase();
	var target = target.trim();
	var minIndex = 0;
	var maxIndex = pupils.length - 1;
	var currentElement;
	var repeats = 0;
	var progInput = document.getElementById("progInput");

	// searching by first name
	// sorting pupils array by first name
	
	pupils.sort(function(a, b) {
		return a.firstName.localeCompare(b.firstName);
	});
	while (minIndex <= maxIndex) {
		repeats++;
		middle = Math.floor((minIndex + maxIndex) / 2);
		currentElement = pupils[middle];
		// this part updates checkbox depending on canProgram checkbox value
		if (pupils[middle]["firstName"] === target) {
			if (pupils[middle]["canProgram"]) {
				progInput.checked = true;
			} else {
				progInput.checked = false;
			}
			programming.style.display = "block";
		}
		//
		console.log(middle);
		console.log(currentElement);
		if (currentElement.firstName < target) {
			minIndex = middle + 1;
		} else if (currentElement.firstName > target) {
			maxIndex = middle - 1;
		} else {
			document.getElementById("nameNotFound").style.display = 'none';
			document.getElementById("programming").style.display = 'block';
			document.getElementById("repeats").innerHTML = "Korduste arv: "
					+ repeats;
			repeats = 0;
			matchfound = "firstName";

			return true;
		}
	}

	// searching by last name
	// sorting pupils array by last name
	pupils.sort(function(a, b) {
		return a.lastName.localeCompare(b.lastName);
	});
	console.log(pupils);
	var minIndex = 0;
	var maxIndex = pupils.length - 1;
	while (minIndex <= maxIndex) {
		repeats++;
		middle = Math.floor((minIndex + maxIndex) / 2);
		currentElement = pupils[middle];
		// this part updates checkbox depending on canProgram checkbox value
		if (pupils[middle]["lastName"] === target) {
			if (pupils[middle]["canProgram"]) {
				progInput.checked = true;
			} else {
				progInput.checked = false;
			}
			programming.style.display = "block";
		}
		//
		console.log(middle);
		console.log(currentElement);
		if (currentElement.lastName < target) {
			minIndex = middle + 1;
		} else if (currentElement.lastName > target) {
			maxIndex = middle - 1;
		} else if (currentElement.lastName == target) {
			document.getElementById("nameNotFound").style.display = 'none';
			document.getElementById("programming").style.display = 'block';
			document.getElementById("repeats").innerHTML = "Korduste arv: "
					+ repeats;
			repeats = 0;
			matchfound = "lastName";
			return true;
		}
		if (currentElement.firstName !== target) {
			document.getElementById("programming").style.display = 'none';
			document.getElementById("nameNotFound").style.display = 'block';
			document.getElementById("repeats").innerHTML = "Korduste arv: "
					+ repeats;
		}
	}

}

/**
 * function to create a table sorted by last name
 * 
 * @function
 */
var createTablel = function() {
	// last name
/*	pupils.sort(function(a, b) {
		return a.lastName.localeCompare(b.lastName);
	});*/
	document.getElementById("table").innerHTML = "";
	for (var i = 0; i < pupils.length; i++) {
		var table = document.getElementById("table");
		var row = table.insertRow(i);
		var cell0 = row.insertCell(0);
		cell0.id = ("firstNameRow" + i);
		cell0.innerHTML = pupils[i]["firstName"];
		var cell1 = row.insertCell(1);
		cell1.id = ("lastNameRow" + i);
		cell1.innerHTML = pupils[i]["lastName"];
		if (pupils[i]["canProgram"]) {
			cell0.style.backgroundColor = "green";
			cell1.style.backgroundColor = "green";
		} else {
			cell0.style.backgroundColor = "yellow";
			cell1.style.backgroundColor = "yellow";
		}
	}
};

/**
 * function to create a table sorted by first name
 * 
 * @function
 */
var createTablef = function() {
	// first name
/*	pupils.sort(function(a, b) {
		return a.firstName.localeCompare(b.firstName);
	});*/
	document.getElementById("table").innerHTML = "";
	for (var i = 0; i < pupils.length; i++) {
		var table = document.getElementById("table");
		var row = table.insertRow(i);
		var cell0 = row.insertCell(0);
		cell0.id = ("firstNameRow" + i);
		cell0.innerHTML = pupils[i]["firstName"];
		var cell1 = row.insertCell(1);
		cell1.id = ("lastNameRow" + i);
		cell1.innerHTML = pupils[i]["lastName"];
		if (pupils[i]["canProgram"]) {
			cell0.style.backgroundColor = "green";
			cell1.style.backgroundColor = "green";
		} else {
			cell0.style.backgroundColor = "yellow";
			cell1.style.backgroundColor = "yellow";
		}
	}
};
// /////////////////////////////
/**
 * function to hide table of pupils
 * 
 * @function
 */
var hideTable = function() {
	document.getElementById("table").style.display = "none";
	document.getElementById("nimekiri").value = "Kuva kogu nimekiri.";
	document.getElementById("nimekiri").onclick = showTable;
}
/**
 * function to show table of pupils
 * 
 * @function
 */

var showTable = function() {
	document.getElementById("table").style.display = 'block';
	document.getElementById("nimekiri").value = "Peida nimekiri.";
	document.getElementById("nimekiri").onclick = hideTable;
}

/**
 * function to save checkbox and name
 * 
 * @function
 */
var saveProgramming = function() { 
	var target = document.getElementById("insertName").value;
	var updateDone = document.getElementById("updateDone");
	////////////////////////////////////////////////////////////////////
	if (middle >= 0 && (matchfound ==="firstName" || matchfound==="lastName")) { 


		 target = target.trim();
		 target = target.toLowerCase();
		 target = target.split(" ");
		
        if (target.length > 1) { //if two or mre words are inserted
        	
        	console.log(target.length);
        	
            var lastName = target[target.length - 1];
            target.pop();
            var firstName = target.join(' ');
            pupils[middle]['firstName'] = firstName;
            pupils[middle]['lastName'] = lastName;
            
          createTablel();
     //      makeRequest("POST");
        }
        else{
        	  	
        	// change last name
        	if (target.value !== pupils[middle]["lastName"] && target.value !== ""
        			&& matchfound === "lastName") {
        		pupils[middle]["lastName"] = target.value;
        		createTablel();
       // 		makeRequest("POST");
        	}
        	// change first name
        	else if (target.value !== pupils[middle]["firstName"]
        			&& matchfound === "firstName" && target.value !== "") {
        		pupils[middle]["firstName"] = target.value;
        		createTablef();
        //		makeRequest("POST");
        	}
        }
	
	}

	////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////
	/*
	// change last name
	if (target.value !== pupils[middle]["lastName"] && target.value !== ""
			&& matchfound === "lastName") {
		pupils[middle]["lastName"] = target.value;
		createTablel();
		makeRequest("POST");
	}
	// change first name
	else if (target.value !== pupils[middle]["firstName"]
			&& matchfound === "firstName" && target.value !== "") {
		pupils[middle]["firstName"] = target.value;
		createTablef();
		makeRequest("POST");
	}
	*/
	///////////////////////////////////////////////////////////////////


	// change table background color when searched by last name
	if (matchfound === "lastName") {
		if (progInput.checked) {
			pupils[middle]["canProgram"] = true;
			document.getElementById("firstNameRow" + middle).style.backgroundColor = "green";
			document.getElementById("lastNameRow" + middle).style.backgroundColor = "green";
		} else {
			pupils[middle]["canProgram"] = false;
			document.getElementById("firstNameRow" + middle).style.backgroundColor = "yellow";
			document.getElementById("lastNameRow" + middle).style.backgroundColor = "yellow";
		}
		createTablel();
	//	makeRequest("POST");
	}
	// change table background color when searched by first name
	if (matchfound === "firstName") {
		if (progInput.checked) {
			pupils[middle]["canProgram"] = true;
			document.getElementById("firstNameRow" + middle).style.backgroundColor = "green";
			document.getElementById("lastNameRow" + middle).style.backgroundColor = "green";
		} else {
			pupils[middle]["canProgram"] = false;
			document.getElementById("firstNameRow" + middle).style.backgroundColor = "yellow";
			document.getElementById("lastNameRow" + middle).style.backgroundColor = "yellow";
		}
		createTablef();
	//	makeRequest("POST");
	}
	
	// show message about name change
	updateDone.innerHTML = "Õpilase " + pupils[middle]["firstName"] + " "
			+ pupils[middle]["lastName"] + " andmed muudetud.";
};

/*
/**
 * function which uses ajax to get pupils array from a php file
 * @function
 */
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
/*
var makeRequest = function(params) {
	var xhttp = new XMLHttpRequest();

	if (params == "GET") {
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				var input = xhttp.responseText;
				var parsed = JSON.parse(input);
				pupils = Object.keys(parsed).map(function(key) {
					return parsed[key]
				});
				/*pupils.sort(function(a, b) {
					return a.lastName.localeCompare(b.lastName);
				});*/
/*
				xhttp.open("GET", "raiko.php", true);
				xhttp.send();

			}

		};
	} else if (params == "POST") {
		var data = JSON.stringify(pupils);
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			}
		};
		xhttp.open("POST", "raiko.php", true);
		xhttp.setRequestHeader("Content-type",
				"application/x-www-form-urlencoded");
		xhttp.send();
	}
	binarySearch();
}
*/
///////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
/*
var makeRequest = function (parameters) {
	var xhttp = new XMLHttpRequest();
	
	//xhttp.open("GET", "raiko.php", true);
//	xhttp.send();
	
	if (parameters === "GET") {
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				var input = xhttp.responseText;
				var parsed = JSON.parse(input);
				pupils = Object.keys(parsed).map(function(key) {
					return parsed[key]
				});
				
				binarySearch();
			}
		};
		xhttp.open("GET", "raiko.php", true);
		xhttp.send();

	} else if (parameters == "POST") {
		var data = JSON.stringify(pupils);
		xhttp.onreadystatechange = function() {
		};
		xhttp.open("POST", "raiko.php", true);
		xhttp.setRequestHeader("Content-type",
				"application/x-www-form-urlencoded");
		xhttp.send();
	
	};
}

*/
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
/*
 * test
 */
/*
var makeRequest = function(parameters) {

	httpRequest = new XMLHttpRequest();
	if ('GET' === parameters.method) {
		httpRequest.onreadystatechange = function() {
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
		
					var gotJson = httpRequest.responseText;

					var parsed = JSON.parse(gotJson);
					pupils = Object.keys(parsed).map(function(key) {
						return parsed[key]
					}); 

					pupils.sort(function(a, b) { // sorteerib õpilased eesnime järgi
						return a.firstName.localeCompare(b.firstName);
					});
					
					binarySearch();
					console.log(pupils);
					console.log(JSON.stringify(pupils));
				} else {
					console.log("Php file not found!");
				}
			}
		}
	}
	httpRequest.open(parameters.method, 'http://localhost/Raiko/pstk/Raiko Heinla/raiko6/raiko.php', true);
	if ('POST' === parameters.method) {
		httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	}
	var stringJSONData = JSON.stringify(pupils);
	console.log(stringJSONData);
	console.log(parameters.parameters);
	httpRequest.send(stringJSONData, parameters.parameters);
};
*/