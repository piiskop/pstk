var setBackgroundColor=function(){
var max=0xFF;
var min=0*00;
window.randomNumber=Math.floor(Math.random() * (max - min)) + min;
document.body.style.backgroundColor = "#"+window.randomNumber;
}
