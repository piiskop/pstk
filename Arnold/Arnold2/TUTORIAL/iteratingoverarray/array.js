/**
 * 
 */
function find(array, value) {
	if (array.indexOf)
		return array.indexOf(value)

	for (var i = 0; i < array.length; i++) {

		if (array[i] === value)
			return i;
	}

	return -1;
}

var arr = [ "a", -1, 2, "b" ];

var index = find(arr, 2);

console.log("THIS:" + index);

// ////////////////////////////////////////////////////////////////////////////
function filterNumeric(arr) {
	var empty = [];
	for (var i = 0; i < arr.length; i++) {
		if (!isNaN(arr[i])) {
			empty.push(arr[i]);

		}
	}
	return empty;
}
var array = [ "a", 1, "b", 2 ];
var answer = filterNumeric(array);
console.log("45:" + answer);

// ///////////////////////////////////////////////////////////////////////////////
var obj = {
	className : 'open menu'
}
function addClass(elem, cls) {
	var apple = elem.className.split(",");
	if (apple.indexOf(cls) === -1) {
		console.log(apple.indexOf(cls));
		apple.push(cls);

	}
	obj.className = apple.join(" ");
}
addClass(obj, 'new'); // obj.className='open menu new'

addClass(obj, 'open'); // no changes (class already exists)

addClass(obj, 'me'); // obj.className='open menu new me'
// alert(obj.className); // "open menu new me"

// ///////////////////////////////////////////////////////////////////////
function camelize(str) {
	var splitting = str.split("-");
	for (var i = 0; i < splitting.length; i++) {
		if (i > 0) {
			var firstLetter = splitting[i].substr(0, 1).toUpperCase();
			var other = splitting[i].substr(1);
			splitting[i] = firstLetter + other;
		}
	}
	return splitting.join("");
}
var a = camelize("background-color");
var b = camelize("list-style-image");
console.log("this:" + a);
console.log("this:" + b);
// //////////////////////////////////Sparse arrays, details of length/////////////////////////////////////////////////////////////////////////
var fruits = []

fruits[1] = 'Peach'

fruits[9] = 'Apple'

//alert(fruits.pop()) // pop 'Apple' (at index 9)

//alert(fruits.length) // pop undefined (at index 8)

/////////////////////////////////////////////////////////////Removing from an array//////////////////////////////////////////////
var obj = {
  className: 'open menu'
}
function removeClass(elem, cls) {

	 var classes=elem.className.split(" ");
	 if(classes.indexOf(cls)>-1){
	 obj.className=classes.splice(classes.indexOf(cls),1).join(" "); 
	 }
	
	 }

  
removeClass(obj, 'open') // obj.className='menu'
removeClass(obj, 'blabla')  // no changes (no class to remove)
 console.log("34:"+ obj.className);