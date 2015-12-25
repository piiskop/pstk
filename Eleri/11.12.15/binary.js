/**
 * @file Program to find existing students and add/remove programming skill and change name
 * @author Eleri Apsolon<eleri.apsolon@gmail.com>
 */

var sortProperty = 'firstName';

/**
 * set locale to Estonia
 * @type String
 */
var locale = 'et';

/**
 * if 1 found by firstName
 * if 2 found by lastName
 * @type Number
 */
foundByName = -1;

/**
 * 
 * @type Number
 */
var currentStudentFound = -1;

/**
 * 
 * @type Array
 */
var pupils = [{
        firstName: "kaire",
        lastName: "ojastu",
        canCode: false
    },
    {
        firstName: "raiko",
        lastName: "ojaste",
        canCode: false
    },
    {
        firstName: "eleri",
        lastName: "apsolon",
        canCode: false
    },
    {
        firstName: "sander",
        lastName: "mets",
        canCode: false
    },
    {
        firstName: "maarika",
        lastName: "erika",
        canCode: false
    },
    {
        firstName: "kristen",
        lastName: "aeg",
        canCode: true
    },
    {
        firstName: "keijo",
        lastName: "palts",
        canCode: false
    },
    {
        firstName: "ingmar",
        lastName: "nurmiste",
        canCode: false
    },
    {
        firstName: "ženja",
        lastName: "fokin",
        canCode: false
    }];

/**
 * 
 * @param {Object} params
 * @param {Ob} xhttp
 * @returns {undefined}
 */
function POSTpupil(params, xhttp) {
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            //todo something with post answer
            var resultJSON = xhttp.responseText;
            var result = JSON.parse(resultJSON);
            if (result.success) {
                console.log(result);
            } else {
                console.log(result);
            }
        } else if (xhttp.readyState === 4 && xhttp.status !== 200) {
            console.log(xhttp.statusText);
        }
    };
    xhttp.open(params.method, "http://kool.local/Eleri/11.12.15/index.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(params.params);
}

/**
 * 
 * @param {type} params
 * @param {type} xhttp
 * @returns {undefined}
 */
function GETpupils(params, xhttp) {
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            var result = xhttp.responseText;
            //get from json yo tmp array
            var pupilsTMP = JSON.parse(result);
            //sort tmp array by default property
            sortArrayUTF8(pupilsTMP, sortProperty);

            for (var k in pupilsTMP) {
                pupilsTMP[k].id = parseInt(k) + 1;
            }
            //assign content from tmp to global pupil array
            pupils = pupilsTMP;
            console.log(JSON.stringify(pupils));

            for (var p in pupilsTMP) {
                //console.log(typeof p, p);
                console.log(pupilsTMP[parseInt(p)]['firstName'] + " " + pupilsTMP[parseInt(p)]['lastName'] + " ->  " + pupilsTMP[parseInt(p)]['canCode']);
            }
            getData();
            startSearch();
        }

    };

    xhttp.open(params.method, "http://kool.local/Eleri/11.12.15/index.php", true);
    xhttp.send();
}

/**
 * 
 * @param {Object} params
 * @returns {undefined}
 */
function makeRequest(params) {
    var xhttp = new XMLHttpRequest();
    if (params.method === 'GET') {
        GETpupils(params, xhttp);
    } else if (params.method === 'POST') {
        POSTpupil(params, xhttp);
    }
}

///**
// * creating array that consists of student objects
// * 
// * @type Array|@exp;sortASCII@pro;array|sortASCII.array
// */
//function getArray() {
//
//    var xhttp = new XMLHttpRequest();
//
//    xhttp.onreadystatechange = function () {
//        if (xhttp.readyState === 4 && xhttp.status === 200) {
//            var result = xhttp.responseText;
//            //get from json yo tmp array
//            var pupilsTMP = JSON.parse(result);
//            //sort tmp array by default property
//            sortArrayUTF8(pupilsTMP, sortProperty);
//
//            for (var k in pupilsTMP) {
//                pupilsTMP[k].id = parseInt(k) + 1;
//            }
//            //assign content from tmp to global pupil array
//            pupils = pupilsTMP;
//            console.log(JSON.stringify(pupils));
//
//            for (var p in pupilsTMP) {
//                //console.log(typeof p, p);
//                console.log(pupilsTMP[parseInt(p)]['firstName'] + " " + pupilsTMP[parseInt(p)]['lastName'] + " ->  " + pupilsTMP[parseInt(p)]['canCode']);
//            }
//        }
//
//    };
//
//    xhttp.open("GET", "http://kool.local/Eleri/11.12.15/index.php", true);
//    xhttp.send();
//}

/**
 * 
 * @returns {Boolean}
 */
