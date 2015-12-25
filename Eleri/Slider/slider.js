//var imageMapping = [
//    {
//        img1: "img4"
//    },
//    {
//        img2: "img5"
//    },
//    {
//        img3: "img6"
//    }
//];

function showimage(element) {

    //hide all visible large images

    var VisibleImages = document.getElementsByClassName("Show");

    for(var i= 0; i<VisibleImages.length; i++) {
        VisibleImages[i].classList.add("Hide");
        VisibleImages[i].classList.remove("Show");       
    }

    var largeImage = document.getElementById(element.className);
   // console.log(largeImage.classList);

    largeImage.classList.remove("Hide");
    largeImage.classList.add("Show");

//    imageMapping.forEach(function (el, index, array) {
//
//        if (element.className in el) {
//            var classToShow = el[element.className];
//            console.log(classToShow);
////            console.log("Element:", el);
////            console.log("Index", index);
////            console.log("Array", array);
//        }
//
//    });
//
//
}

var images = document.getElementsByClassName('Images');
console.log(images.length);
var randNumber= Math.floor(Math.random()*(images.length));

images[randNumber].classList.remove("Hide");
images[randNumber].classList.add("Show");