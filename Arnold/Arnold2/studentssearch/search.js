"use Strict";// 
/**
 * Array of pupils.
 */
var pupils = [ {
	firstName : "kaire",
// canProg : true
}, {
	firstName : "raiko",
// canProg : true
}, {
	firstName : "eleri",
// canProg : true
}, {
	firstName : "sander",
// canProg : true
}, {
	firstName : "erika",
// canProg : true
}, {
	firstName : "kristen",
// canProg : true
}, {
	firstName : "ralf",
// canProg : true
}, {
	firstName : "ženja",
// canProg : true
} ];
console.log("Õpilast kokku:" + pupils.length);
/**
 * Performs binary search of pupils array for inserted first name and counts the
 * steps taken to find it.
 * 
 * @author Arnold <tserepov@gmail.com>
 * 
 * 
 */

//functions to could access it//global variable
var middle;
//function binary search,what searches pupils,starts from middle
var binarySearch = function() {
	console.log(pupils);

	var target = document.getElementById("insertName").value;
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
		//
		if (pupils[middle]["firstName"] === target) {
			if (pupils[middle]["canProgram"]) {
				progInput.checked = true;
			} else {
				progInput.checked = false;
			}
			programming.style.display = "block";
		}

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
			if (currentElement.firstName !== target) {
				document.getElementById("programming").style.display = 'none';
				document.getElementById("nameNotFound").style.display = 'block';
				document.getElementById("repeats").innerHTML = "Korduste arv: "
						+ repeats;
		}
	}
}

	



/**
 * function to create table
 * @author Arnold <tserepov@gmail.com>
 */
var createTable = function() {
	document.getElementById("studentsName").value = "Peida nimekiri.";
	document.getElementById("studentsName").onclick = hideTable;
	// first name
	pupils.sort(function(a, b) {
		return a.firstName.localeCompare(b.firstName);
	});
	document.getElementById("table").innerHTML = "";
	for (var i = 0; i < pupils.length; i++) { //puts all pupils in table
		var table = document.getElementById("table");
		var row = table.insertRow(i);
		var cell0 = row.insertCell(0);
		cell0.id = ("firstNameRow" + i);//first name cell
		cell0.innerHTML = pupils[i]["firstName"];
		
	}
};



/**
 * function to hide table of pupils
 * @author Arnold <tserepov@gmail.com>
 */
function hideTable() {
	document.getElementById("table").style.display = "none";
	document.getElementById("studentsName").value = "Kuva kogu nimekiri.";
	document.getElementById("studentsName").onclick = showTable;
}
/**
 * function to show table of pupils
 * @author Arnold <tserepov@gmail.com>
 */

function showTable() {
	document.getElementById("table").style.display = "block";
	document.getElementById("studentsName").value = "Peida nimekiri.";
	document.getElementById("studentsName").onclick = hideTable;
}

/**
 * function to save checkbox and name
 * @author Arnold <tserepov@gmail.com>
 */
/*
 * var saveProgrammingSkill = function() {
 * document.getElementById("firstName").onclick=saveProgrammingSkill; if
 * (document.getElementById('checkBox') != " ") {
 * document.getElementById('save').value=checked; // console.log ("oskab"); }
 * else { console.log("???"); } }
 */
/*
 * function saveProgrammingSkill() {
 * 
 * var checkBox = document.getElementById('checkBox'); var studentsName =
 * document.getElementById('insertName');
 * 
 * if (checkBox.checked === true) { pupils.canCode = true; } else {
 * pupils.canCode = false; } programming.style.display = "block";
 * nameNotFound.innerHTML = "";
 *  }
 */

// ////////////////////////////////////////////////////////////
/**
 * function to save checkbox and name
 * @author Arnold <tserepov@gmail.com>
 */
var saveProgramming = function() {
	var target = document.getElementById("insertName");
	var checkBox = document.getElementById("progInput");
	// var updateDone = document.getElementById("updateDone");

	if (checkBox.checked) {
		pupils[middle]["canProgram"] = true;
	} else {
		pupils[middle]["canProgram"] = false;

	}
	if (target.value !== pupils[middle]["firstName"] && target.value !== "") {
		pupils[middle]["firstName"] = target.value;
		// updateDone.innerHTML = "Õpilase " + pupils[middle]["firstName"] + "
		// andmed muudetud.";
		// createTable();
	}

	updateDone.innerHTML = "Õpilase " + pupils[middle]["firstName"]
			+ " andmed muudetud.";
	// programming.style.display = "block";
	// nameNotFound.innerHTML = "";
	/*postAjax(); //POST'ime AJAX'iga */
	makeRequestFirstName({
		method : 'POST',
		parameters : 'firstName='+ pupils[middle].firstName 
		+ '&' + 'canProgram=' + pupils[middle].canProgram
	});
}


