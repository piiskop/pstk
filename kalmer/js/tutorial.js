/**
 * This file is about variables in Javascript.
 */
number = 7;
sentence = "I'm a string!";
boolean = true;

/**
 * example of concatenation
 */
var concatenation = false;
if (concatenation) {
	part1 = "Paastumisel";
	space = " ";
	part2 = "võib tarvitada";
	part3 = "vett.";
	sentence1 = part1 + space + part2 + space + part3;
	sentence2 = "Paastumisel" + " " + "võib tarvitada" + " " + "vett.";
	console.log("17: sentence1: " + sentence1 + ", sentence2: " + sentence2);
}

/**
 * length of a string
 */
var length = false;
if (length) {
	name = "kalmer";
	console.log("20: " + name.length);
}

/**
 * addition
 */
var addition = false;
if (addition) {
	firstName = "kalmer";
	lastName = "piiskop";
	lengthOfName = firstName.length + 1 + lastName.length;
	console.log("23: " + lengthOfName);
}

// one-line comment telling about an error case
var error = false
if (error) {
	console.log("33: " + unknownVariable.length);
}

// confirm box
var confirmation = false;
if (confirmation) {
	if (confirm("Do you really want to continue learning JS?")) {
		console.log(" yes ");
	} else {
		console.log(" no ");
	}
}

// prompt box
var prompting = false;
if (prompting) {
	var entry = prompt("What exactly do I want to learn about JS?");
	if (entry) {
		document.write(entry);

	}
}

// boolean
var boolean = false;
if (boolean) {
	firstName = "kalmer";
	lastName = "piiskop";
	lengthOfLastNameLongerThanLengthOfFirstName = (lastName.length > firstName.length);
	console.log(" 54: " + lengthOfLastNameLongerThanLengthOfFirstName);
	console.log(" 75: " + ("" || 8));
	var string = "7";
	var number = 7;
	console.log(" 78: " + (string == number) + ", " + (string === number));
}

// comparisons
var comparisons = false;
if (comparisons) {
	firstName = "kalmer";
	lastName = "piiskop";
	console.log(" 89: " + (firstName.length < lastName.length));
	console.log(" 90: " + (lastName.length > firstName.length));
	console.log(" 91: " + (lastName.length === 7));
	console.log(" 92: " + (lastName !== firstName));
	console.log(" 93: " + (lastName > firstName));
}

// decision
var decision = false;
if (decision) {
	firstName = "marten";
	if (firstName.length > 6) {
		console.log(" 103: long name");
	} else if (firstName.length < 3) {
		console.log(" 97: mininame");
	} else {
		console.log(" 107: short name");
	}

	switch (firstName) {
	case "marten":
	case "kalmer": {
		console.log(" 118: marten");

		break;
	}
	case "juhan": {
		console.log(" 111: juhan");

		break;
	}
	default: {
		console.log(" 116: muu nimi");

	}
	}
}

// Math
var math = false;
if (math) {

	if (("kalmer".length / 6 * ("piiskop".length + 1)) === 6) {
		console.log(" 135 ");
	} else {
		console.log(" 139 ");
	}

}

// modulo
var modulo = false;
if (modulo) {

	if ((10 % 4) === 0) {
		console.log(" 135: even");
	} else {
		console.log(" 139: odd");
	}

}

// Delete

var deleteVariable = false;
if (deleteVariable) {
	var kristen = {
		age : 20,
		sugu : 'mees',
		phoneNumbers : [ '112', '110' ]
	};
	kristen.phoneNumbers.splice(1, 1);
	delete kristen.age;
	console.log(" 159: " + kristen.toSource() + ", " + kristen.phoneNumbers[1]
			+ ", " + kristen.phoneNumbers.length);
}

// Loops

var whileLoop = false;
if (whileLoop) {
	var i = 0;
	while (i < 3) {
		console.log(" 249: " + i);
		i++;
	}
}

var doLoop = false;
if (doLoop) {
	var i = 0;
	do {
		console.log(" 249: " + i);
		i++;
	} while (i < 3)
}

var forLoop = false;
if (forLoop) {
	for (var i = 0; i < 3; i++) {
		console.log(" 271: " + i);
	}
}

