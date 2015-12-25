/**
 * @author Kaire<kaire.ojastu@gmail.com>
 */

/**
 * @var õpilaste toorandmed
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
 * @var binaarse otsingu algus sammudes
 * @author Kaire<kaire.ojastu@gmail.com>
 */
var steps = 0; // korduste algus

/**
 * eesnime binaarne otsing
 * @author Kaire<kaire.ojastu@gmail.com>
 */

function binary() {

	pupils.sort(function(a, b) { // sorteerib õpilased eesnime järgi
		return a.firstName.localeCompare(b.firstName);
	});
/*
     * steps = korduste arv 
*/
	var searchElement = document.getElementById('frame').value; //html-i otsingu väärtus
	var minIndex = 0; // otsingu alguspunkt
	var maxIndeks = pupils.length - 1; // otsingu lõpp-punkt
//	var currentIndex; //kui sa paned siia ette var, siis see on "kohalik" muutuja ja siis ta ei leia seda teistest funktsioonidest üles
	var checkboxProgInput = document.getElementById("checkboxProgInput");
	
	while (minIndex <= maxIndeks) { // kui alguspunkt on väiksem või võrde lõpp-punktiga
		steps++; // suurendab kordust ühe võrra
		currentIndex = Math.floor((minIndex + maxIndeks) / 2); // otsingu keskpunkt

		console.log(currentIndex);
		console.log(pupils[currentIndex]);

		if (pupils[currentIndex].firstName < searchElement) { // if value comes before input value
			minIndex = currentIndex + 1; // increase middle point by one and take it as new starting point
		} else if (pupils[currentIndex].firstName > searchElement) { // if middle point comes after input value 
			maxIndeks = currentIndex - 1; // decrease middle point by one step and take it as new starting point
		} else {
			document.getElementById('found').style.display = 'block'; // element id-järgi//näitab
			document.getElementById('notFound').style.display = 'none'; //element id-järgi//peidab
			document.getElementById('steps').innerHTML = "Korduste arv: " //näitab korduste arvu lõpptulemuseni		
			+ steps;
			steps = 0; // reset steps
			foundIt = "byFirstName";
			if (pupils[currentIndex].canCode === 'yes') {
				checkboxProgInput.checked = true;
			} else if (pupils[currentIndex].canCode === 'no'){
				checkboxProgInput.checked = false;
			} else {
				checkboxProgInput.checked = false;
			}
			console.log(pupils);
			return currentIndex; //väljub funktsioonist
		}
		if (minIndex > maxIndeks) { // if no result is found in firstNames
			pupils.sort(function(a, b) { // sort pupils by lastName
				return a.lastName.localeCompare(b.lastName);
			});
			dataChanged.style.display = 'none';
			binary2(); // and call out the second binary search
		}
	}
}

/**
 * perekonnanime binaarne otsing
 * @author Kaire<kaire.ojastu@gmail.com>
 */
function binary2() { // second function, almost identical to binary();, but
						// loops through lastNames
	var searchElement = document.getElementById('frame').value;
	var minIndex = 0;
	var maxIndeks = pupils.length - 1;
	var checkboxProgInput = document.getElementById("checkboxProgInput");
	
	while (minIndex <= maxIndeks) { // kui alguspunkt on väiksem või võrde lõpp-punktiga
		steps++; // suurendab kordust ühe võrra
		currentIndex = Math.floor((minIndex + maxIndeks) / 2); // otsingu keskpunkt

console.log(currentIndex);
console.log(pupils[currentIndex]);

		if (pupils[currentIndex].lastName < searchElement) {
			minIndex = currentIndex + 1;
		} else if (pupils[currentIndex].lastName > searchElement) {
			maxIndeks = currentIndex - 1;
		} else {

			document.getElementById('found').style.display = 'block'; // element id-järgi//näitab
			document.getElementById('notFound').style.display = 'none'; //element id-järgi//peidab
			document.getElementById('steps').innerHTML = "Korduste arv: " + steps;	//näitab korduste arvu lõpptulemuseni
			steps = 0;
			dataChanged.style.display = 'block';
			foundIt = "byLastName";
			if (pupils[currentIndex].canCode === 'yes') {
				checkboxProgInput.checked = true;
			} else if (pupils[currentIndex].canCode === 'no'){
				checkboxProgInput.checked = false;
			} else {
				checkboxProgInput.checked = false;
			}
	
			console.log(pupils);
			return currentIndex;
		}
		if (minIndex > maxIndeks) {
			document.getElementById('found').style.display = 'none'; //element id-järgi//peidab
			document.getElementById('notFound').style.display = 'block'; // element id-järgi//näitab
			document.getElementById('steps').innerHTML = "Korduste arv: " //näitab korduste arvu lõpptulemuseni
					+ steps;
			steps = 0;
			dataChanged.style.display = 'none';
		}
	}
}
/**
 * päringu tegemine
 * @param string
 * parameters.method võib olla nii GET kui POST
 * @author Kaire<kaire.ojastu@gmail.com>
 */

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
					console.log(pupils);
					console.log(JSON.stringify(pupils));
				} else {
					console.log("Php file not found!");
				}
			}
		}
	}
	httpRequest.open(parameters.method, 'http://localhost/pstk/Kaire/Kontrolltoo_js_ja_ajax/Kontrolltoo7.php', true);
	if ('POST' === parameters.method) {
		httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	}
	var stringJSONData = JSON.stringify(pupils);
	console.log(stringJSONData);
	console.log(parameters.parameters);
	httpRequest.send(stringJSONData, parameters.parameters);
};
/**
 * Teeb otsingu kasutades GET meetodit
 * @author Kaire <kaire.ojastu@gmail.com>
 */
document.getElementById("searchAjax").onclick = function() {
	makeRequest({
		method : 'GET'
	});
	binary();
};
/**
 * salvestamise funktsioon
 * @author Kaire <kaire.ojastu@gmail.com>
 */

function save() {

	var checkboxProgInput = document.getElementById('checkboxProgInput');
	var inputElement = document.getElementById('frame'); 
	
	if (checkboxProgInput.checked === true) { 		
		pupils[currentIndex].canCode = 'yes';
	} else {
		pupils[currentIndex].canCode = 'no';
	};


	var a = inputElement.value;
	s = a.trim();
	if(!s){
		console.log("nimi on täitmata, palun sisesta nimi!");
	}
	else if (foundIt === "byFirstName"){
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
 * salvestab muudatused ja postitab need
 * @author Kaire<kaire.ojastu@gmail.com>
 */
document.getElementById("saveAndEditOr").onclick = function() {
	save();
	makeRequest({
		method : 'POST',
		parameters : 'firstName: '+ pupils[currentIndex].firstName + ' ' + 'lastName: '+ pupils[currentIndex].lastName 
		+ ' ' + 'canCode: ' + pupils[currentIndex].canCode
	});
};
