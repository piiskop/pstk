<!-- BEGIN js -->
/**
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @var the raw data of pupils
 */
var pupils = [ {
	name : "kaire",
	lastName: "ojastu"
}, {
	name : "raiko",
	lastName: "oja"
}, {
	name : "kristine",
	lastName: "linnaosa"
}, {
	name : "eleri",
	lastName: "apsoloin"
}, {
	name : "sander",
	lastName: "mets"
}, {
	name : "erika",
	lastName: "tänav"
}, {
	name : "kristen",
	lastName: "rist"
}, {
	name : "rasmus",
	lastName: "teearu"
}, {
	name : "lilian",
	lastName: "tikk"
}, {
	name : "marten",
	lastName: "kähr"
}, {
	name : "alar",
	lastName: "hein"
}, {
	name : "rasmus",
	lastName: "juhansoo"
}, {
	name : "juhan",
	lastName: "täkk"
}, {
	name : "arnold",
	lastName: "rüütel"
}, {
	name : "keijo",
	lastName: "lusti"
}, {
	name : "ingmar",
	lastName: "nurmiste"
}, {
	name : "ralf",
	lastName: "laud"
}, {
	name : "ženja",
	lastName: "fokin"
} ];
pupils.sort(function(a, b) {
	return a.name.localeCompare(b.name);
});
document.getElementById("buttonForSearchInJs").onclick = displaySearchResult;
document.getElementById("buttonForSearchInPhp").onclick = function () {
	window.location.href = '{BEGINNING-OF-URL}?name=' + document.getElementById("name").value;
};
/**
 * This function finds the position of an object in the given array according to
 * the value of an object's property using binary search.
 * 
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @param Array
 *            parameters.array the array that contains objects
 * @param string
 *            parameters.property the property
 * @param string
 *            parameters.value the value
 * @returns int the number of iterations
 */
function findPositionAsBinary(parameters) {
	var numberOfIterations = 0;
	position = -1;
	var lastIndex = parameters.array.length - 1;
	console.log(" 80: sisend: " + parameters.value + ", reastuses: " + parameters.array[lastIndex][parameters.property]);
	if (parameters.value === parameters.array[lastIndex][parameters.property]) {
		position = lastIndex;
		return numberOfIterations;
	}
	for (var currentPlace = Math.floor(lastIndex / 2), beginning = 0, end = lastIndex; (currentPlace > -1)
			|| (currentPlace < parameters.array.length);) {
		numberOfIterations++;
		console.log(" 64: " + currentPlace); // 8
		if (parameters.value === parameters.array[currentPlace][parameters.property]) {
			position = currentPlace;
			break;

		} else if (parameters.value
				.localeCompare(parameters.array[currentPlace][parameters.property]) > 0) {
			if (beginning === currentPlace) {
				break;
			}
			beginning = currentPlace; // 8 12 14 15 16
			var distance = end - beginning; // 9 5 3 2 1

			currentPlace += Math.floor(distance / 2); // 12 14 15 16
			console.log(" 69: currentPlace: " + currentPlace);
		} else if (parameters.value
				.localeCompare(parameters.array[currentPlace][parameters.property]) < 0) {
			end = currentPlace; // 8 6
			var distance = end - beginning; // 2
			if (distance < 1) {
				break;
			}
			currentPlace = beginning + Math.floor((distance) / 2); // 5
			console.log(" 76: currentPlace: " + currentPlace);
		}
	}
	return numberOfIterations;
}
/**
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @var the position of the current pupil
 */
var position = {POSITION};
/**
 * This function displays the search result.
 * 
 * @author kalmer:piiskop <pandeero@gmail.com>
 */
function displaySearchResult() {
	var numberOfIterations = findPositionAsBinary({
		array : pupils,
		property : "name",
		value : document.getElementById("name").value
	});
	if (position > -1) {
		document.getElementById("result").style.display = "block";
		document.getElementById("noResult").style.display = "none";
		document.getElementById("canProgram").checked = pupils[position].canProgram;
	} else {
		document.getElementById("result").style.display = "none";
		document.getElementById("noResult").style.display = "block";
	}
	document.getElementById("numberOfIterations").innerHTML = numberOfIterations;
	document.getElementById("blockForNumberOfIterations").style.display = "block";
}

