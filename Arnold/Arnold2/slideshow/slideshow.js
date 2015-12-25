//array where categories are held
var kategooria=[{
	name:"Pingviin"
},{
	name:"Something else"
}];
var slideimages = []; // create new array to preload images
	slideimages[0] = new Image(); // create new instance of image object
	slideimages[0].src = "http://core0.staticworld.net/images/idge/imported/article/itw/2014/06/06/tux-linux-professional_0-100520358-orig.png";
	slideimages[0].text= "Linux at first job interview";
	slideimages[0].kategooria= 0;
	slideimages[1] = new Image();
	slideimages[1].src = "https://codeholics.com/wp-content/uploads/2014/10/matrilinux.png";
	slideimages[1].text= "Linux got the job";
	slideimages[1].kategooria= 0;
	slideimages[2] = new Image();
	slideimages[2].src = "http://hsto.org/getpro/habr/post_images/2ec/5ea/f83/2ec5eaf834a57abdfb4e25f367543111.png";
	slideimages[2].text= "Linux has lost the job";
	slideimages[2].kategooria= 0;
	slideimages[3] = new Image();
	slideimages[3].src = "https://static-s.aa-cdn.net/img/ios/908767033/95d77debcec23c6625f6c807a75b4b40?v=1";
	slideimages[3].text= "Where am I?";
	slideimages[3].kategooria= 1;
	slideimages[4] = new Image();
	slideimages[4].src = "http://ichef.bbci.co.uk/images/ic/256x256/p01br4bb.jpg";
	slideimages[4].text= "What is this?!?!";
	slideimages[4].kategooria= 1;
//function to start sliding images
var step=0;
//function to set slides
function setslide(){
	document.getElementById("kategooria").innerHTML = kategooria[slideimages[step].kategooria].name;
	document.getElementById('slide').src = slideimages[step].src;
	document.getElementById('text').innerHTML = slideimages[step].text;
}
function autoslide(){
//if browser does not support the image object, exit.
	if (!document.images)
		return
	setslide();
	if (step<slideimages.length-1)
		step++
	else
		step=0
	//call function "slideit()" every 1 seconds
	timer=setTimeout("autoslide()",1000);
};
function slideit(){
	//if browser does not support the image object, exit.
		if (!document.images){
			return;
		}
		if (step<slideimages.length-1){
			step++;
			setslide();
		} else {
			step=0;
			setslide();
		};
};
function slideback(){
	//if browser does not support the image object, exit.
		if (!document.images){
			return;
		}
		if (step>0){
			step--;
			setslide();
		} else {
			step=slideimages.length-1;
			setslide();
		};
};
//stop autoslider
function stopauto(){
	clearTimeout(timer);
}
//this funtion moves to random slide
function randomslide(){
	step = Math.floor(Math.random() * slideimages.length);
	console.log(step);
	setslide();
}