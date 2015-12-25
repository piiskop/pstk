var pupils = [{
        firstName: "kaire",
        lastName: "ojastu"
    },
    {
        firstName: "raiko",
        lastName: "ojaste"
    },
    {
        firstName: "eleri",
        lastName: "apsolon"
    },
    {
        firstName: "sander",
        lastName: "mets"
    },
    {
        firstName: "maarika",
        lastName: "erika"
    },
    {
        firstName: "kristen",
        lastName: "aeg"
    },
    {
        firstName: "keijo",
        lastName: "palts"
    },
    {
        firstName: "ingmar",
        lastName: "nurmiste"
    },
    {
        firstName: "ženja",
        lastName: "fokin"
    }];


//pupils.sort(function (a, b) {
//    return a.firstName.localCompare(b.firstName);
//});



function firstNameInArray(pupils, fistName) {
    var answer = document.getElementById('text').value;
    for (var i = 0; i < pupils.length; i++) {
        if (pupils[i].firstName === answer) {
            return(pupils[i].firstName);
            break;
        }
        //alert("Sellist õpilast pole.");
    }
}

function lastNameInArray(pupils, lastName) {
    var answer = document.getElementById('text').value;
    for (var i = 0; i < pupils.length; i++) {
        if (pupils[i].lastName === answer) {
            return(pupils[i].lastName);
            break;
        }
        //alert("Sellist õpilast pole.");
    }
}

function nameInArray(pupils, firstName, lastName) {
    var answer = document.getElementById('text').value;
    for (var i = 0; i < pupils.length; i++) {
        if (pupils[i].firstName && pupils[i].lastName === answer) {
            return(pupils[i].firstName + " " + pupils[i].lastName);
        }
    }
}

//var n = firstNameInArray(pupils, pupils.firstName);
//var m = lastNameInArray(pupils, pupils.lastName);
//var i = nameInArray(pupils, pupils.firstName, pupils.lastName);


function showOthers(element) {

    //show hidden text
    var hidden = document.getElementsByClassName("Hide");

    for (var i = 0; i < hidden.length; i++) {
        hidden[i].classList.add("Show");
        hidden[i].classList.remove("Hide");
    }
}

function getInput() {
    var x = document.getElementById("text").value;
//console.log(x);
    if (x === firstNameInArray(pupils, pupils.firstName)) {
        console.log(x);
        showOthers(x);

    }
    else if (x === lastNameInArray(pupils, pupils.lastName)) {
        console.log(x);
        showOthers(x);
    }
    else if (x === nameInArray(pupils, pupils.firstName, pupils.lastName)) {
        console.log(x);
        showOthers(x);
    }
    else {
        console.log("Sellist õpilast pole");
    }
}

function program() {
    if (document.getElementById('radioButton').checked) {
        console.log("Õpilase andmed on muudetud");
        var hidden = document.getElementsByClassName("HideMore");

        for (var i = 0; i < hidden.length; i++) {
            hidden[i].classList.add("Show");
            hidden[i].classList.remove("HideMore");
            break;
        }
    } else {
        console.log("Muudatusi ei tehtud");
        var hidden1 = document.getElementsByClassName("HideSomeMore");
//        var hidden = document.getElementsByClassName("HideMore");
        for (var i = 0; i < hidden1.length; i++) {
            hidden1[i].classList.add("Show");
            hidden1[i].classList.remove("HideSomeMore");
            break;
//            hidden[i].classList.add("HideMore");
//            hidden[i].classList.remove("Show");
        }
    }
}

function saveState() {
    var ans1 = document.getElementById('radioButton').value;

    if (ans1.value == 1) {
        ans1.setAttribute("checked", "checked");
        ans1.checked = true;
    }
}

function howMany(selectObject) {
  var numberSelected = 0;
  for (var i = 0; i < selectObject.options.length; i++) {
    if (selectObject.options[i].selected) {
      numberSelected++;
    }
  }
  return numberSelected;
}






//function binarySearch(arr, i) {
//    var mid = Math.floor(arr.length / 2);
//    console.log(arr[mid], i);
//    if (arr[mid] === i) {
//        console.log('match', arr[mid], i);
//        return arr[mid];
//    } else if (arr[mid] < i && arr.length > 1) {
//        console.log('mid lower', arr[mid], i);
//        return binarySearch(arr.splice(mid, Number.MAX_VALUE), i);
//    } else if (arr[mid] > i && arr.length > 1) {
//        console.log('mid higher', arr[mid], i);
//        return binarySearch(arr.splice(0, mid), i);
//    } else {
//        console.log('not here', i);
//        return -1;
//    }
//}
//var result = binarySearch(pupils, pupils.firstName);
//console.log(result);