var forIn = false;
if (forIn) {
	var kristen = {
		age : 20,
		sugu : 'mees',
		phoneNumbers : [ '112', '110' ]
	};
	for (property in kristen) {
		console.log(" 199: " + property + ": " + kristen[property]);
	}
}

var forEach = false;
if (forEach) {
	var kristen = {
		age : 20,
		sugu : 'mees',
		phoneNumbers : [ '112', '110' ]
	};
	kristen.phoneNumbers.forEach(function(value, index, object) {
		object[index] = value + ".";
	});
	console.log(" 213: " + kristen.toSource());
}

var map = false;
if (map) {
	var kristen = {
		age : 20,
		sugu : 'mees',
		phoneNumbers : [ '112', '110' ]
	};
	var phoneNumbers = kristen.phoneNumbers.map(Math.sqrt);
	console.log(" 213: " + kristen.phoneNumbers + ", " + phoneNumbers);
}

var labelling = false;
if (labelling) {
	next_prime: for (var i = 2; i < 10; i++) {

		for (var j = 2; j < i; j++) {
			if (i % j == 0)
				continue next_prime
		}

		console.log(" 520: " + i); // prime
	}

}
// substring

var substring = false;
if (substring) {
	substring = "37804080345".substring(5, 7);
	console.log(" 645: " + substring);
}

var index = true;
if (index) {
	var str = "Widget"
	if (~str.indexOf("get")) {
		console.log(" 251: " + str.indexOf("get") + ", " + ~3 + ", "
				+ (-4 == true) + ", " + (false ? "false" : "true") + ", "
				+ ~str.indexOf("get") + ", " + (~str.indexOf("get") == true));
	}

}
// array
var array = false;
if (array) {
	var numbers = new Array();
	numbers[0] = 1;
	numbers[1] = 2;

	var numbers2 = [ 1, 2 ];
	console.log(" 175: " + numbers[1] + ", " + numbers2[0]);

	var songs = [ {
		'name' : "Torm",
		"artist" : "Terminaator"
	}, {
		'name' : "Pimeduse prints",
		"artist" : "Black Velvet"
	}, {
		'name' : "Valgus",
		"artist" : "GGG"
	} ];

	console.log(" 186: " + songs[2].artist);
}

/**
 * This function shows how to play with Document Object Model.
 */
var playDom = function() {
	var a1 = document.createElement("a");
	a1.setAttribute("href", "http://localhost");
	a1.textContent = "first link";
	var body = document.getElementsByTagName("body")[0];
	body.appendChild(a1);
	var a2 = document.createElement("a");
	a2.setAttribute("href", "http://localhost");
	a2.protocol = "https";
	a2.textContent = "second link";
	body.appendChild(a2);
	var a = document.links[0]; // obtain the first link in the document
	console.log(" 183: " + a.textContent);
}

function loadImage() {
	console.log("Image is loaded");
}

// Hoisting
var hoisting1 = false;
if (hoisting1) {
	function a() {
		console.log(" 216: a");
	}
	a();
}
var hoisting2 = false;
if (hoisting2) {
	console.log(" 222: " + b);
	var b = "b";
	a();
	function a() {
		console.log(" 223: a");
	}
}
var anonymousFunction1 = false;
if (anonymousFunction1) {
	a();
	var a = function() {
		console.log(" 231: a");
	}
}
var anonymousFunction2 = false;
if (anonymousFunction2) {
	var a = function() {
		console.log(" 237: a");
	}
	a();
}

// Objects

var object = false;
if (object) {
	var pupil1 = {
		firstName : "marten",
		lastName : "kähr",
		email : "m@k.ee"
	};

	var pupil2 = {
		firstName : "arnold",
		lastName : "tšerepov",
		email : "a@t.ee"
	};

	// var Pupil = {
	// pupils: [pupil1, pupil2],
	// insertPupil: function(firstName, lastName, email) {
	// var pupil = {
	// firstname: firstName,
	// lastName: lastName,
	// email: email
	// };
	// pupils.push(pupil);
	// }
	// }
	//	
	// var pupil = new Pupil();
	// pupil.insertPupil("raiko", "heinla", "r@h.ee");
	// console.log(" 305: "+ pupil.pupils[0].firstName);
	console.log(" 291: last name: " + pupil1.lastName + ", email: "
			+ pupil1.email)

	var subject1 = {
		name : "Veebirakenduste loomise alused",
		eap : 5
	};

	var learning = {
		beginning : "20151023",
		place : "31",
		subject : subject1,
		pupils : [ pupil1, pupil2 ]
	};

	console.log(" 305: " + learning.place);

	for ( var pupil in learning.pupils) {
		console.log(" 308: " + learning.pupils[pupil].firstName);
	}
}

