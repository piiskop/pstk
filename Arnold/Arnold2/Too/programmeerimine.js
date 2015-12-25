/**
 * puplis raw data
 */
var pupils = [ {
	name : "kaire"
}, {
	name : "raiko"
}, {
	name : "eleri"

}, {
	name : "sander"
}, {
	name : "erika"
}, {
	name : "kristen"
}, {
	name : "ralf"
}, {
	name : "zenja"
} ];
pupils.sort(function(a, b) {
	return a.name.localeCompare(b.name);
});

/**
 * Binary search
 */

//var target = 1;
//
//var binarySearch = function(pupils, target) {
//
//	var middleIndex, middle, result = 'nothing';
//
//	while (pupils.length > 0) {
//
//		var middleIndex = Math.floor(pupils.length / 2);
//
//		console.log('1middle', middleIndex);
//
//		var middle = pupils[middleIndex];
//
//		if (middle === target) {
//			result = target;
//			break;
//		}
//
//		if (middle > target) {
//			pupils = pupils.slice(0, middleIndex);
//		} else {
//			pupils = pupils.slice(middleIndex + 1);
//		}
//
//	}
//	return result;
//
//}
//
//result = binarySearch(pupils, target);
//
//console.log(pupils);
//console.log(target + ' ' + result);

// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
for (i = 0; i < pupils.length; i++) {
	var middleIndex = Math.floor(pupils.length / 2);

	if (middle === target) {
		result = target;
		break;
	}

	if (middle > target) {
		pupils = pupils.slice(0, middleIndex);
	} else {
		pupils = pupils.slice(middleIndex + 1);
	}

};

/*
 * ///////////////////////////////////////////BINARY SEARCH/////////////////////////////////////////////////////////////////////////
 */

/*function BinarySearch(t, A) // t - искомый элемент,
{ // A - упорядоченный массив, в котором ищем.
	var i = 0, j = A.length, k;

	while (i < j) {
		k = Math.floor((i + j) / 2);
		if (t <= A[k])
			j = k;
		else
			i = k + 1;
	}

	if (A[i] === t)
		return i; // На выходе индекс искомого элемента.
	else
		return -1; // Если искомого элемента нет в массиве, то -1.
}*/

/*
 * /////////////////////////////////////////BINARY SEARCH
 * EXAMPLE/////////////////////////////////////////////////////////////////////////////////
 */

/*var items = [ "a", "b", "c", "d", "e", "f", "g", "h", "i", "j" ];
console.log("5666:" + binarySearch(items, "i")); // 8
alert(binarySearch(items, "b")); // 1*/

// //////////////////////////////////////////////////////////TRY/////////////////////////////////////////////////////////////////
/*
 * function myFunction() { var x = document.getElementById("myCheck"); x.checked =
 * true; }
 * 
 * var elName = element.name; var elValue = element.value;
 * 
 * if (elName === "option") { document.getElementById('question1').className =
 * 'Hide'; if (elValue === "checked") {
 * document.getElementById('question2').className = 'Show';
 * 
 *  } else { document.getElementById('question3').className = 'Show';
 * 
 *  } }
 * 
 * if (elName === "option1") { document.getElementById('question2').className =
 * 'Hide'; if (elValue === "checked") { console.log("Eviction");
 * document.getElementById("decision").innerHTML = "Eviction"; } else {
 * console.log("No eviction"); document.getElementById("decision").innerHTML =
 * "No eviction"; } }
 * 
 * if (elName === "option2") { document.getElementById('question3').className =
 * 'Hide'; if (elValue === "ei") { console.log("Eviction");
 * document.getElementById("decision").innerHTML = "Eviction"; } else {
 * document.getElementById('question2').className = 'Show'; } }
 * 
 * console.log(elName, elValue); }
 * 
 * function resetCalculation() { document.getElementById("question1").className =
 * "Show"; document.getElementById("question2").className = "Hide";
 * document.getElementById("question3").className = "Hide"; }
 */

// ////////////////////////////////////////////////////////////////////////////////////////////////////
/*
 * function down() /*spisok { var a = document.getElementById('dropdown'); if (
 * a.style.display == 'none' ) a.style.display = 'block' else if (
 * a.style.display == 'block' ) a.style.display = 'none'; };
 */




/*var patients = [
                "kaire",
                "raiko",
                "eleri",
                "sander",
                "erika",
                "kristen",
                "ralf",
                "zenja"
                ];

            var input = "ka";
            var re = new RegExp(input+'.+$', 'i');
            patients = patients.filter(function(e, i, a){
                return e.search(re) != -1;
            });
            console.log(patients);*/
