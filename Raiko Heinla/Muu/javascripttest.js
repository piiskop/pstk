/**
 * 
 */
{
	part1 = "Täna";
	space = " ";
	part2 = "paistab";
	part3 = "päike";
	sentence1 = part1 + space + part2 + space + part3;
	console.log(sentence1);
}

/*var r = confirm("What do you want to do next?");
if (r == true) {
    x = "You pressed OK!";
} else {
    x = "You pressed Cancel!";
}
console.log(x);*/


var comparisons = false;
if (comparisons)
{
	firstName = "kalmer";
	lastName = "piiskop";
	console.log(" 89: " + (firstName.length < lastName.length));
	console.log(" 90: " + (lastName.length > firstName.length));
	console.log(" 91: " + (lastName.length === 7));
	console.log(" 92: " + (lastName !== firstName));
	console.log(" 93: " + (lastName > firstName));
}

{
	muutuja1 = "õues ";
	muutuja2 = "paistis " + muutuja1 + "päike";
	muutuja3 = "Täna" + muutuja2;
	console.log(muutuja3);
}

/*
var array=false;
if(array){
	var numbers = new Array();
	numbers[0] = 1;
	numbers[1] = 2;
	
	var numbers2 = [1, 2];
	console.log(numbers[1] + "," + numbers2[0]);
	
	var songs = [{
			{
				'name': "Musta pori näkku",
				"artist": "Mihkel Raud"
			}
			{
				'name': "Musta pori näkku",
				"artist": "Lenna Kuurma"
			}
	}];
	console.log(songs[2].artist);
}:*/


/*
 * This function draws arectangle according to coordinates and sizes given by the user.
 */


var drawRect = function() {
	var canvas = document.getElementsByTagName("canvas")[0];
	canvas.width = canvas.width;
	var context = canvas.getContext("2d");
		
	x = document.getElementById("x").value;
	y = document.getElementById("y").value;
	width = document.getElementById("width").value;
	height = document.getElementById("height").value;
	
	context.beginPath();
	
	context.rect(x, y, width, height);
	context.stroke();
	
	
	context.beginPath();
	
	context.moveTo(25,25);	
	context.quadraticCurveTo(25,25,25,62.5);
	context.quadraticCurveTo(25,100,50,100);
	context.quadraticCurveTo(75,100,75,62.5);
	context.quadraticCurveTo(75,62.5,75,25);
	context.quadraticCurveTo(68.5,6.25,50,6.25);
	context.quadraticCurveTo(30,6.25,25,25);
	context.stroke();
	
}

var doLoop = true;
if (doLoop) {
	var i = 0;
	do
		{
		console.log(1);
		i++;
		}
	while (i<3)
}	
	var object = false;
	if	(object) {
			var pupil1 = {
					firstName: "marten",
					lastName: "kähr",
					email: "asd@hotmail.com"
			};
			
			var pupil2 = {
					firstName: "arnold",
					lastName: "tšerepov",
					email: "a@t.ee"
			};	
		
		/*	car Pupils = {
				pupils: [pupil1, pupil2],
				insertPupil: function(firstName, lastName, email) {
					pupil = {
							firstName: firstName,
							lastName: lastName,
							email: email
					};
					pupils.push(pupil);
				}
			}
			
		var pupil = new Pupil();
		pupil.insertPupil("raiko", "heinla", "r@h.ee");
		console.log(pupil.pupils[0].firstName);*/
			
		console.log(pupil1.lastName + ", e-mail" + pupil1.email)
		
		var subject1 = {
				name: "Veebirakenduste loomise alused",
				eap: 5
		};   
		
		var learning = {
				beginning: "20151023",
				place: "31",
				subject: subject1,
				pupils: [pupil1, pupil2]
		};
		
		for (var pupil in learning.pupils) {
			console.log(learning.pupils[pupil].firstName);
		}
		console.log(learning.place);
	}	
	
///////////////////////////////////////////////////////////////
//////langes(2) tulest(1) külmast(0) leek(4) pime(3)///////////
///////////////////////////////////////////////////////////////	
	var splitting = true;
	if (splitting) {
		var string = "mysql databases -h localhost -u databases -p < [faili nimi].sql";
		console.log(string.split(" "));

		/**
		 * This function rearranges the words in a string according to the given new
		 * order.
		 */
		var rearrange = function(parameters) {
			var arrayOfOrigin = parameters['origin'].split(" ");
			var arrayOfResult = new Array();
			for (var id = 0; id < parameters['newOrder'].length; id++) {
				arrayOfResult.push(arrayOfOrigin[parameters["newOrder"][id]]);
			}
			console.log(arrayOfResult.join(" "));
		}

		rearrange({
			'origin' : 'külmast tulest langes pime leek',
			'newOrder' : [ 2, 1, 0, 4, 3 ]
		});

	}
	
////////////////////////////////////////////////
////// Random Number ///////////////////////////
////////////////////////////////////////////////
	/**
	 * This function sets or returns a random number.
	 */
	function getRandomIntInclusive(parameters) {
		return Math.floor(Math.random() * (parameters.max - parameters.min + 1))
				+ parameters.min;
	}

	/**
	 * This function sets the value to a global variable.
	 */
	function setGlobal(parameters) {
		window[parameters.name] = parameters.value;
	}

	/**
	 * This function sets the background to the page.
	 */
	var setBackground = function(parameters) {
		var randomNumber = getRandomIntInclusive({
			min : 0,
			max : 255
		});

		if (parameters.appWide) {
			setGlobal({
				'name' : "randomNumber",
				value : randomNumber
			});
			document.body.style.backgroundColor = "rgb(" + window.randomNumber
					+ ", " + window.randomNumber + ", " + window.randomNumber + ")";
		} else {
			document.body.style.backgroundColor = "rgb(" + randomNumber + ", "
					+ randomNumber + ", " + randomNumber + ")";
		}
	}
	
	