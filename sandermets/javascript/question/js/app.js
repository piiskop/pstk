(function (document, window) {
    'use strict';

    var Main = function () {

        switch (this.name) {

            case "q1":
                if (parseInt(this.value) === 1) {

                    document.getElementById("q1").className = "Hide";
                    document.getElementById("q3").className = "Show";

                } else if (parseInt(this.value) === 0) {

                    document.getElementById("q2").className = "Show";
                    document.getElementById("q1").className = "Hide";

                } else {
                    throw "baaad";
                }

                break;

            case "q2":
                if (parseInt(this.value) === 1) {

                    document.getElementById("q2").className = "Hide";
                    document.getElementById("q3").className = "Show";

                } else if (parseInt(this.value) === 0) {

                    document.getElementById("q2").className = "Hide";
                    window.alert('Eviction');

                } else {
                    throw "baaad";
                }

                break;

            case "q3":
                if (parseInt(this.value) === 1) {

                    document.getElementById("q3").className = "Hide";
                    window.alert('Eviction');

                } else if (parseInt(this.value) === 0) {

                    document.getElementById("q3").className = "Hide";
                    window.alert('Rumble On!!!');

                } else {
                    throw "baaad";
                }

                break;

            default:
                throw "baaad";
        }
    };

    var Start = function () {
        for (var x in document.forms['qForm'].elements) {
            if (document.forms['qForm'].elements[x].type === "radio") {
                document.forms['qForm'].elements[x].onclick = Main;
            }
        }
    };

    Start();

}(document, window));