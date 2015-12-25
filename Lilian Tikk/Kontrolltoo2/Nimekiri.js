/**
 * @author lilian tikk <lilian.tikk03@gmail.com>
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
 * @var binary search steps (beginning)
 */
var steps = 0;

/**
 * binary search function (firstNames)
 * @returns int currentIndex
 */

function binary() {

	pupils.sort(function(a, b) { // sorteerib eesnime järgi 
		return a.firstName.localeCompare(b.firstName);
	});

	var searchElement = document.getElementById('name').value; // saab sisemiseväärtuse html-ist
	var minIndex = 0; // otsingu alguspunkt
	var maxIndex = pupils.length - 1; // otsingu lõpp-punkt
	var codePrincipal = document.getElementById("codePrincipal");

	while (minIndex <= maxIndex) { // kui alguspunkt on väiksem/võrdne kõpp-punktist
		steps++; // Iga tehtud otsingu korral suurendab tehtud otsingute kordust
		currentIndex = Math.floor((minIndex + maxIndex) / 2); // otsingu keskpunkt

		if (pupils[currentIndex].firstName < searchElement) { // kui väärtus tuleb enne sisemistväärtust
			minIndex = currentIndex + 1; // suurendab keskpunkti ühevõrra ja võtab keskpunktile uue lähtepunkti
		} else if (pupils[currentIndex].firstName > searchElement) { // kui keskpunkt tuleb peale sisemistväärtust
			maxIndex = currentIndex - 1; // vähendab keskpunkti ühevõrra ja võtab keskpunktile uue lähtepunkti
		} else {
			document.getElementById('found').style.display = 'block'; // sisemineväärtus leitud, kuvab "leitud"
			document.getElementById('notFound').style.display = 'none'; // varjab div-is "input"-i
			document.getElementById('steps').innerHTML = "Korduste arv: " // näitab otsinguks kulunud samme
					+ steps;
			steps = 0; // sammud nulli
			foundIt = "byFirstName";
			if (pupils[currentIndex].canCode === 'yes') {
				codePrincipal.checked = true;
			} else if (pupils[currentIndex].canCode === 'no') {
				codePrincipal.checked = false;
			} else {
				codePrincipal.checked = false;
			}
			console.log(pupils);
			return currentIndex; //väljub funktsioonist
		}
		if (minIndex > maxIndex) { // kui eesnimedest tulemust ei leita, siis-->> 
			pupils.sort(function(a, b) { // sorteerib perekonnanime järgi
				return a.lastName.localeCompare(b.lastName);
			});
			dataChanged.style.display = 'none';
			binary2(); // kutsub välja teise binaarse funktsiooni
		}
	}
}

/**
 * binary search function (lastNames)
 * @returns int currentIndex
 */
function binary2() { // sama nagu eelmine aga käib perekonnanimesid läbi  
	var searchElement = document.getElementById('name').value; // saab sisemiseväärtuse html-ist
	var minIndex = 0; // otsingu alguspunkt
	var maxIndex = pupils.length - 1; // otsingu lõpp-punkt
	var codePrincipal = document.getElementById("codePrincipal");

	while (minIndex <= maxIndex) { // kui alguspunkt on väiksem/võrdne kõpp-punktist
		steps++; // Iga tehtud otsingu korral suurendab tehtud otsingute kordust
		currentIndex = Math.floor((minIndex + maxIndex) / 2);  // otsingu keskpunkt


		if (pupils[currentIndex].lastName < searchElement) { // kui väärtus tuleb enne sisemistväärtust  
			minIndex = currentIndex + 1; // suurendab keskpunkti ühevõrra ja võtab keskpunktile uue lähtepunkti
		} else if (pupils[currentIndex].lastName > searchElement) { // kui keskpunkt tuleb peale sisemistväärtust
			maxIndex = currentIndex - 1; // vähendab keskpunkti ühevõrra ja võtab keskpunktile uue lähtepunkti  
		} else {

			document.getElementById('found').style.display = 'block'; // sisemineväärtus leitud, kuvab "leitud"
			document.getElementById('notFound').style.display = 'none'; // varjab div-is "input"-i  
			document.getElementById('steps').innerHTML = "Korduste arv: " // näitab otsinguks kulunud samme  
					+ steps;
			steps = 0; // sammud nulli  
			dataChanged.style.display = 'block';
			foundIt = "byLastName";
			if (pupils[currentIndex].canCode === 'yes') { 
				codePrincipal.checked = true;
			} else if (pupils[currentIndex].canCode === 'no') {
				codePrincipal.checked = false;
			} else {
				codePrincipal.checked = false;
			}

			console.log(pupils);
			return currentIndex;  //väljub funktsioonist  
		}
		if (minIndex > maxIndex) { // kui eesnimedest tulemust ei leita, siis-->> 
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
 * function for saving data
 * @returns int currentIndex
 */

function save() {

	var codePrincipal = document.getElementById('codePrincipal');
	var inputElement = document.getElementById('name');

	if (codePrincipal.checked === true) {
		pupils[currentIndex].canCode = 'yes';
	} else {
		pupils[currentIndex].canCode = 'no';
	}
	;

	var a = inputElement.value;
	s = a.trim();
	if (!s) {
		console.log("Sisesta nimi!");
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
	console.log(pupils);
}

/**
 * Displays students' list
 */
//Kuvab kogu õpilaste nimekirja
function displayAll() {

	var allStudents = "";

	for (i = 0; i < pupils.length; i++) {

		Object.keys(pupils[i]).forEach(function(key) { //käib objekti parameetreid järjest läbi
			allStudents += pupils[i][key] + " "; //salvestab ühekaupa
		});
		allStudents += "<br />";
	}
	document.getElementById("answer").innerHTML = allStudents;
}

/**
 * make a request
 * 
 * parameters.method (GET or POST)
 */
function makeRequest(parameters) {
	var httpRequest;
	httpRequest = new XMLHttpRequest();
	if ('GET' === parameters.method) {
		httpRequest.onreadystatechange = function() {
		if (httpRequest.readyState === XMLHttpRequest.DONE) {
		if (httpRequest.status === 200) {
			var gotJson = httpRequest.responseText;
			var parsed = JSON.parse(gotJson);
				pupils = Object.keys(parsed).map(function(key) {
					return parsed[key] //Teisendab "võtmed" massiivi ja kaardistab tagasi väärtused Array.map-i, kopeeritud ->> http://stackoverflow.com/questions/20881213/converting-json-object-into-javascript-array
				}); 
					pupils.sort(function(a, b) { // õpilased sorteeritakse eesnime järgi  
						return a.firstName.localeCompare(b.firstName);
					});
					console.log(pupils);
					console.log(JSON.stringify(pupils));
				} else {
					console.log("Tere");
				}
			}
		}
	}
	httpRequest.open(parameters.method,
			"http://localhost/pstk/Lilian%20Tikk/Kontrolltoo/Nimekiri.php", true);
	if ('POST' === parameters.method) {
		httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	}
	var stringJSONData = JSON.stringify(pupils); 
	
//	console.log(parameters.parameters);
	httpRequest.send(parameters.parameters);
}

document.getElementById("GetData").onclick = function() {
	makeRequest({
		method : 'GET'
	});
	binary();
};

