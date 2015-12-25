/**
 * 
 * @author Eleri Apsolon
 */

/**
 * creating array that consists of student objects
 * 
 * @type Array|@exp;sortASCII@pro;array|sortASCII.array
 */
var m = [{
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
console.log(m);

/**
 * sorting by simple string comparison
 * 
 * @param {type} a
 * @param {type} prop
 * @returns {sortASCII.array|sortASCII.buf}
 */
function sortASCII(a, prop) {
    var array = a;
    if (array.length < 2) {
        return array;
    }
    var i, buf, j;
    for (i = (array.length - 1); i >= 0; i--) {
        for (j = i; j >= 0; j--) {
            if (array[i][prop] < array[j][prop]) {
                buf = array[j];
                array[j] = array[i];
                array[i] = buf;
            }
        }
    }
    return array;
}

/**
 * sorting taking account locales(for example est, fin)
 * @returns {sortUTF8.array|sortASCII.array|sortASCII.buf|Number|Array|m}
 */
function sortUTF8() {
    var array = m;
    array.sort(function (a, b) {
        return a.firstName.localeCompare(b.firstName, 'et');
    });
    return array;
}
/**
 * Binary search algorythm
 * 
 * @param {type} a
 * @param {type} prop
 * @returns {ByName.result}
 */
function ByName(a, prop) {

    var arr = sortASCII(m, prop); //array has to be sorted by property
    var result = {
        step: 0,
        index: -1
    };
    var start = 0, end = arr.length,
            mid = Math.floor((start + end) / 2);

    while (end - start > 0) {
        result.step++;
        if (arr[mid][prop] === a) {
            result.index = mid;
            break;
        }
        //javascript has no internal UTF8 support
        //comparing öäüõ to whatever character may lead to unexpecetd results
        //we force here to stop while loop and check leftovers
        //just in case we check bounderies
        //abs gets positive value
        if (Math.abs(end - start) === 1) {
            if (end in arr) {
                if (prop in arr[end]) {
                    if (arr[end][prop] === a) {
                        result.index = end;
                        break;
                    }
                }
            }
            if (end in arr) {
                if (prop in arr[start]) {
                    if (arr[start][prop] === a) {
                        result.index = start;
                        break;
                    }
                }
            }
            break;
        }
        else if (a < arr[mid][prop]) {
            end = mid;
        }
        else if (a > arr[mid][prop]) {
            start = mid;
        }
        mid = Math.floor((start + end) / 2);
    }
    return result;
}

/**
 * Prepare data for binary search
 * 
 * @param {String} a
 * @returns {Search.appAnonym$0}
 */
function Search(a) {
    var nameArray = a.split(" ");
    var key = -1, step = -1;
    //there can be only one correct answer
    if (nameArray.length > 1) {
        var r1 = ByName(nameArray[0], 'firstName');
//        var r2 = ByName(nameArray[1], 'lastName');
        //both answers matches the same person
        //steps where made in both fname and sname
        if (r1.index > -1) {
            key = r1.index;

        }
        step = r1.step;
    } else {
        var r1 = ByName(a, 'firstName');
//        var r2 = ByName(a, 'lastName');
        //if firstName is > -1 it is match
        if (r1.index > -1) {
            key = r1.index;

        }
        step = r1.step;
//        else if (r2.index > -1) {
//            key = r2.index;
//            step = r1.step + r2.step;
//        }
    }
    return {
        key: key,
        step: step
    };
}

m = sortASCII(m, 'firstName');

var currentStudentFound = -1;

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
 * start binary search by user input giveb
 * 
 * @returns {undefined}
 */
function searchStudent() {
    hideElements();
    currentStudentFound = -1;
    var x = document.getElementById('text').value;
    x = x.trim();
    x = x.toLowerCase();
    var r = Search(x);
    if (r.key > -1) {
        currentStudentFound = r.key;
        showElement('question2', true);
    } else {
        showElement('dataNotChanged', true);
    }
    document.getElementById('steps').innerHTML = "Korduste arv: " + r.step.toString();
    showElement('steps', true);
    //console.log(m[r.key]);
}

/**
 * if student by search we can save data
 * 
 * @returns {undefined}'
 */
function save() {
    hideElements();
    if (currentStudentFound > -1) {
        var c = document.getElementById('canCode').checked;
        var n = document.getElementById('text').value;
        m[currentStudentFound]['canCode'] = c;
        m[currentStudentFound]['firstName'] = n;
        m = sortASCII(m, 'firstName');
        currentStudentFound = -1;
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
    hideElements();
    var table = document.getElementById('studentTable');
    var button = document.getElementById('display');

    if (table.classList.contains("Hide")) {
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
    var tableBody = document.getElementById('studentTable').getElementsByTagName('tbody')[0];
    var tableFoot = document.getElementById('studentTable').getElementsByTagName('tfoot')[0];
    tableBody.innerHTML = "";
    tableFoot.innerHTML = "";
    var array = sortUTF8();
    for (var i = 0; i < array.length; i++) {
        var row = tableBody.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = array[i].firstName +" "+ array[i].lastName;
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