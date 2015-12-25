/**
 * 
 */
var pics=[{
		"nimi":"Kiisu riidetükkiga",
		"url":"408287.jpg"		
},
{"nimi":"Uhke kiisu",
"url":"200287.jpg"}
];

id=0;
length=pics.length;

var getDimensions = function() {
	var height = 0;
	var width = 0;
	for (slide in pics) {
		var image = new Image();
		image.onload = function() {
			if (this.height > height) {
				height = this.height;
			}
			if (this.width > width) {
				width = this.width;
			}
			var containerForImage = document.getElementById("image");
			containerForImage.style.height = height + "px";
			containerForImage.style.width = width + "px";
		};
		image.src = pics[slide].url;
	}
};

var moveLeft=function(){
	if(id>0){
	id=id-1;
	}
	else{
		id=0;
		}
	var img=document.getElementById("image");
	var txt=document.getElementById("text");
	img.innerHTML=pics[id].url;
	txt.innerHTML=pics[id].nimi;
};

var moveRight=function(){
	console.log(length);
	console.log(id);
	if(id==length-1)
		id=0;
	else{
		id=id+1;
	}
	
	var img=document.getElementById("image");
	var txt=document.getElementById("text");
	setBackgoundImage(id);
	txt.innerHTML=pics[id].nimi;
};

var setBackgoundImage=function(id){
	var img = document.getElementById("image");
	var a=pics[id].url;
	img.style.backgroundImage="url( "+a+")";
}