document.getElementById("jsonbutton").onclick = function () {
    makeRequest({
        method: 'GET',
        params: null
    });
    startSearch();
    return false;
};

/**
 * sorting taking account locales(for example est, fin)
 * @param {type} property
 * @returns {undefined}
 */
var sortUTF8 = function (property) {
    pupils.sort(function (a, b) {
        return a[property].localeCompare(b[property], locale);
    });
};

/**
 * 
 * @param {type} array
 * @param {type} property
 * @returns {undefined}
 */
var sortArrayUTF8 = function (array, property) {
    array.sort(function (a, b) {
        return a[property].localeCompare(b[property], locale);
    });
};

/**
 * putting id-s to pupils
 * @param {String} prop
 * @returns {undefined}
 */
var sortAndInitData = function (prop) {
    sortUTF8(prop);//prepare data
    var i = 0;
    while (i < pupils.length) {
        pupils[i].id = (i + 1);//add id
        i++;
    }
};

/**
 * 
 * Binary search algorythm
 * @param {String} searchString
 * @param {String} prop
 * @returns {binarySearchByProperty.result}
 */
var binarySearchByProperty = function (searchString, prop) {
    sortUTF8(prop);
    var result = {
        step: 0,
        index: -1,
        id: 0
    };
    var start = 0, end = pupils.length,
            mid = Math.floor((start + end) / 2);

    while (end - start > 0) {
        result.step++;
        if (searchString.localeCompare(pupils[mid][prop], locale) === 0) {
            result.index = mid;
            result.id = pupils[mid].id;
            break;
        }
        if (Math.abs(end - start) === 1) {
            if (end in pupils) {
                if (prop in pupils[end]) {
                    if (pupils[end][prop] === searchString) {
                        result.index = end;
                        result.id = pupils[end].id;
                        break;
                    }
                }
            }
            if (end in pupils) {
                if (prop in pupils[start]) {
                    if (pupils[start][prop] === searchString) {
                        result.index = start;
                        result.id = pupils[start].id;
                        break;
                    }
                }
            }
            break;
        }
        else if (searchString.localeCompare(pupils[mid][prop], locale) < 0) {
            end = mid;
        }
        else if (searchString.localeCompare(pupils[mid][prop], locale) > 0) {
            start = mid;
        }
        mid = Math.floor((start + end) / 2);
    }
    sortUTF8(sortProperty);
    return result;
};

sortAndInitData(sortProperty);//init data to be sorted and id added. global pupils gets to be changed
//set up done start using!

/**
 * Show/hide element
 * 
 * @param {type} id
 * @param {type} t
 * @returns {undefined}
 */
function showElement(id, t) {
    if (t) {
        document.getElementById(id).classList.remove("Hide");
    }
    else {
        document.getElementById(id).classList.add("Hide");
    }
}

/**
 * helper hide function
 * 
 * @returns {undefined}
 */
function hideElements() {
    showElement('question2', false);
    showElement('dataChanged', false);
    showElement('dataNotChanged', false);
    showElement('steps', false);
}

/**
 * 
 * @returns {undefined}
 */
function resetGlobalData() {
    currentStudentFound = -1;
    foundByName = -1;
    document.getElementById('canCode').checked = false;
}

/**
 * start binary search by user input given
 * 
 * @returns {undefined}
 */
function startSearch() {
    hideElements();

    var name = document.getElementById('text').value;
    name = name.trim();
    if (name.length < 1) {
        return;//empty
    }
    name = name.toLowerCase();
    var names = name.split(" ");

    if (names.length > 1) { //search by multpile strings

        var lastName = names[names.length - 1];//get lastname
        names.pop();
        var firstName = names.join(' ');//remove last element and join with spaces

        var r = binarySearchByProperty(firstName, 'firstName');
        if (r.id > 0) {
            console.log('found by firstName', pupils[(r.id - 1)].firstName);
            currentStudentFound = r.id;
            document.getElementById('canCode').checked = pupils[(r.id - 1)].canCode;
            showElement('question2', true);
            foundByName = 1;
        } else {
            console.log('NOT found by firstName');
        }

        var r1 = binarySearchByProperty(lastName, 'lastName');
        if (r1.id > 0) {
            console.log('found by lastName', pupils[(r1.id - 1)].lastName);
            currentStudentFound = r1.id;
            document.getElementById('canCode').checked = pupils[(r1.id - 1)].canCode;
            showElement('question2', true);
            foundByName = 2;
        } else {
            console.log('NOT found by lastName');
        }

        if (r.id < 1 && r1.id < 1) {
            showElement('dataNotChanged', true);
        }

        document.getElementById('steps').innerHTML = "Korduste arv: " + (r.step + r1.step).toString();
        showElement('steps', true);

    } else {

        //search by last name example
        var r = binarySearchByProperty(names[0], 'firstName');
        if (r.id > 0) {
            console.log('found by firstName', pupils[(r.id - 1)].firstName);
            currentStudentFound = r.id;
            document.getElementById('canCode').checked = pupils[(r.id - 1)].canCode;
            showElement('question2', true);
            foundByName = 1;
        } else {
            console.log('NOT found by firstName');
        }

        //search by last name example
        var r1 = binarySearchByProperty(names[0], 'lastName');

        if (r1.id > 0) {
            console.log('found by lastName', pupils[(r1.id - 1)].lastName);
            currentStudentFound = r1.id;
            document.getElementById('canCode').checked = pupils[(r1.id - 1)].canCode;
            showElement('question2', true);
            foundByName = 2;
        } else {
            console.log('NOT found by lastName');
        }

        if (r.id < 1 && r1.id < 1) {
            showElement('dataNotChanged', true);
        }

        document.getElementById('steps').innerHTML = "Korduste arv: " + (r.step + r1.step).toString();
        showElement('steps', true);
    }
}