/*
 * if(checkBox == checked ){ var target =
 * document.getElementById("insertName").value; var
 * canProgram=document.getElementById("canProg").checked; }else{ var
 * save=document.getElementById("save").checked=true; } }
 */

// /////////////////////////////////////////////////////////////////////////
/*
 * function check() { document.getElementById("save").checked = true; }
 */

/**
 * Sorts and creates a table of the students' last names and their programming
 * skills.
 * @author Arnold <tserepov@gmail.com>
 * 
 */
/*
 * var create = function() { document.getElementById("studentList").innerHTML =
 * ""; for (var i=0; i<pupils.length; i++) { var table =
 * document.getElementById("studentList"); var row = table.insertRow(i); var
 * cell1 = row.insertCell(0); cell1.id = ("cellA" + i); cell1.innerHTML =
 * pupils[i]["firsttName"]; var cell2 = row.insertCell(1); cell2.id = ("cellB" +
 * i); if (pupils[i]["progSkill"]) { cell2.style.backgroundColor = "green"; } } };
 */

/**
 * Changes the background color of the programming skills according to checkbox
 * state and changes the persons first name if modified.
 * @author Arnold <tserepov@gmail.com>
 * 
 * 
 */
/*
 * var saveProgrammingSkill = function() { var searchBox =
 * document.getElementById("insertName"); var changeState =
 * document.getElementById("changeState"); if (checkBox.checked) {
 * pupils["progSkill"] = true; document.getElementById("cellB" +
 * pupils).style.backgroundColor = "green"; } else { pupils["progSkill"] =
 * false; document.getElementById("cellB" + pupils).style.backgroundColor =
 * "red"; } if (searchBox.value !== pupils["firstName"] && searchBox.value !==
 * "") { pupils["firstName"] = searchBox.value; changeState.innerHTML = "Õpilase " +
 * pupils["firstName"] + " andmed muudetud."; create(); } changeState.innerHTML =
 * "Õpilase " + pupils["firstName"] + " andmed muudetud."; };
 */
/*var number=function() {
	document.getElementById("number").pupils.length;
	
}*/

/*Request with AJAX*/
/**
 * makerequest AJAX requests
 * @author Arnold <tserepov@gmail.com>
 */
/*var makeRequestFirstname = function () {
	
		var httpRequest;
		httpRequest = new XMLHttpRequest();
		httpRequest.onreadystatechange = function(){
				if (httpRequest.readyState === XMLHttpRequest.DONE) {
					if (httpRequest.status === 200) {
						var incomingJSON = httpRequest.responseText;
						console.log(" 303: "+incomingJSON);
						var parsed = JSON.parse(incomingJSON);
						pupils = Object.keys(parsed).map(function(k) { return parsed[k] });
						console.log("267: pupils updated with AJAX");
						document.getElementById("save").checked = false;
						binarySearch();
					} else {
						console.log('275: There was a problem with the request.');
					}
				}
		};
		httpRequest.open('GET','http://localhost/pstk/Arnold/Arnold2/studentssearch/ajax.php',true);//true
		httpRequest.send();
	}

//POSTAJAX
//We use this postAJAX function in saveProgramming to POST/save students skill
var postAjax = function() {
	var stringJSONData = JSON.stringify(pupils);
	var httpRequest = new XMLHttpRequest();
	if (!httpRequest) {
		console.log('Cannot create an XMLHTTP instance');
		return false;
	}
	httpRequest.onreadystatechange = function(){
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
					console.log('297: Sent data to server with POST')
				} else {
					console.log('299: There was a problem with the request.');
				}
			}
	};
	httpRequest.open('POST', 'http://localhost/pstk/Arnold/Arnold2/studentssearch/ajax.php',true);///,true
	httpRequest.setRequestHeader("Content-type", "application/json");
	httpRequest.send(stringJSONData);
}*/


////////////////////////////////////////////////////////////////////////////////////////////////////////////
function makeRequestFirstName(parameters) {
	var httpRequest;
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
					pupils.sort(function(a, b) { 
						return a.firstName.localeCompare(b.firstName);
					});
					console.log(pupils);
					console.log(JSON.stringify(pupils));
				} else {
					console.log("There was a problem");
				}
			}
		}
	}
	httpRequest.open(parameters.method,
			'http://localhost/pstk/Arnold/Arnold2/studentssearch/ajax.php', true);
	if ('POST' === parameters.method) {
		httpRequest.setRequestHeader("Content-Type",
				 "application/json");
	}
	//console.log(parameters.parameters);
	httpRequest.send(parameters.parameters);

document.getElementById("ajaxButton").onclick = function() {
	makeRequestFirstName({
		method : 'GET'
	});
	binarySearch();
}};


	


