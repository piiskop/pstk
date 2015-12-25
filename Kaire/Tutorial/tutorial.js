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
	part1 = "Koogitegemisel";
	space = " ";
	part2 = "tuleb kasutada";
	part3 = "jahu.";
	sentence1 = part1 + space + part2 + space + part3;
	sentence2 = "koogitegemisel" + " " + "tuleb kasutada" + " " + "jahu.";
	console.log("17: " + sentence1);
}

/**
 * length of a string
 */
var length = false;
if (length) {
	name = "peeter";
	console.log("20: " + name.length);
}

/**
 * addition
 */
var addition = false;
if (addition) {
	firstName = "peeter";
	lastName = "pääsuke";
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
	firstName = "peeter";
	lastName = "pääsuke";
	lengthOfLastNameLongerThanLengthOfFirstName = (lastName.length > firstName.length);
	console.log(" 54: " + lengthOfLastNameLongerThanLengthOfFirstName);
	console.log(" 75: " + (7 && 8));
}

// comparisons
var comparisons = false;
if (comparisons) {
	firstName = "peeter";
	lastName = "pääsuke";
	console.log(" 89: " + (firstName.length < lastName.length));
	console.log(" 90: " + (lastName.length > firstName.length));
	console.log(" 91: " + (lastName.length === 7));
	console.log(" 92: " + (lastName !== firstName));
	console.log(" 93: " + (lastName > firstName));
}

// decision
var decision = false;
if (decision) {
	firstName = "peeter";
	if (firstName.length > 6) {
		console.log(" 103: long name");
	} else if (firstName.length < 3) {
		console.log(" 97: mininame");
	} else {
		console.log(" 107: short name");
	}

	switch (firstName) {
	case "marten":
	case "peeter": {
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

// debugging
var debugging = false;
if (debugging) {

	// if (6 = 6);
	// {
	// console.log(" 119 ");
	// }
	// else
	// {
	// console.log(" 123 ");
	// }

}

// Math
var math = false;
if (math) {

	if (("peeter".length / 6 * ("pääsuke".length + 1)) === 6) {
		console.log(" 135 ");
	} else {
		console.log(" 139 ");
	}

}

// modulo
var modulo = false;
if (modulo) {

	if ((10 % 2) === 0) {
		console.log(" 135: even");
	} else {
		console.log(" 139: odd");
	}

}

// substring
var substring = false;
if (substring) {
	substring = "37804080345".substring(3, 5);
	console.log(" 645: " + substring);
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
var anonymousFunction2 = true;
if (anonymousFunction2) {
	var a = function() {
		console.log(" 237: a");
	}
	a();
}

// Loops {
var whileLoop = false;  // vastus 0, 1, 2
if(whileLoop) {
 var i = 0;
 while (i<3)
  {
  console.log(i);
  i++
  }
 }

var doLoop = false;  // vastus 0, 1, 2
if(doLoop) {
 var i = 0;
 do{
  console.log(i);
  i++;
 }
  while (i < 3)
}

var doLoop = false;  // vastus 0, seejärel tsükkel katestkab
if(doLoop) {
 var i = 0;
 do{
  console.log(i);
  if(i < 2){
   break;
  }
  i++;
 }
  while (i < 3)
}

var doLoop = false;  // vastus 0, seejärel tsükkel katestkab
if(doLoop) {
 var i = 0;
 do{
  console.log(i);
  if(i < 2){
   break;
  }
  i++;
 }
  while (i < 3)
}

var doLoop = false;  // vastus 0, seejärel tsükkel katestkab
if(doLoop) {
 var i = 0;
 do{
  console.log(i);
  if(i < 2){
   break;
  }
  i++;
 }
  while (i < 3)
}

var forLoop = false;
if(forLoop){
 for (var i = 0; i < 3; i++){
  console.log(i);
 }
}
// Objekts {
var object = false;
if (objekts){
	var pupil1 ={  // uus objekt, objekti kirjeldame looksulgudega
	
			firstName: "kaire",
			lastName: "ojastu",
			email: k@o.ee 
	};  // esimene sihitis loodud
			var pupil2 = {  // uus objekt, objekti kirjeldame looksulgudega
			firstName: "peeter",
			lastName: "pääsuke",
			email: e@s.ee	// kui omadusel on tühik sees (nt email aadress), siis console.log tuleb [] sisse
			};
	
			// Spliting
			var splitting = true;
			if splitting {
				var string = "mysql databases -h localhost -u databases -p <[faili nimi].sql";
				console.log("332; " + string.split());
			}
			var splitting = true;
			 if (splitting) {
			  var string = "külmast tulest langes pime leek";
			  console.log(string.split(" "));
			 }
			 
			var split = string.split(" ");
			console.log(string.split(" ")[2] + " " + string.split(" ")[1] + " " + string.split(" ")[0] + " " + string.split(" ")[4] + " " + string.split(" ")[3]);
// var Pupil ={
// pupils; [pupil1, pupil2],
// insertPupil; function(firstName, lastName, email){
// var pupil = {
// firstName: firstName,
// lastName: lastName,
// email: email
// }
// pupils.push(pupil); //lisab ühe õpilase masiivi juurde???
// }
// }
			var pupil = new Pupil();
			 pupil.insertPupil("raiko", "heinla", "r@h.ee");
			 console.log(pupil.pupils[0].firstName) 
			 console.log(pupil1.lastName + ", " + pupil1.email) // loeb välja esimese õpilase perekonnanime ja 
			 var subject1 = {
				  name:"Veebirakenduste loomise alused",
				  eap: 5
				 };

				 var learning = {
				  beginning: "20151023",
				  place: "31",
				  subject: subject1,    // subject1 objekt
				  pupils: [pupil1, pupil2] // masiivi sisse õpilased
				 };

				 for(var pupil in learning pupils){
				  console.log(learning.pupils[pupil].firstName); // tsükliga õpilaste
				 }
				  }

// Random number

var random = true;
if (random)