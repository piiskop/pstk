/**
 * 
 */
var user = {};
user.name = "John";
user.name = "Serge";
delete user.name;
// ////////////////////////////////////////////////////////////////////////////////////////////////////
var menu = {

	width : "200",

	height : "300",

	title : "My menu"

}
function multiplyNumeric(obj) {
	for ( var property in obj) {
		var value = obj[property]
		if (isNumeric(value)) {
			obj[property] *= 2;
		}
	}
}
multiplyNumeric(menu)
console.log("3:" + menu.toSource());

function isNumeric(n) {
	return !isNaN(parseFloat(n)) && isFinite(n)
}
// //////////////////////////////////////////////Properties and
// methods//////////////////////////////////////////////////////////////////////////
// function Summator(){
// this.sum=function(a,b){
// return parseFloat(a)+ parseFloat(b);
// },
// this.run=function(){
// var first=document.getElementById("first").value;
// var second=document.getElementById("second").value;
// var summa=(this.sum(+first,+second));
// document.getElementById("result").innerHTML="";
// var sumText=document.createTextNode(summa);
// document.getElementById("result").appendChild(sumText);
//			
// console.log(this.sum(+first,+second));
// }
//	 
// }
// var summator = new Summator().run();
// ////////////////////////////////////////////>>>>>>>objects.html<<<<<<</////////////////////////////////////////////////////////////////////////////////////
// ////////////////////////////////Creating
// objects////////////////////////////////////////////////////////////////////////////////////////////////
// var user = {};

// user.name = "John";
// ser.name = "Serge";
// delete user.name;

// ///////////////////////////////////////////////////////////////////////////////////////////

// var obj = {}

// var value = obj.nonexistant;
// alert(value);
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var styles = [ "Jazz", "Blues" ]
styles.push("Rock'n'Roll"); // or: styles[styles.length] = "Rock'n'Roll"

styles[styles.length - 2] = "Classic";

alert(styles.pop())
///////////////////////////////////////Methods shift/unshift///////////////////////////////////////
var arr = ["Plum","Orange","Donkey","Carrot","JavaScript"]
var min=0;
var max=arr.length-1;
var rand = min + Math.floor(Math.random()*(max+1-min))
	//var rand = Math.floor(Math.random()*arr.length)
	console.log(arr[rand])
	
//////////////////////////////////Iterating over array/////////////////////////////////////////////////
function find(array, value) { 
for(var i=0; i<array.length; i++) {
if (array[i] == value) return i;

}
return -1;
}