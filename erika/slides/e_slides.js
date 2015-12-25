/**
 * 
 */

var categories = [ {
	name : "Sentences"
}, {
	name : "Non-sentences"
} ];

var slides = [ 
    {
	name: "Logo.png",
	text: "Esimene lause",
	category: 0
	},
    {
	name: "Map.png",
	text: "Teine lause",
	category: 0
	},
	{
	name: "Play.png",
	text: "Kolmas lause",
	category: 0
	},
	{
	name: "Web.png",
	text: "Neljas lause",
	category: 0
	}
];


var currentSlide = 0;

var setContent = function() {
	document.getElementById("category").innerHTML = categories[slides[currentSlide].category].name;
	var image = document.getElementById("image");
	image.style.backgroundImage = "url('images/" + slides[currentSlide].name + "')";
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


var moveRandom = function() {
	currentSlide = getRandomIntInclusive({
		min : 0,
		max : slides.length - 1
	});
	setContent();
};


var setDimensions = function() {
	var height = 360;
	var width = 420;
	for (slide in slides) {
		var image = new Image;
		image.src = "images/" + slides[slide].name;
		if (image.height > height) {
			height = image.height;
		}
		if (image.width > width) {
			width = image.width;
		}
	}
	var containerForImage = document.getElementById("image");
	containerForImage.style.height = height + "px";
	containerForImage.style.width = width + "px";
};