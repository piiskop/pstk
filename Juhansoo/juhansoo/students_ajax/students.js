/**
 * @file Creates list of students that can be changed.
 */

var pupils = [ {
	firstName: "kaire",
	lastName: "ojastu"
}, {
	firstName: "raiko",
	lastName: "ojaste"
}, {
	firstName: "eleri",
	lastName: "apsolon"
}, {
	firstName: "sander",
	lastName: "mets"
}, {
	firstName: "maarika",
	lastName: "erika"
}, {
	firstName: "kristen",
	lastName: "aeg"
}, {
	firstName: "keijo",
	lastName: "palts"
}, {
	firstName: "ingmar",
	lastName: "nurmiste"
}, {
	firstName: "ženja",
	lastName: "fokin"
} ];

/**
 * Sorts specified list elements.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
var sort = function() {
	pupils.sort(function (a, b) {
		return a.lastName.localeCompare(b.lastName);
	});
};

/**
 * Performs binary search of pupils array for inserted last name and counts the steps taken to find it.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
var search = function() {
	document.getElementById("changeState").innerHTML = "";
	var student = document.getElementById('student');
	student.style.display = "none";
	var steps = document.getElementById("steps");
	var noStudent = document.getElementById("noStudent");
	var lastName = document.getElementById("searchBox").value;
	var checkBox = document.getElementById("checkBox");
	var min = 0;
	var max = pupils.length - 1;
	found = false;
	guesstimes = 0;
	if (lastName !== "") {
		do {
			guesstimes++;
			guess = Math.floor((min + max) / 2);
			if (pupils[guess]["lastName"] === lastName) {
				if (pupils[guess]["progSkill"]) {
					checkBox.checked = true;
				}
				else {
					checkBox.checked = false;
				}
				student.style.display = "block";
				noStudent.innerHTML = "";
				found = true;
				break;
			}
			else {
				if (pupils[guess]["lastName"] < lastName) {
					min = guess + 1;
				}
				else {
					max = guess - 1;
				}
			}
		}
		while (min <= max);
		if (!found) {
			noStudent.innerHTML = "Sellist õpilast pole.";
		}
		steps.innerHTML = ("Korduste arv: " + guesstimes);
	}
	else {
		steps.innerHTML = "";
		noStudent.innerHTML = "Palun sisesta õpilase nimi.";
	}
};

/**
 * Communicates through network with specified file.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
var makeRequest = function(parameters) {
	httpRequest = new XMLHttpRequest();
	if ('GET' === parameters.method) {
		httpRequest.onreadystatechange = function() {
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
					var response = JSON.parse(httpRequest.responseText)
					//pupils array peab üle kirjutama PHP andmetega
					pupils = response;
					sort();
				} else {
					console.log("Php file not found!");
				}
			}
		}
	}
	httpRequest.open(parameters.method, 'http://localhost/pstk/Juhansoo/juhansoo/students_ajax/students.php', true);
	if ('POST' === parameters.method) {
		httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	}
	httpRequest.send(parameters.parameters);
};

/**
 * Makes a search request using the GET method
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
document.getElementById("searchButtonAjax").onclick = function() {
	makeRequest({
		method : 'GET'
	});
	search();
};

/**
 * Sorts and creates a table of the students' last names and their programming skills.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
var create = function() {
	sort();
	document.getElementById("studentList").innerHTML = "";
	for (var i=0; i<pupils.length; i++) {
		var table = document.getElementById("studentList");
		var row = table.insertRow(i);
		var cell1 = row.insertCell(0);
		cell1.id = ("cellA" + i);
		cell1.innerHTML = pupils[i]["lastName"];
		var cell2 = row.insertCell(1);
		cell2.id = ("cellB" + i);
		if (pupils[i]["progSkill"]) {
			cell2.style.backgroundColor = "green";
		}
	}
};

/**
 * Displays or hides the created students list.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
var display = function() {
	var studentList = document.getElementById('studentList');
	var displayButton = document.getElementById('displayButton');
	if (studentList.style.display == "table") {
		studentList.style.display = "none";
		displayButton.innerHTML = "Kuvan kogu nimekirja.";
	} 
	else {
		studentList.style.display = "table";
		displayButton.innerHTML = "Peidan nimekirja.";
	}
};

/**
 * Changes the background color of the programming skills according to checkbox state and changes the persons last name if modified.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
var save = function() {
	var searchBox = document.getElementById("searchBox");
	var changeState = document.getElementById("changeState");
	if (checkBox.checked) {
		pupils[guess]["progSkill"] = true;
		document.getElementById("cellB" + guess).style.backgroundColor = "green";
	}
	else {
		pupils[guess]["progSkill"] = false;
		document.getElementById("cellB" + guess).style.backgroundColor = "red";
	}
	if (searchBox.value !== pupils[guess]["lastName"] && searchBox.value !== "") {
		pupils[guess]["lastName"] = searchBox.value;
		create();
	}
	changeState.innerHTML = "Õpilase " + pupils[guess]["lastName"] + " andmed muudetud.";
};

/**
 * Saves changes and posts them.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
document.getElementById("saveButton").onclick = function() {
	save();
	makeRequest({
		method : 'POST',
		parameters : 'lastName=' + document.getElementById('searchBox').value + (document.getElementById("checkBox").checked ? '&progemisoskus=' + 'jah' : '&progemisoskus=' + 'ei')
	});
};