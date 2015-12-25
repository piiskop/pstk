/**
 * Pupils array
 * @access public
 * @author Eleri<eleri.apsolon@gmail.com>
 * @type Array
 */
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

function dynamicSort(property) {
    var sortOrder = 1;
    if(property[0] === "-") {
        sortOrder = -1;
        property = property.substr(1);
    }
    return function (a,b) {
        var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
        return result * sortOrder;
    }
}
alert(pupils.sort(dynamicSort("firsName").value));
pupils.sort(dynamicSort("lastName"));

function getInput() {
var x = document.getElementById("text").value;
console.log(x);
}



function firstNameInArray(pupils, fistName) {
for(var i = 0; i < pupils.length; i++) {
   if(pupils[i].firstName === 'maarika') {
       return(pupils[i].firstName);
       break;
   }
   //alert("Sellist õpilast pole.");
}
}

function lastNameInArray(pupils, lastName) {
for(var i = 0; i < pupils.length; i++) {
   if(pupils[i].lastName === 'aeg') {
       return(pupils[i].lastName);
       break;
   }
   //alert("Sellist õpilast pole.");
}
}

function nameInArray(pupils, firstName, lastName) {
for(var i = 0; i < pupils.length; i++) {
   if(pupils[i].firstName === 'ingmar' && pupils[i].lastName === 'nurmiste') {
       return(pupils[i].firstName+" "+pupils[i].lastName);      
   }
}
}

var n = firstNameInArray(pupils, pupils.firstName);
var m = lastNameInArray(pupils, pupils.lastName);
var i= nameInArray(pupils, pupils.firstName, pupils.lastName);

console.log(n);
console.log(m);
console.log(i);

//function check() {
//    var answer = getInput(this);
//    var name = nameInArray();
//    if(answer === name) {
//        console.log(n);
//    }
//    else {
//        console.log("Nime ei leitud");
//    }
//}
//
//check();

/*
function findName(array, name) {
    for (var i = 0; i < array.length; i++) {
        if (array[i].name === name) {
            return array[i];
        }
    }
    return("Sellist õpilast pole.");
}

var n = findName(pupils, "keijo");
console.log(n);


function nameCompare(a, b) {
  if (a.name > b.name) {
      return -1;
  }
  else if (a.name < b.name) {
      return 1;
  }
  return 0;
}

function nameSort(people) {
  people.sort(nameCompare);
}

nameSort(pupils);

// check the order
for(var i=0; i<pupils.length; i++) {
  console.log(pupils[i].name)
}
*/

//function sortArray(pupils, firstName) {
//for(var i = 0; i < pupils.length; i++) {
//    var p = (pupils[i].firstName);
//var r = p.sort();
//console.log(r);
//}
//}
//
//sortArray(pupils, pupils.firstName);
