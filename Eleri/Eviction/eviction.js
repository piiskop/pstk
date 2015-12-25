function nameF(element) {

    var elName = element.name;
    var elValue = element.value;

    if (elName === "option") {
        document.getElementById('question1').className = 'Hide';
        if (elValue === "jah") {
            document.getElementById('question2').className = 'Show';


        }
        else {
            document.getElementById('question3').className = 'Show';


        }
    }

    if (elName === "option1") {
        document.getElementById('question2').className = 'Hide';
        if (elValue === "jah") {
            console.log("Eviction");
            document.getElementById("decision").innerHTML = "Eviction";
        }
        else {
            console.log("No eviction");
            document.getElementById("decision").innerHTML = "No eviction";
        }
    }

    if (elName === "option2") {
        document.getElementById('question3').className = 'Hide';
        if (elValue === "ei") {
            console.log("Eviction");
            document.getElementById("decision").innerHTML = "Eviction";
        }
        else {
            document.getElementById('question2').className = 'Show';
        }
    }

    console.log(elName, elValue);
}

function resetCalculation() {
    document.getElementById("question1").className = "Show";
    document.getElementById("question2").className = "Hide";
    document.getElementById("question3").className = "Hide";
    }
///**
// * My App module
// * @returns {undefined}
// */
//(function(document){
//    
//   var form = console.log(document.getElementById('myform'));
//    
//}(document));




/* console.log(document.getElementById('myform'));
 
 console.log(document.forms["myform"]); */

/* var myform = document.forms["myform"];
 console.log(myform.elements);
 
 var question = function () {
 console.log(this.name, this.value);
 };
 
 
 for (var i = 0; i < myform.elements.length; i++) {
 var radiobutton = myform.elements[i];
 console.log(radiobutton.name);
 
 if (radiobutton.name === 'option') {
 radiobutton.onclick = question;
 }
 
 if (radiobutton.name === 'option1') {
 radiobutton.onclick = question;
 }
 } */