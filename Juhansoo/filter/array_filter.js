/**
 * 
 */
var arr = ["a", -1, 2, "b"]

function isNumeric(arr) {
	var arr2 = []
	for(var i=0; i<arr.length; i++) {
		if (!isNaN(arr[i])) {
			arr2.push(arr[i])
		}
	}
	return arr2;
}

/**
 * Annab automaatselt sisendmuutujatele pärast väärtused
 */
function filter(arr, callback) {
	return callback(arr);
}

arr = filter(arr, isNumeric);

console.log(arr);