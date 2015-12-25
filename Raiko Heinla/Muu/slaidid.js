/**
 * Javascript file for slideshow
 */

/*
 * List of images
 */

var currentSlide = 0;

var slides = [
		{
		   	name: "client-1.jpg",
		  	text: "First client"
	    },
	    {
		   	name: "client-2.jpg",
		   	text: "Second client"
	    },
	    {
		   	name: "client-3.jpg",
		   	text: "Third client"
	    },
	    {
		   	name: "client-4.jpg",
		   	text: "Fourth client"
	    }];



var setContent = function() {
	document.getElementById("category").innerHTML = categories[slides[currentSlide].category].name;
	var image = document.getElementById("image");
	image.style.backgroundImage = "url('../images/" + slides[currentSlide].name
			+ "')";
	document.getElementById("caption").innerHTML = slides[currentSlide].text;
}




/*
 * Function to switch slides
 */

var nextSlide = function(toRight){
	if (toRight) {
		currentSlide++;
		if (currentSlide === slides.length){
			currentSlide = 0;
		}
	}
	else {
		currentSlide--;
		if (currentSlide === -1){
			currentSlide = (slides.length -1)
		}
	}
	var image = document.getElementById("image");
	image.style.backgroundImage = "url('../psd-to-html/Images/" + slides[currentSlide].name + "')";
	document.getElementById("description").innerHTML = slides[currentSlide].text;
};


/*
 * Generates a random number
 */
function getRandomIntInclusive(parameters) {
	return Math.floor(Math.random() * (parameters.max - parameters.min + 1))
			+ parameters.min;
}


/*
 * Randomly switch slides
 */
var moveRandom = function(){
	currentSlide = getRandomIntInclusive({
		min : 0,
		max : slides.length -1
	})
	var image = document.getElementById("image");
	image.style.backgroundImage = "url('../psd-to-html/Images/" + slides[currentSlide].name + "')";
	document.getElementById("description").innerHTML = slides[currentSlide].text;
};

/*
 * Set background size
 */
var setDimensions = function() {
	var height = 0;
	var width = 0;
	for (slide in slides) {
		var image = new Image();		
		image.onload = function(){	
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
image.src = "../psd-to-html/Images/" + slides[slide].name;
}};

/*
 * Function to make slides change after certain intervals
 */

var startShow = function(){
	time = setTimeout(function(){
		moveRandom();
		startShow();
	},
	2000);
};

/*
 * Funtion to stop automatic slide changes
 */
var stopShow = function(){
	clearTimeout(time);
}