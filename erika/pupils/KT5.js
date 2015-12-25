/**
 * @author erika säde <erika.s2de@gmail.com>
 */

/**
 * @var raw data of pupils
 */
var pupils = [ {
	firstName : "kaire",
	lastName : "ojastu"
}, {
	firstName : "raiko",
	lastName : "ojaste"
}, {
	firstName : "eleri",
	lastName : "apsolon"
}, {
	firstName : "sander",
	lastName : "mets"
}, {
	firstName : "maarika",
	lastName : "erika"
}, {
	firstName : "kristen",
	lastName : "aeg"
}, {
	firstName : "keijo",
	lastName : "palts"
}, {
	firstName : "ingmar",
	lastName : "nurmiste"
}, {
	firstName : "ženja",
	lastName : "fokin"

} ];

/**
 * @var binary search steps at the beginning
 */
var steps = 0;

/**
 * binary search function for firstNames
 * 
 * @returns int currentIndex
 */

function binary() {

	pupils.sort(function(a, b) { // sort pupils by firstName
		return a.firstName.localeCompare(b.firstName);
	});

	var searchElement = document.getElementById('name').value; // get input value from html
	var minIndex = 0; // starting point of search
	var maxIndex = pupils.length - 1; // ending point of search
	var codeMaster = document.getElementById("codeMaster");

	while (minIndex <= maxIndex) { // while starting point is smaller/equal to ending point
		steps++; // increase steps by one
		currentIndex = Math.floor((minIndex + maxIndex) / 2); // middle point of search

		// console.log(currentIndex);
		// console.log(pupils[currentIndex]);

		if (pupils[currentIndex].firstName < searchElement) { // if value comes before input value
			minIndex = currentIndex + 1; // increase middle point by one and take it as new starting point
		} else if (pupils[currentIndex].firstName > searchElement) { // if middle point comes after input value 
			maxIndex = currentIndex - 1; // decrease middle point by one step and take it as new starting point
		} else {
			document.getElementById('found').style.display = 'block'; // otherwise input value found, show div "found"
			document.getElementById('notFound').style.display = 'none'; // hide div "input"
			document.getElementById('steps').innerHTML = "Korduste arv: " // show how many steps it took to find input value
					+ steps;
			steps = 0; // reset steps
			foundIt = "byFirstName";
			if (pupils[currentIndex].canCode === 'yes') {
				codeMaster.checked = true;
			} else if (pupils[currentIndex].canCode === 'no') {
				codeMaster.checked = false;
			} else {
				codeMaster.checked = false;
			}
			//			console.log(pupils);
			return currentIndex; //exit function
		}
		if (minIndex > maxIndex) { // if no result is found in firstNames
			pupils.sort(function(a, b) { // sort pupils by lastName
				return a.lastName.localeCompare(b.lastName);
			});
			dataChanged.style.display = 'none';
			binary2(); // and call out the second binary search
		}
	}
}

/**
 * binary search function for lastNames
 * 
 * @returns int currentIndex
 */
function binary2() { // second function, almost identical to binary();, but
	// loops through lastNames
	var searchElement = document.getElementById('name').value;
	var minIndex = 0;
	var maxIndex = pupils.length - 1;
	var codeMaster = document.getElementById("codeMaster");

	while (minIndex <= maxIndex) {
		steps++;
		currentIndex = Math.floor((minIndex + maxIndex) / 2);

		// console.log(currentIndex);
		// console.log(pupils[currentIndex]);

		if (pupils[currentIndex].lastName < searchElement) {
			minIndex = currentIndex + 1;
		} else if (pupils[currentIndex].lastName > searchElement) {
			maxIndex = currentIndex - 1;
		} else {

			document.getElementById('found').style.display = 'block';
			document.getElementById('notFound').style.display = 'none';
			document.getElementById('steps').innerHTML = "Korduste arv: "
					+ steps;
			steps = 0;
			dataChanged.style.display = 'block';
			foundIt = "byLastName";
			if (pupils[currentIndex].canCode === 'yes') {
				codeMaster.checked = true;
			} else if (pupils[currentIndex].canCode === 'no') {
				codeMaster.checked = false;
			} else {
				codeMaster.checked = false;
			}

			//			console.log(pupils);
			return currentIndex;
		}
		if (minIndex > maxIndex) {
			document.getElementById('found').style.display = 'none';
			document.getElementById('notFound').style.display = 'block';
			document.getElementById('steps').innerHTML = "Korduste arv: "
					+ steps;
			steps = 0;
			dataChanged.style.display = 'none';
		}
	}
}

