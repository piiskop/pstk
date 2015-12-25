/**
 * 
 */
number = "1";
string = "Javascript";
bla = "bla";

var concatenation = false;
if (concatenation)
	{
	part1 = "Javascript ";
	part2 = "on ";
	part3 = "huvitav";
	sentence1 = part1 + part2 + part3;
	sentence2 = "Javascript " + "on " + "huvitav";
	console.log("14: " + sentence1);
	}

var confirmation = false;
if (confirmation)
{
	if (confirm("Kas soovid jätkata?"))
	{
		console.log("yes");
	}
	else
	{
		console.log("no");
	}
}

var prompting = false;
if (prompting)
{
	var entry = prompt("What exactly do I want to learn about JS?");
	document.write(entry.length);
}

var array = false;
if (array) {
	var numbers = new Array();
	numbers[0] = 1;
	numbers[1] = 2;
	
	var numbers2 = [1, 2];
	console.log("46: " + numbers[1] + ", " + numbers2[0]);
	
	var occurenceOfWords = [ {
			"word" : "gentle",
			"occurence" : 4
		},
		{
			"word" : "light",
			"occurence" : 4
		},
		{
			"word" : "range",
			"occurence" : 8
		},
		{
			"word" : "men",
			"occurence" : 4
		},
		{
			"word" : "dying",
			"occurence" : 4
		} ]
	console.log("70: " + occurenceOfWords[3].word);
}

// Loops

var whileLoop = false;
if (whileLoop) {
	var i = 0;
	while (i < 3)
	{
		console.log("76: " + i);
		i++;
	}
}

var doLoop = false;
if (doLoop) {
	var i = 0;
	do
	{
		console.log("88: " + i);
		i++;
	}
	while (i < 3)
}

var forLoop = false;
if (forLoop) {
	for (var i = 0; i < 3; i++) {
		console.log("97: " + i)
	}
}

var object = false;
if (object) {
	var pupil1 = {
			firstName: "marten",
			lastName: "kähr",
			email: "m@k.ee"
	};
	var pupil2 = {
			firstName: "arnold",
			lastName: "tšerepov",
			email: "a@t.ee"
	};
//	var pupils = {
//		pupils: [pupil1, pupil2],
//		insertPupil: function(firstName, lastName, email) {
//			var pupil = {
//				firstName: firstName,
//				lastName: lastName,
//				email: email
//			};
//			pupils.push(pupil);
//		}
//	}
//	var pupil = new Pupil();
//	pupil.insertPupil("raiko", "heinla", "r@h.ee");
//	console.log("126: " + pupil.pupils[0].firstName)
	console.log("113: last name: " + pupil1.lastName + ", email: " + pupil1.email)
	
	var subject1 = {
		name: "Veebirakenduste loomise alused",
		eap: 5
	};
	var learning1 = {
		beginning: "20151023",
		place: "31",
		subject: subject1,
		pupils: [pupil1, pupil2]
	};
	for (var pupil in learning1.pupils) {
		console.log("124: " + learning1.pupils[pupil].firstName)
	}
}

var deleteVariable = false;
if (deleteVariable) {
	var i = 2;
	delete i;
	console.log("148: " + i)
}

var splitting = false;
if (splitting) {
	var string1 = "külmast tulest langes pime leek";
	var string2 = string1.split(" ");
	console.log("155: " + string2[2] + " " + string2[1] + " " + string2[0] + " " + string2[4] + " " + string2[3])
}

//var rearrange = false
//if (rearrange) {
//		'origin': 'külmast tulest langes pime leek',
//		'newOrder': [2, 1, 0, 4, 3]
//	});
//}

var scope = true;
if (scope) {
	var b = 2;
	var a = function () {
		var c = 4;
		console.log("163: " + c);
	}
	console.log("165: " + b);
	a();
	console.log("166: " + c);
}