/**
 * if student by search we can save data
 * 
 * @returns {undefined}'
 */
function save() {
    hideElements();
    sortUTF8('firstName');

    if (currentStudentFound > -1 && foundByName > -1) { //we have found and have access via globals

        var c = document.getElementById('canCode').checked;
        var n = document.getElementById('text').value;

        n = n.trim();
        if (n.length < 1) {
            return;//empty
        }

        pupils[currentStudentFound - 1]['canCode'] = c;

        n = n.toLowerCase();
        var names = n.split(" ");

        if (names.length > 1) { //save by multpile strings

            var lastName = names[names.length - 1];//get lastname
            names.pop();//remove that last
            var firstName = names.join(' ');
            pupils[currentStudentFound - 1]['firstName'] = firstName;
            pupils[currentStudentFound - 1]['lastName'] = lastName;

        } else {
            if (foundByName === 1) {
                pupils[currentStudentFound - 1]['firstName'] = n;
            }
            else if (foundByName === 2) {
                pupils[currentStudentFound - 1]['lastName'] = n;
            }
        }

        var params = {
            method: 'POST',
            params: 'firstName=' + pupils[currentStudentFound - 1].firstName +
                    '&lastName=' + pupils[currentStudentFound - 1].lastName +
                    '&canCode=' + pupils[currentStudentFound - 1].canCode +
                    '&id=' + pupils[currentStudentFound - 1].id
        };
        makeRequest(params);

        sortUTF8('firstName');
        currentStudentFound = -1;
        foundByName = -1;
        document.getElementById('text').value = "";
        showElement('dataChanged', true);
        getData();

    }
}

/**
 * Shows/hides table of students
 * 
 * @returns {undefined}
 */
function toggleTable() {

    var table = document.getElementById('studentTable');
    var button = document.getElementById('display');

    if (table.classList.contains("Hide")) {
        getData();
        table.classList.remove("Hide");
        button.innerHTML = "Peidan kogu nimekirja";
    } else {
        table.classList.add("Hide");
        button.innerHTML = "Kuvan kogu nimekirja";
    }

}

/**
 * dynamically adding rows of student data
 * 
 * @returns {undefined}
 */
function getData() {
    sortUTF8('firstName');

    var tableBody = document.getElementById('studentTable').getElementsByTagName('tbody')[0];
    var tableFoot = document.getElementById('studentTable').getElementsByTagName('tfoot')[0];
    tableBody.innerHTML = "";
    tableFoot.innerHTML = "";

    var array = pupils;

    for (var i = 0; i < array.length; i++) {
        var row = tableBody.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = array[i].firstName + " " + array[i].lastName;
        if (array[i].canCode) {
            cell2.classList.add('green');
        }
        cell1.classList.add('nameBg');
    }

    var row = tableFoot.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = 'Kokku';
    cell2.innerHTML = array.length;
}
getData();

////testing
//for (var i = 0; i < pupils.length; i++) {
//    var s = pupils[i].lastName;
//    var res = binarySearchByProperty(s, 'lastName');
//    if (pupils[(res.id - 1)].lastName !== s) {
//        throw 'broken';
//    } else {
//        console.log('found', s, pupils[(res.id - 1)].lastName);
//    }
//}
//
//for (var j = 0; j < pupils.length; j++) {
//    var s = pupils[j].firstName;
//    var res = binarySearchByProperty(s, 'firstName');
//    if (pupils[(res.id - 1)].firstName !== s) {
//        throw 'broken';
//    } else {
//        console.log('found', s, pupils[(res.id - 1)].lastName);
//    }
//}
//
//console.log(pupils);