/**
 * data saving function
 * 
 * @returns int currentIndex
 */

function save() {

	var codeMaster = document.getElementById('codeMaster');
	var inputElement = document.getElementById('name');

	if (codeMaster.checked === true) {
		pupils[currentIndex].canCode = 'yes';
	} else {
		pupils[currentIndex].canCode = 'no';
	}
	;

	var a = inputElement.value;
	s = a.trim();
	if (!s) {
		console.log("Tühja nime ei salvestata, palun sisesta nimi!");
	} else if (foundIt === "byFirstName") {
		pupils[currentIndex]["firstName"] = s;
	} else if (foundIt === "byLastName") {
		pupils[currentIndex]["lastName"] = s;
	}

	if (s.indexOf(' ') === -1 && s === pupils[currentIndex].firstName) {
		pupils[currentIndex]["firstName"] = s;
		dataChanged.style.display = 'block';
		dataChanged.innerHTML = "Õpilase " + s + " andmed muudetud.";
	} else if (s.indexOf(' ') === -1 && s === pupils[currentIndex].lastName) {
		pupils[currentIndex]["lastName"] = s;
		dataChanged.style.display = 'block';
		dataChanged.innerHTML = "Õpilase " + s + " andmed muudetud.";
	} else if (s.indexOf(' ') > 0) {
		a = s.lastIndexOf(' ');
		pupils[currentIndex]["firstName"] = s.substring(0, a);
		pupils[currentIndex]["lastName"] = s.substring(a + 1);
		dataChanged.style.display = 'block';
		dataChanged.innerHTML = "Õpilase " + s + " andmed muudetud.";
	}
	console.log(pupils[currentIndex]);
	makeRequest({
		method : 'POST',
		parameters : 'firstName='+ pupils[currentIndex].firstName + '&lastName='+ pupils[currentIndex].lastName 
		+ '&canCode=' + pupils[currentIndex].canCode
	});
}

/**
 * do make a request
 * 
 * @param string
 * parameters.method can be GET or POST
 */
function makeRequest(parameters) {
	var httpRequest;
	httpRequest = new XMLHttpRequest();
	if ('GET' === parameters.method) {
		httpRequest.onreadystatechange = function() {
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
					var gotJson = httpRequest.responseText;
					// var parsed = JSON.parse(gotJSON);
					// for(var x in parsed){
					// pupils.push(parsed[x]);}
					var parsed = JSON.parse(gotJson);
					pupils = Object.keys(parsed).map(function(key) {
						return parsed[key]
					}); // converting the keys to an array and then mapping back the
					// values with Array.map, copied from:
					// http://stackoverflow.com/questions/20881213/converting-json-object-into-javascript-array
					pupils.sort(function(a, b) { // sort pupils by firstName
						return a.firstName.localeCompare(b.firstName);
					});
					console.log(pupils);
					console.log(JSON.stringify(pupils));
				} else {
					console.log("Kalmer, we have a problem");
				}
			}
		}
	}
	httpRequest.open(parameters.method,
			"http://localhost/pstk/erika/pupils/KT5.php", true);
	if ('POST' === parameters.method) {
		httpRequest.setRequestHeader("Content-Type",
				"application/x-www-form-urlencoded");
	}
//	var stringJSONData = JSON.stringify(pupils);
//	console.log(stringJSONData, parameters.parameters);
	httpRequest.send(parameters.parameters);
}

document.getElementById("buttonForGettingData").onclick = function() {
	makeRequest({
		method : 'GET'
	});
	binary();
};