/**
 * This function checks if all the needed parameters are set.
 * 
 * @author Kalmer Piiskop
 * @param parameters
 *            the parameters
 * @returns {Boolean} Are they set?
 */
function areParametersSet(parameters) {
	console.log(" 740 ");
	if (!parameters.fieldForInfo) {
		console.log(" 743 ");
		console.error(document.getElementById("missingInfoField").innerHTML);

		return false;
	} else if (!document.getElementById(parameters.fieldForInfo)) {
		console.log(" 750: " + parameters.fieldForInfo);
		console
				.error(document.getElementById("missingInfoFieldElement").innerHTML);

		return false;
	}
	console.log(" 753 ");
	for (parameter in parameters.parametersToCheck) {
		console.log(" 701: " + parameter);
		// console.log(" 703: "+parameters.parametersToCheck[parameter].fields);
		if (!parameters.parametersToCheck[parameter]) {
			console.log(" 761: " + parameters.fieldForInfo);
			document.getElementById(parameters.fieldForInfo).innerHTML += (document
					.getElementById("missingParameter").innerHTML
					+ ": \"" + parameter + "\"");

			return false;
		} else if (typeof parameters.parametersToCheck[parameter].fields != "undefined") {
			console.log(" 711 ");
			for (field in parameters.parametersToCheck[parameter].fields) {

				if ((typeof parameters.parametersToCheck[parameter].fields[field] == 'object')
						&& !document
								.getElementById(parameters.parametersToCheck[parameter].fields[field].id)) {
					console
							.log(" 718: "
									+ parameters.parametersToCheck[parameter].fields[field].id
									+ ", " + parameters.fieldForInfo);
					var target = document
							.getElementById(parameters.fieldForInfo);
					target.className += " viga";

					if (("" === target.innerHTML)) {
						target.innerHTML = (document
								.getElementById("missingField").innerHTML
								+ ": \""
								+ parameters.parametersToCheck[parameter].fields[field].id + "\"");
					} else {
						var br = document.createElement("br");

						target.appendChild(br);
						target.innerHTML += (document
								.getElementById("missingField").innerHTML
								+ ": \""
								+ parameters.parametersToCheck[parameter].fields[field].id + "\"");
						;
					}

					return false;
				}

			}

		}

	}

	return true;
}

/**
 * This function adjusts the font size on buttons and in system menu items if
 * the text is too long.
 * 
 * @author Kalmer Piiskop
 * @param span
 *            the <code>SPAN</code> node
 */
function adjustFontSize(span) {
	if (!span) {
		console.error(span);
	}
	if (span.offsetWidth > 0) {
		var fontstep = 0.1;

		if (((span.offsetWidth + 20) > span.parentNode.offsetWidth)
				|| ((span.offsetHeight + 20) > span.parentNode.offsetHeight)) {
			var fontSize = parseInt(span.style.fontSize) - fontstep;
			var textOfFontSize = (fontSize + "%");
			if (span.innerHTML.indexOf("SERVICES") > -1) {
				// console.log(" 2839: "+(span.offsetWidth + 10) + ", " +
				// span.parentNode.offsetWidth + ", " + (span.offsetHeight + 10)
				// + ", " + span.parentNode.offsetHeight);
			}

			span.style.fontSize = textOfFontSize;
			span.parentNode.style.lineHeight = textOfFontSize;
			// document.getElementById(elem).css("font-size",((document.getElementById(elem).css("font-size").substr(0,
			// 2) - fontstep)) + "px").css("line-height",
			// ((document.getElementById(elem).css("font-size").substr(0, 2))) +
			// "px");
			adjustFontSize(span);
		}

	}

}

