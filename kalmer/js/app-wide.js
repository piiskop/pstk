/**
 * This function sets or returns a random number.
 * 
 * @author kalmer
 * @param int
 *            parameters.min the lower bound
 * @param int
 *            parameters.max the upper bound
 */
function getRandomIntInclusive(parameters) {
	return Math.floor(Math.random() * (parameters.max - parameters.min + 1))
			+ parameters.min;
}

/**
 * This function sets the value to a global variable.
 * 
 * @author kalmer
 * @param string
 *            parameters.name the name of the global variable
 * @param int
 *            the value
 */
function setGlobal(parameters) {
	window[parameters.name] = parameters.value;
}

/**
 * This function sets the background to the page.
 * 
 * @author kalmer
 * @param boolean
 *            parameters.appWide Do we use an app-wide variable? (<code>true</code>)
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
