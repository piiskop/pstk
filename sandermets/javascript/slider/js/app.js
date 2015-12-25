(function (document, window) {
    'use strict';

    function showImage(el) {
        var VisibleImages = document.getElementsByClassName("Show"),
                lImg = document.getElementById(el.className),
                i;
        for (i = 0; i < VisibleImages.length; i++) {
            VisibleImages[i].classList.add("Hide");
            VisibleImages[i].classList.remove("Show");
        }
        lImg.classList.remove("Hide");
        lImg.classList.add("Show");
    }

    var images = document.getElementsByClassName('Images'),
            randN = Math.floor(Math.random() * (images.length));

    images[randN].classList.remove("Hide");
    images[randN].classList.add("Show");

}(document, window));