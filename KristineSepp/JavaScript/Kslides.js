var categories = [ {
	name : "Pilt"
}, {
	name : "Lause"
} ];

var myImage = document.getElementById("myPhoto");
var myText = document.getElementById("myText");
var imageArray=[{picture: "Free-Wallpaper-Nature-Scenes_Gg92QQ8.png", sentence:"Esimene Lause", category : 0} ,{picture:"Hopetoun_falls.png",sentence:"Teine Lause", category : 0}, {picture:"images1.png",sentence:"Kolmas Lause", category : 1}, {picture:"nature-wlk.png" , sentence:"Neljas Lause", category : 1}];

var imageIndex=0;


function changeImage() {
	var image = imageArray [imageIndex];
	var source = image.picture;
	var sentence = image.sentence;
	myImage.setAttribute("src", source);
	myText.innerHTML = sentence;
	imageIndex++;
	if(imageIndex>=imageArray.length){
		imageIndex=0;
	}

}

var intervalHandle = setInterval(changeImage,2000);

function move(toRight) {
	if (toRight) {
		imageIndex++;
		if (imageIndex === imageArray.length) {
			imageIndex = 0;
		}
	} else {
		imageIndex--;
		if (imageIndex === -1) {
			imageIndex = (imageArray.length - 1);
		}
	}
	changeImage();
};

function getRandomIntInclusive(parameters) {
	return Math.floor(Math.random() * (parameters.max - parameters.min + 1))
			+ parameters.min;
}

function moveRandom(){
	imageIndex = getRandomIntInclusive({
		min : 0,
		max : imageArray.length - 1
	});
	changeImage();
};

function play(){
	intervalHandle = setTimeout(function() {
		moveRandom();
		play();
	}, 2000);
};


function stop() {
	clearTimeout(intervalHandle);
};