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
function multiplyNumeric(obj){
	for(var property in obj){
		var value=obj[property]
		if(isNumeric(value)){
			obj[property]*=2;
		}
	}
}
multiplyNumeric(menu)
console.log("3:" + menu.toSource());

function isNumeric(n) {
	return !isNaN(parseFloat(n)) && isFinite(n)
}
////////////////////////////////////////////////Properties and methods//////////////////////////////////////////////////////////////////////////
var summator={
	 sum:function(a,b){
return parseFloat(a)+ parseFloat(b);
	 },
	  run:function(){
			 var first=document.getElementById("first").value;
			var second=document.getElementById("second").value;
			var summa=(this.sum(+first,+second));
			document.getElementById("result").innerHTML="";
			var sumText=document.createTextNode(summa);
			document.getElementById("result").appendChild(sumText);
			
			 console.log(this.sum(+first,+second));
	 }
	 
}
summator.run();
//////////////////////////////////////////////>>>>>>>objects.html<<<<<<</////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////Creating objects////////////////////////////////////////////////////////////////////////////////////////////////
//var user = {};

	//user.name = "John";
	//ser.name = "Serge";
	//delete user.name;
	
/////////////////////////////////////////////////////////////////////////////////////////////

var obj = {}
	 
	var value = obj.nonexistant;
	alert(value);


