/**
 * This function shows or hides something.
 * 
 * @author kalmer
 * @param string
 *            parameters.display the value of <code>display</code> in CSS
 * @param string
 *            parameters.fieldForInfo the ID of the field for information
 * @param string
 *            parameters.forHiding the text that we display on the triggerer
 *            button if the target is visible
 * @param string
 *            parameters.forShowing the text that we display on the triggerer
 *            button if the target is invisible
 * @param string
 *            parameters.idOfTriggerer the ID of the triggerer
 * @param string
 *            parameters.idOfTarget the ID of the target
 * @param boolean
 *            parameters.preserveContent Do we preserve the content of the
 *            hidable target?
 * @param boolean
 *            parameters.textLong Is the text on the triggerer long?
 */
function displayOrHide(parameters) {
	var parametersToCheck = {
		fieldForInfo : parameters.fieldForInfo,
		parametersToCheck : {
			display : parameters.display,
			targets : {

				'fields' : []

			}

		}

	};

	if (areParametersSet(parametersToCheck)) {
		var el = document.getElementById(parameters.idOfTarget);

		if (el && (el.style.display == parameters.display)) {

			if (parameters.idOfTriggerer) {

				var parametersToCheck = {
					fieldForInfo : parameters.fieldForInfo,
					parametersToCheck : {
						'forShowing' : parameters.forShowing
					}
				};

				if (areParametersSet(parametersToCheck)) {

					if (parameters.textLong) {
						console.log(" 1197 ");
						document.getElementById(parameters.idOfTriggerer)
								.setAttribute("class",
										"Handle HandleForLongText");
						document.getElementById(parameters.idOfTriggerer).innerHTML = parameters.forShowing;
					} else {
						console.log(" 1203 ");
						document.getElementById(parameters.idOfTriggerer)
								.setAttribute("class",
										"Handle SmallButton HandleForOpening");
						document.getElementById(parameters.idOfTriggerer).innerHTML = "";

						var span = document.createElement("span");
						span.setAttribute("class", "LabelOfButton");
						span.style.fontSize = "100%";
						span.innerHTML = parameters.forShowing;

						document.getElementById(parameters.idOfTriggerer)
								.appendChild(span);
						adjustFontSize(span);
					}

					document.getElementById(parameters.idOfTriggerer).style.border = "none";
					document.getElementById(parameters.idOfTriggerer).style.borderRight = "2px solid #d9ddde";
					document.getElementById(parameters.idOfTriggerer).style.borderBottom = "2px solid #d9ddde";
				}

			}

		} else {
			console.log(" 1244 ");

			if (parameters.functionsToCall
					&& (parameters.functionsToCall.length > 0)) {
				// calling additional functions

				for ( var func in parameters.functionsToCall) {

					if (typeof parameters.functionsToCall[func] == 'string') {
						eval(parameters.functionsToCall[func]);
					}

				}

			}

			if (parameters.hideItself) {
				var buttonObject = document
						.getElementById(parameters.idOfTriggerer);
				console.log(" 1291: " + parameters.idOfTriggerer);
				buttonObject.style.display = "none";
				;
			} else if (parameters.idOfTriggerer) {

				var parametersToCheck = {
					fieldForInfo : parameters.fieldForInfo,
					parametersToCheck : {
						'forHiding' : parameters.forHiding
					}
				};

				if (areParametersSet(parametersToCheck)) {

					if (parameters.textLong) {
						document.getElementById(parameters.idOfTriggerer)
								.setAttribute("class",
										"Handle HandleForLongText");
						document.getElementById(parameters.idOfTriggerer).innerHTML = parameters.forHiding;
					} else {
						document.getElementById(parameters.idOfTriggerer)
								.setAttribute("class",
										"Handle SmallButton HandleForClosing");
						document.getElementById(parameters.idOfTriggerer).innerHTML = "";

						var span = document.createElement("span");
						span.setAttribute("class", "LabelOfButton");
						span.style.fontSize = "100%";
						span.innerHTML = parameters.forHiding;

						document.getElementById(parameters.idOfTriggerer)
								.appendChild(span);
						adjustFontSize(span);
					}

					document.getElementById(parameters.idOfTriggerer).style.border = "none";
					document.getElementById(parameters.idOfTriggerer).style.borderTop = "2px solid #d9ddde";
					document.getElementById(parameters.idOfTriggerer).style.borderLeft = "2px solid #d9ddde";
				}

			}

		}

		if (el) {

			if (el.style.display == parameters.display) {
				el.style.display = "none";

				if (!parameters.preserveContent) {
					el.innerHTML = "";
				}

			} else {

				if (parameters.types) {
					var divs = document.getElementsByTagName("div");

					for (var index = 0; index < divs.length; index++) {

						if (parameters.types instanceof Array) {

							for ( var type in parameters.types) {
								closeOthers(divs, index, parameters.types[type]);
							}

						} else {
							closeOthers(divs, index, parameters.types);
						}

					}

				}

				el.style.display = parameters.display;
				console.log(" 1287 ");

			}

		}
		console.log(" 703 ");

	}
	console.log(" 849 ");
}

