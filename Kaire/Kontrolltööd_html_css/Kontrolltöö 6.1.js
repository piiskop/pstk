/**
 * @var the raw data of pupils
 * @author Kaire <kaire.ojastu@gmail.com>
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
var steps = 0;

/**
 * eesnime binaarne otsing
 * @author Kaire<kaire.ojastu@gmail.com>
 */

function binary() {

	pupils.sort(function(a, b) { 
		return a.firstName.localeCompare(b.firstName);
	});

	var searchElement = document.getElementById('frame').value;
	var minIndex = 0; 
	var maxIndex = pupils.length - 1;
	var checkboxProgInput = document.getElementById("checkboxProgInput");
	
	while (minIndex <= maxIndex) { 
		steps++;
		currentIndex = Math.floor((minIndex + maxIndex) / 2);

		console.log(currentIndex);
		console.log(pupils[currentIndex]);

		if (pupils[currentIndex].firstName < searchElement) {
			minIndex = currentIndex + 1;
		} else if (pupils[currentIndex].firstName > searchElement) { 
			maxIndex = currentIndex - 1;
		} else {
			document.getElementById('found').style.display = 'block';
			document.getElementById('notFound').style.display = 'none';
			document.getElementById('steps').innerHTML = "Korduste arv: "	
			+ steps;
			steps = 0;
			foundIt = "byFirstName";
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
		if (minIndex > maxIndex) {
			pupils.sort(function(a, b) {
				return a.lastName.localeCompare(b.lastName);
			});
			dataChanged.style.display = 'none';
			binary2();
		}
	}
}

/**
 * perekonnanime binaarne otsing
 * @returns int currentIndex
 */
function binary2() {

	var searchElement = document.getElementById('frame').value;
	var minIndex = 0;
	var maxIndex = pupils.length - 1;
	var checkboxProgInput = document.getElementById("checkboxProgInput");
	
	while (minIndex <= maxIndex) {
		steps++;
		currentIndex = Math.floor((minIndex + maxIndex) / 2);

console.log(currentIndex);
console.log(pupils[currentIndex]);

		if (pupils[currentIndex].lastName < searchElement) {
			minIndex = currentIndex + 1;
		} else if (pupils[currentIndex].lastName > searchElement) {
			maxIndex = currentIndex - 1;
		} else {

			document.getElementById('found').style.display = 'block';
			document.getElementById('notFound').style.display = 'none';
			document.getElementById('steps').innerHTML = "Korduste arv: " + steps;	
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
 * salvestamise funktsioon
 * @returns int currentIndex
 * @author Kaire<kaire.ojastu@gmail.com>
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
