/**
 * @author kaire
 * @var string[string][int] the array of categories / kategooriad
 */
var categories = [ {
	name : "Võileivatordid"
}, {
	name : "Tordid"
} ];

/**
 * @author kaire
 * @var string[string][int] the array of slides / slaidid
 */
var slides = [ {
	name : "võileivatort1.jpg",
	text : "Sünnipäevaks",
	category : 0
}, {
	name : "võileivatort2.jpg",
	text : "Juubeliks",
	category : 0
}, {
	name : "võileivatort3.jpg",
	text : "Emadepäevaks",
	category : 0
}, {
	name : "võileivatort4.jpg",
	text : "Sõbrapäevaks",
	category : 0
}, {
	name : "võileivatort5.jpg",
	text : "Jõuludeks",
	category : 0
}, {
	name : "tort1.jpg",
	text : "Jõuluõhtuks",
	category : 1
}, {
	name : "tort2.jpg",
	text : "Sügisõhtuteks",
	category : 1
} ];

/**
 * @author kaire
 * @var int the index of the current slide
 */
var currentSlide = 0;

/**
 * This function sets the contents.
 * 
 * @author kaire
 */
var setContent = function() {
	document.getElementById("category").innerHTML = categories[slides[currentSlide].category].name;
	var image = document.getElementById("image");
	image.style.backgroundImage = "url('Pildid/" + slides[currentSlide].name
			+ "')";
	document.getElementById("caption").innerHTML = slides[currentSlide].text;
}

/**
 * Järjest vahetuvad slaidid
 * 
 * @author kaire
 * @param boolean
 *            Järjest paremale?
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
 * Juhusliku slaidi kuvamiseks vajalik funktsioon
 */
function getRandomIntInclusive(parameters) {
	return Math.floor(Math.random() * (parameters.max - parameters.min + 1))
			+ parameters.min;
}
/**
 * Juhusliku slaidi kuvamine. Kutsub välja eelmise funktsiooni
 * 
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
	// var images[];
	for (slide in slides) {
		var image = new Image ();
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
			console.log("128:" + this.width);
		};
		image.src = "Pildid/" + slides[slide].name;
	}
	
};
/**
 * 
 */
var timer;
	
/**
 * See funktsioon käivitab slaidishow
 */
var play = function() {
	timer = setTimeout(function(){
		moveRandom();
		play();
	}, 500);
};
/**
 * See funktsioon lõpetab slaidishow
 */
var stop = function(){
clearTimeout(timer);
}