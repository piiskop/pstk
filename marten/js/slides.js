/**
 * 
 */
var timer;
var count = 0;
var imagesSource = ["./images/meme1.jpg","./images/meme2.jpg","./images/meme3.jpg",
                    "./images/meme4.jpg","./images/meme5.jpeg","./images/meme6.jpg",
                    "./images/meme7.jpg","./images/meme8.jpeg","./images/meme9.jpg",
                    "./images/meme10.jpg"];
var imagesAlt = ["Image one","Image two","Image three","Image four","Image five",
                 "Image six","Image seven","Image eight","Image nine","Image ten"]
var getRandomIntInclusive = function(min,max) {
	return Math.floor(Math.random() * (max - min + 1))
			+ min;
}
var display = function(index,begin) {
	var img = document.createElement("img");
	img.src = imagesSource[index];
	img.alt = imagesAlt[index];
	img.id = "imageCurrent";
	if (begin == false) { 
		document.getElementById("imageContainer").removeChild(document.getElementById("imageCurrent"));
	}
	document.getElementById("imageContainer").appendChild(img);
	document.getElementById("textContainer").innerHTML = imagesAlt[index];
}
var randomImage = function() {
	r = getRandomIntInclusive(0,10);
	display(r,false);
	count = r;
}

var next = function() {
	count++;
	if (count == 0 || count == imagesSource.length || count > imagesSource.length) {
		count = 0;
		display(0,false);
	}
	else{
		display(count,false);
	}
}
var play = function (){
	timer = setTimeout(function(){
		next();
		play();
	}, 1200)
}
var stop = function (){
	clearTimeout(timer);
}