/**
 * 
 */
var categories = [ {
	name : "Nature"
}, {
	name : "Buildings"
} ];

var slides = [ {
	name : "Koala.jpg",
	text : "Koala",
	category : 0
}, {
	name : "Jellyfish.jpg",
	text : "Jellyfish",
	category : 0
}, {
	name : "Hydrangeas.jpg",
	text : "Hydrangeas",
	category : 0
}, {
	name : "Penguins.jpg",
	text : "Penguins",
	category : 0
}, {
	name : "Lighthouse.jpg",
	text : "Lighthouse",
	category : 1
} ];

var currentSlide = 0;

var setContent = function() {
	document.getElementById("category").innerHTML = categories[slides[currentSlide].category].name;
	var image = document.getElementById("image");
	image.style.backgroundImage = "url('images/" + slides[currentSlide].name
			+ "')";
	document.getElementById("caption").innerHTML = slides[currentSlide].text;
}

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

function getRandomIntInclusive(parameters) {
	return Math.floor(Math.random() * (parameters.max - parameters.min + 1))
			+ parameters.min;
}

var moveRandom = function() {
	currentSlide = getRandomIntInclusive({
		min : 0,
		max : slides.length - 1
	});
	setContent();
};

var setDimensions = function() {
	var height = 0;
	var width = 0;
	for (slide in slides) {
		var image = new Image();
		image.onload = function() {
			if (image.height > height) {
				height = image.height;
			}
			if (image.width > width) {
				width = image.width;
			}
			var containerForImage = document.getElementById("image");
			containerForImage.style.height = height + "px";
			containerForImage.style.width = width + "px";
		}
		image.src = "images/" + slides[slide].name;
	}
};

var timer;

var play = function() {
	timer = setInterval(moveRandom, 1000);
};

var stop = function() {
	clearInterval(timer);
};