/**
 * This function updates the properties of a pupil.
 * 
 * @author kalmer:piiskop <pandeero@gmail.com>
 */
function update() {
	var enteredName = document.getElementById("name").value;
	if (enteredName.length > 0) {
		pupils[position].name = document.getElementById("name").value;

	}
	pupils[position].canProgram = document.getElementById("canProgram").checked;
	document.getElementById("feedback").innerHTML = "Õpilase "
			+ pupils[position].name + " andmed muudetud.";
	if (document.getElementById("allPupils").style.display === "table") {
		displayAll();
	}
	document.getElementById('buttonForSearchInPhp').style.display = 'none';
	makeRequest({
		method: 'POST',
		parameters: '&name='+enteredName + "&" + (pupils[position].canProgram ? "canProgram" : '')
	});
}
/**
 * This function displays the list of pupils.
 * 
 * @author kalmer:piiskop <pandeero@gmail.com>
 */
function displayAll() {
	document.getElementById("tbody").innerHTML = "";
	for ( var pupil in pupils) {
		var row = document.getElementById("tbody").insertRow();
		var cell = row.insertCell();
		var text = document.createTextNode(pupils[pupil].name);
		cell.appendChild(text);
		var cell = row.insertCell();
		if (pupils[pupil].canProgram) {
			cell.style.backgroundColor = "green";
		}
	}
	document.getElementById("numberOfPupils").innerHTML = "Kokku "
			+ pupils.length + " õpilast";
}
/**
 * This function makes a request.
 * 
 * @param string
 *            parameters.method either <code>GET</code> or <code>POST</code>
 */
function makeRequest(parameters) {
	var httpRequest = new XMLHttpRequest();
	httpRequest.ontimeout = function() {
		console.log(" 37: tundub, et liiga kaua võtaks päring aega.");
	}
	httpRequest.addEventListener("load", function(evt) {
		console.log("The transfer is complete.");
		pupils = JSON.parse(httpRequest.responseText);
		console.log(" 506: "+pupils.toSource());
		pupils.sort(function(a, b) {
			return a.name.localeCompare(b.name);
		});

	});
	httpRequest.addEventListener("error", function(evt) {
		console.log("An error occurred while transferring the file.");

	});
	httpRequest.addEventListener("abort", function(evt) {
		console.log("The transfer has been canceled by the user.");

	});
	var address = '{BEGINNING-OF-URL}?target=export';
	httpRequest.open(parameters.method, address, true);
	httpRequest.timeout = 2000;
	var argumentsToBeSent = '';
	if ('POST' === parameters.method) {
		argumentsToBeSent += parameters.parameters + '&target='
				+ document.getElementById('target').value;
		httpRequest.setRequestHeader("Content-Type",
				"application/x-www-form-urlencoded");
	}
	httpRequest.send(argumentsToBeSent);
}
document.getElementById("buttonForSearchWithAjax").onclick = function () {
	makeRequest({
	'method': 'GET'
	});
	displaySearchResult();
};
<!-- END js -->