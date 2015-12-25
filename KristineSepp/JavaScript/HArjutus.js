/**
 * 
 */

var a = 0;
var b = 0;

a = b++;

console.log(a + "," + b);



var user = new Object()

user.name = 'John'

user.name = 'Serge'

var menu = {
	width : "200",
	height : "300",
	title : "My menu"
}
/**
 * function to check for numericality
 * 
 * @author Kristine <Kristinesepp@gmail.com>
 * @param n
 *            input value
 * @returns boolean Is it a numeric value?
 */

function isNumeric(n) {
	return !isNaN(parseFloat(n)) && isFinite(n)
}
/**
 * function which multiplies all numeric properties by 2
 * 
 * @author Kristine <Kristinesepp@gmail.com>
 * @param Object
 *            object the object
 */

function multiplyNumeric(object) {
	for ( var property in object) {
		var val = object[property];
		if (isNumeric(val)) {
			object[property] = val * 2;
		}

	}
}

multiplyNumeric(menu)
console.log("menu width=" + menu.width + " height=" + menu.height + " title="
		+ menu.title)

function Summator() {

	/**
	 * Function which returns a sum of two values
	 * 
	 * @author Kristine <Kristinesepp@gmail.com>
	 * @return float returns a floating point number
	 * @param string |
	 *            number a first summand
	 * @param string |
	 *            number b second summand
	 */

	this.sum = function(a, b) {

		return parseFloat(a) + parseFloat(b)
	};
	/**
	 * function which prompts for two values and alerts their sum
	 * 
	 * @author Kristine <Kristinesepp@gmail.com>
	 */
	this.run = function() {
		a = document.getElementById('form1').value
		b = document.getElementById('form2').value
		document.getElementById('liitmine').innerHTML = this.sum(a, b);
	};
}
/**
 * object ladder with chainable calls
 * @author Kristine <Kristinesepp@gmail.com>
 */

var ladder = {
	step : 0,
	up : function() {
		this.step++
		return this
	},
	down : function() {
		this.step--
		return this
	},
	showStep : function() {
		alert(this.step)
	}
}

ladder.up().showStep()

/**
 * 
 */

function Animal(name) {
	this.name = name
	this.canWalk = true
	return this
}

var animal = Animal("beastie")

alert(animal.name)

function User(name) {
	this.name = name

	this.sayHi = function() {
		alert(" I am " + this.name)
	};
}

/**
 * 
 */

var john = new User("John")
var peter = new User("Peter")

john.sayHi()
peter.sayHi()

var number= new Number(123.);
console.log(number.toFixed(2));

/**
 * replacing and extracting values from array
 * @author Kristine <Kristinesepp@gmail.com>
 */

var styles = ['Jazz', 'Blues']
styles.push("Rock'n'roll")
styles[styles.length-2] = "Classic"


alert( styles.pop() )  

/**
 *  code to alert a random value from array arr
 * @author Kristine <Kristinesepp@gmail.com>
 */

var arr = ["Plum","Orange","Donkey","Carrot","JavaScript"]
var min = 0
var max = arr.length-1
var rand = min + Math.floor(Math.random()*(max+1-min))


alert(arr[rand])

/**
 * @author Kristine <Kristinesepp@gmail.com>
 * a function which finds a value in array
 * @param array 
 * @param value
 * @returns {Number} returns its(value in array) index, or -1 if not found
 */

function find(array, value){
for(var i=0; i<fruits.length; i++) {
if(array[i] == value) return i;
}
	return -1;
}

/**
 * 
 */
function filterNumeric(){
	
}