// Splitting

var splitting = false;
if (splitting) {
	var string = "mysql databases -h localhost -u databases -p < [faili nimi].sql";
	console.log(" 332: " + string.split(" "));

	/**
	 * This function rearranges the words in a string according to the given new
	 * order.
	 * 
	 * @author kalmer
	 * @param string
	 *            parameters['origin'] the original text
	 * @param int[]
	 *            parameters['newOrder'] the new order
	 */
	var rearrange = function(parameters) {
		var arrayOfOrigin = parameters['origin'].split(" ");
		var arrayOfResult = new Array();
		for (var indexOfOrder = 0; indexOfOrder < parameters['newOrder'].length; indexOfOrder++) {
			arrayOfResult
					.push(arrayOfOrigin[parameters["newOrder"][indexOfOrder]]);
		}
		console.log(' 76: ', arrayOfResult.join(" "));
	}

	rearrange({
		'origin' : 'külmast tulest langes pime leek',
		'newOrder' : [ 2, 1, 0, 4, 3 ]
	});

}

// Scope

var scope = false;
if (scope) {
	var b = 2;
	var a = function() {
		var c = 4;
		console.log(" 368: " + b);
	}
	console.log(" 371: " + b);
	a();
	console.log(" 372: " + c);
}

// Random number

var random = false;
if (random) {
	var array = new Uint32Array(5);
	window.crypto.getRandomValues(array);
	console.log("Your lucky numbers:");
	for (var i = 0; i < array.length; i++) {
		console.log(array[i]);
	}
	// Returns a random integer between min (included) and max (included)
	// Using Math.round() will give you a non-uniform distribution!
	function getRandomIntInclusive(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}
	console.log(" 387: " + getRandomIntInclusive(12, 18));
}

// Showing-hiding

/**
 * This function shows the element if it is hidden and the other way around.
 * 
 * @author kalmer
 * @param string
 *            parameters.id the ID of the element
 * @param string
 *            parameters.textOnButton the button
 */
var showHide = function(parameters) {
	var element = document.getElementById(parameters.id);
	if (element.style.display == "block") {
		element.style.display = "none";
		parameters.button.innerHTML = 'Näitan.';
	} else {
		element.style.display = "block";
		parameters.button.innerHTML = 'Peidan.';
	}
}

// Locale storage

var writeName = function() {
	if (!localStorage.getItem('nameOfYou')) {
		localStorage.setItem("nameOfYou", prompt("Mis nimi?"));
	}
	var storedName = localStorage.getItem('nameOfYou');
	console.log(" 422: " + storedName);
	for (key in localStorage) {
		console.log(" 423: key: " + key + ", value: "
				+ localStorage.getItem(key));
	}
};

// Function call
var functionCall = false;
if (functionCall) {
	function talitlus1() {
		console.log(" 419 ");
	}
	var muutuja = function talitlus() {
		console.log(" 417 ");
	};

	muutuja();
	talitlus1();
}

function appendChildren() {
	var allDivs = document.getElementsByTagName("div");
	console.log(" 483: " + allDivs.length);
	var length = allDivs.length;
	for (var i = 0; i < length; i++) {
		var newDiv = document.createElement("div");
		decorateDiv(newDiv);
		var oldDiv = allDivs[i];
		oldDiv.appendChild(newDiv);
	}
}

// Mock of decorateDiv function for testing purposes
function decorateDiv(div) {
	console.log(" 493 ");
}
console.log(" 495 ");
appendChildren();
function formatDate(userDate) {
	// format from M/D/YYYY to YYYYMMDD
	var splitted = userDate.split("/");
	var month = splitted[0];
	var day = splitted[1];
	var year = splitted[2];
	var pad = "00";
	var convertedMonth = pad.substring(0, pad.length - month.length) + month;
	var convertedDay = pad.substring(0, pad.length - day.length) + day;
	var convertedDate = year + convertedMonth + convertedDay;
	return convertedDate;
}

console.log(formatDate("2/4/2015"));
