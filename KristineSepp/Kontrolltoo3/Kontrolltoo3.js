/**
 * @author Kristine <Kristinesepp@gmail.com>
 * 
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
var steps = 0; // kordused

/**
 * search through firstnames
 * @author Kristine <Kristinesepp@gmail.com>
 * @returns int currentIndex
 */


function findPupil() {

	pupils.sort(function(a, b) { // sorteeri õpilased eesnime järgi
		return a.firstName.localeCompare(b.firstName);
	});

	var searchName = document.getElementById('Form1').value; // HTML'i
																// sisestatud
																// otsingunimi
	var minIndex = 0; // otsingu alguspunkt
	var maxIndex = pupils.length - 1; // otsingu lõpp-punkt
	var coding = document.getElementById("coding");

	while (minIndex <= maxIndex) { // kui alguspunkt on väiksem/võrdne
									// lõpp-punktiga
		steps++; // suurenda kordusi ühe võrra

		currentIndex = Math.floor((minIndex + maxIndex) / 2); // otsingu
																// keskpunkt

		if (pupils[currentIndex].firstName < searchName) { // kui väärtus tuleb
															// enne
															// otsinguväärtust
			minIndex = currentIndex + 1; // suurenda keskpunkti ühe võrra ja
											// kasuta seda uue alguspunktina
		} else if (pupils[currentIndex].firstName > searchName) { // kui
																	// väärtus
																	// tuleb
																	// pärast
																	// otsinguväärtust
			maxIndex = currentIndex - 1; // vähenda keskpunkti ühe võrra ja
											// kasuta seda uue alguspunktina
		} else {
			document.getElementById('Leitud').style.display = 'block'; // kui
																		// otsinguväärtus
																		// leiatkse,
																		// muuda
																		// nähtavaks
																		// div
																		// "Leitud"
			document.getElementById('eiLeitud').style.display = 'none'; // peida
																		// div
																		// "eiLeitud"
			document.getElementById('steps').innerHTML = "Korduste arv: " // näita
																			// korduste
																			// arvu
					+ steps;
			steps = 0; // algseadista kordused
			found = "byFirstName";
			if (pupils[currentIndex].canCode === 'yes') {
				coding.checked = true;
			} else if (pupils[currentIndex].canCode === 'no') {
				coding.checked = false;
			} else {
				coding.checked = false;
			}

			return currentIndex;
		}
		if (minIndex > maxIndex) { // kui eesnime jäjrgi ei leia
			pupils.sort(function(a, b) { // sorteeri õpilased perenime järgi
				return a.lastName.localeCompare(b.lastName);
			});
			muudaAndmeid.style.display = 'none';
			findPupil2(); // Kutsu välja perenime järgi otsing
		}
	}
}
/**
 * search through lastnames
 * @author Kristine <Kristinesepp@gmail.com>
 * @returns int currentIndex
 */

function findPupil2() { // otsing perenime järgi
	var searchName = document.getElementById('Form1').value;
	var minIndex = 0;
	var maxIndex = pupils.length - 1;
	var coding = document.getElementById("coding");

	while (minIndex <= maxIndex) {
		steps++;
		currentIndex = Math.floor((minIndex + maxIndex) / 2);

		if (pupils[currentIndex].lastName < searchName) {
			minIndex = currentIndex + 1;
		} else if (pupils[currentIndex].lastName > searchName) {
			maxIndex = currentIndex - 1;
		} else {

			document.getElementById('Leitud').style.display = 'block';
			document.getElementById('eiLeitud').style.display = 'none';
			document.getElementById('steps').innerHTML = "Korduste arv: "
					+ steps;
			steps = 0;
			muudaAndmeid.style.display = 'block';
			found = "byLastName";
			if (pupils[currentIndex].canCode === 'yes') {
				coding.checked = true;
			} else if (pupils[currentIndex].canCode === 'no') {
				coding.checked = false;
			} else {
				coding.checked = false;
			}

			return currentIndex;
		}
		if (minIndex > maxIndex) {
			document.getElementById('Leitud').style.display = 'none';
			document.getElementById('eiLeitud').style.display = 'block';
			document.getElementById('steps').innerHTML = "Korduste arv: "
					+ steps;
			steps = 0;
			muudaAndmeid.style.display = 'none';
		}
	}
}

/**
 * function for changing data
 * @author kristinesepp@gmail.com
 * @returns int currentIndex
 */

function salvesta() {

	var coding = document.getElementById('coding');
	var inputElement = document.getElementById('Form1');

	if (coding.checked === true) {
		pupils[currentIndex].canCode = 'yes';
	} else {
		pupils[currentIndex].canCode = 'no';
	}
	;

	var a = inputElement.value;
	b = a.trim();
	if (!b) {
		console.log("Palun sisesta nimi!");
	} else if (found === "byFirstName") {
		pupils[currentIndex]["firstName"] = b;
	} else if (found === "byLastName") {
		pupils[currentIndex]["lastName"] = b;
	}

	if (b.indexOf(' ') === -1 && b === pupils[currentIndex].firstName) {
		pupils[currentIndex]["firstName"] = b;
		muudaAndmeid.style.display = 'block';
		muudaAndmeid.innerHTML = b + " andmed muudetud.";
	} else if (b.indexOf(' ') === -1 && b === pupils[currentIndex].lastName) {
		pupils[currentIndex]["lastName"] = b;
		muudaAndmeid.style.display = 'block';
		muudaAndmeid.innerHTML = b + " andmed muudetud.";
	} else if (b.indexOf(' ') > 0) {
		a = b.lastIndexOf(' ');
		pupils[currentIndex]["firstName"] = b.substring(0, a);
		pupils[currentIndex]["lastName"] = b.substring(a + 1);
		muudaAndmeid.style.display = 'block';
		muudaAndmeid.innerHTML = b + " andmed muudetud.";
	}
	console.log(pupils[currentIndex]);
	makeRequest({
		method : 'POST',
		parameters : 'firstName='+ pupils[currentIndex].firstName + '&lastName='+ pupils[currentIndex].lastName 
		+ '&canCode=' + pupils[currentIndex].canCode
	});
}


/**
 * A function for making a request
 * @param string
 * @author Kristine <Kristinesepp@gmail.com>
 */
var makeRequest = function (parameters) {
		var httpRequest;
		httpRequest = new XMLHttpRequest();
		if ('GET' === parameters.method) {
		httpRequest.onreadystatechange = function(){
				if (httpRequest.readyState === XMLHttpRequest.DONE) {
					if (httpRequest.status === 200) {
						var incomingJSON = httpRequest.responseText;
						var parsedJSON = JSON.parse(incomingJSON);
						pupils = Object.keys(parsedJSON).map(function(k) { return parsedJSON[k] });
						console.log("228: pupils updated with AJAX");
						document.getElementById("coding").checked = false;
						findPupil();
					} else {
						console.log('237: There was a problem with the request.');
					}
				}
		}
		}
		httpRequest.open(parameters.method, "http://localhost/pstk/KristineSepp/Kontrolltoo3/Kontrolltoo3.php", true);
		if ('POST' === parameters.method) {
			httpRequest.setRequestHeader("Content-type", "application/json");
		}
		httpRequest.send();
	}
/**
 *  Get element by Id from HTML file and when button is clicked, it will start function makeRequest
 */

document.getElementById("ajaxButton").onclick = function() {
	makeRequest({
		method : 'GET'
	});
	findPupil();
};