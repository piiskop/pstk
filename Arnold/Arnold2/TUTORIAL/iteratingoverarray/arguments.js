/**
 * 
 */
var arr = [1, -2, 7, 3]
//alert( Math.max.apply(555, arr));//Math// // dummy '0'/555 context


//factorial(n) = n*factorial(n-1)
var func = function(n) {  
  return n==1 ? 1 : n*arguments.callee(n-1)  
}






 //////Initialization of functions and variables//////////////////

//1. Function declarations are initialized before the code is executed.
//window = { f: function }

//2. Variables are added as window properties.
//window = { f: function, a: undefined, g: undefined }

var a = 5   // <-- var

function f(arg) { alert('f:'+arg) }

var g = function(arg) { alert('g:'+arg) } // <-- var



//////////////////////////////////////////
alert("b" in window) // false, there is no window.b
alert(b) // error, b is not defined

b = 5
///////////////////////////////////////////b = 5 

alert("b" in window) // true, there is window.b = 5


/////////////////////////////////////////////////////////
//window = {a:undefined}
"use strict";//otsib var,kui ei ole siis undefined,kui panid strict!!!kui ei paned siis teistmodi
if ("a" in window) {
    var a = 1
}
alert(a) //The answer is 1


////////////////////////////Blocks do not have scope////////////////////////////////////////////////
var i = 1
{
  i = 5
}
alert(i);


/////////////////////////////////////////////////////////////////////////
for(var i=0; i<5; i++) { }//i=0 kas 0 on vailsem kui 5(i++)jah,kas i=1 on vaiksem kui 5,jah ja etc kui jouab 5<5 ei ole vaiksem,ja i=5.

alert(i) // 5, variable survives and keeps value




//////////////////////////////////////Closures//////////////////////////////////////////////////