///////////////////////////////////////////////////////////////////////////////////////////////////////
           /* function showList() {
                var x = document.getElementById("showList").innerHTML;
                document.getElementById("studentList").innerHTML = x;
            }*/
            
            
///////////////////////////////////////////////////////////////////////////////////////////////////
           /* var display = function() {
            	var studentList = document.getElementById('studentList');
            	if (studentList.style.display == "table") {
            		studentList.style.display = "none";
            		document.getElementById('displayButton').innerHTML = "Kuvan kogu nimekirja.";
            	} 
            	else {
            		studentList.style.display = "table";
            		document.getElementById('displayButton').innerHTML = "Peidan nimekirja.";
            		create();
            	}
            }
            var create = function() {
            	document.getElementById("studentList").innerHTML = "";
            	for (var i=0; i<pupils.length; i++) {
            		var table = document.getElementById("studentList");
            		var row = table.insertRow(i);
            		var cell1 = row.insertCell(0);
            		cell1.id = ("cellA" + i);
            		cell1.innerHTML = pupils[i]["lastName"];
            		var cell2 = row.insertCell(1);
            		cell2.id = ("cellB" + i);
            		if (pupils[i]["progSkill"] === true) {
            			cell2.style.backgroundColor = "green";
            			document.getElementById("checkBox").checked = true;
            		}
            		else if (pupils[i]["progSkill"] === false) {
            			cell2.style.backgroundColor = "red";
            			document.getElementById("checkBox").checked = false;
            		}
            	}
            }*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



/**
 * Performs binary search of pupils array for inserted last name and counts the steps taken to find it.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
var search = function() {
	var student = document.getElementById('student');
	var lastName = document.getElementById("searchBox").value;
	var min = 0;
	var max = pupils.length - 1;
	guesstimes = 0;
	while (min <= max) {
		guesstimes++;
		guess = Math.floor((min + max) / 2);
		if (pupils[guess]["lastName"] === lastName) {
			student.style.display = "block";
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
	document.getElementById("steps").innerHTML = ("Korduste arv: " + guesstimes);
	document.getElementById("changeState").innerHTML = "";
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Creates a table of the students' last names and their programming skills.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
var create = function() {
	document.getElementById("studentList").innerHTML = "";
	for (var i=0; i<pupils.length; i++) {
		var table = document.getElementById("studentList");
		var row = table.insertRow(i);
		var cell1 = row.insertCell(0);
		cell1.id = ("cellA" + i);
		cell1.innerHTML = pupils[i]["lastName"];
		var cell2 = row.insertCell(1);
		cell2.id = ("cellB" + i);
		if (pupils[i]["progSkill"] === true) {
			cell2.style.backgroundColor = "green";
			document.getElementById("checkBox").checked = true;
		}
		else if (pupils[i]["progSkill"] === false) {
			cell2.style.backgroundColor = "red";
			document.getElementById("checkBox").checked = false;
		}
	}
}

/**
 * Displays or hides the created students list.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
var display = function() {
	var studentList = document.getElementById('studentList');
	if (studentList.style.display == "table") {
		studentList.style.display = "none";
		document.getElementById('displayButton').innerHTML = "Kuvan kogu nimekirja.";
	} 
	else {
		studentList.style.display = "table";
		document.getElementById('displayButton').innerHTML = "Peidan nimekirja.";
		create();
	}
}

/**
 * Changes the background color of the programming skills cell to green if checkbox is checked and changes the persons last name if modified.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 */
var save = function() {
	var checkBox = document.getElementById("checkBox");
	var searchBox = document.getElementById("searchBox");
	if (checkBox.checked === true && searchBox.value !== "") {
		pupils[guess] =	{
				progSkill: true
		}
		document.getElementById("cellB" + guess).style.backgroundColor = "green";
		checkBox.checked = true;
	}
	else if (checkBox.checked === false && searchBox.value !== "") {
		pupils[guess] =	{
				progSkill: false
		}
		document.getElementById("cellB" + guess).style.backgroundColor = "red";
		checkBox.checked = false;
	}
	if (searchBox.value !== pupils[guess]["lastName"] && searchBox.value !== "") {
		pupils[guess]["lastName"] = searchBox.value;
		document.getElementById("changeState").innerHTML = "Õpilase " + pupils[guess]["lastName"] + " andmed muudetud.";
		create();
	}
}