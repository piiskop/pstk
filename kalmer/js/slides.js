"use strict";
/**
 * @author kalmer
 * @var string[string][int] the array of categories
 */
var categories = [ {
	name : "Lause"
}, {
	name : "Tennis"
} ];

/**
 * @author kalmer
 * @var string[string][int] the array of slides
 */
var slides = [ {
	name : "sentence_1.png",
	text : "Esimene lause",
	category : 0
}, {
	name : "sentence_2.png",
	text : "Teine lause",
	category : 0
}, {
	name : "sentence_3.png",
	text : "Kolmas lause",
	category : 0
}, {
	name : "sentence_4.png",
	text : "Neljas lause",
	category : 0
}, {
	name : "Worst_Tennis_Player_lg.jpg",
	text : "Kohtuniku ees olev tennisemängija",
	category : 1
} ];

/**
 * @author kalmer
 * @var int the index of the current slide
 */
var currentSlide = 0;

/**
 * This function sets the contents.
 * 
 * @author kalmer
 */
var setContent = function() {
	document.getElementById("category").innerHTML = categories[slides[currentSlide].category].name;
	var image = document.getElementById("image");
	image.style.backgroundImage = "url('../images/" + slides[currentSlide].name
			+ "')";
	document.getElementById("caption").innerHTML = slides[currentSlide].text;
}

/**
 * This function changes the slides by step one.
 * 
 * @author kalmer
 * @param boolean
 *            Do we step to the right?
 */
var move = function(toRight) {
	if (toRight) {
		currentSlide++;
		if (currentSlide === slides.length) {
			currentSlide = 0;
		}
	} else {
		currentSlide--;
		if (currentSlide === -1) {
			currentSlide = (slides.length - 1);
		}
	}
	setContent();
};

/**
 * This function sets a random slide.
 * 
 * @author kalmer
 */
var moveRandom = function() {
	currentSlide = getRandomIntInclusive({
		min : 0,
		max : slides.length - 1
	});
	setContent();
};

//var width = 0;
//var height = 0;

/**
 * This function sets the dimensions for the division containing slide images
 * for fitting all the images.
 * 
 * @author kalmer
 */
var setDimensions = function() {

	console.log(" 98 ");
	var height = 0;
	var width = 0;
	// var images = [];
	for (var slide in slides) {
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
			console.log(" 112: " + this.width);
		};
		image.src = "../images/" + slides[slide].name;
	}
};

/**
 * @author kalmer
 * @var Object the pointer to the timer
 */
var timer;

/**
 * This function starts the automatic slideshow.
 * 
 * @author kalmer
 */
var play = function() {
	timer = setTimeout(function() {
		moveRandom();
		play();
	}, 500);
};

/**
 * This function stops the slideshow.
 * 
 * @author kalmer
 */
var stop = function() {
	clearTimeout(timer);
}