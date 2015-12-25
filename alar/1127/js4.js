/**
 * This script contains an array of pupils, a functions that search the array and sort the array. A function
 * enables and another function disables some HTML elements that are generated, such as a table and a "steps counter".
 * There is also a function to change and add the data in pupils.
 * @author Alar Aasa <alar@alaraasa.ee>
 */

/**
 * This array contains a list of students
 * @author Alar Aasa <alar@alaraasa.ee>
 */
var pupils = [ {
    firstName: "kaire",
    lastName: "ojastu"
},{
    firstName: "raiko",
    lastName: "ojaste"
},{
    firstName: "eleri",
    lastName: "apsolon"
},{
    firstName: "sander",
    lastName: "mets"
},{
    firstName: "maarika",
    lastName: "erika"
},{
    firstName: "kristen",
    lastName: "aeg"
},{
    firstName: "keijo",
    lastName: "palts"
},{
    firstName: "ingmar",
    lastName: "nurmiste"
},{
    firstName: "ženja",
    lastName: "fokin"
}];

/**
 * Represents the last name that was searched for
 * @author Alar Aasa <alar@alaraasa.ee>
 */
var prevName = null;
/**
 * Shows if the table style visibility is "none" if false or "inline" if true.
 * @author Alar Aasa <alar@alaraasa.ee>
 */
var tableStatus = false;
/**
 * Shows if the name is first(true) or last(false).
 * @author Alar Aasa <alar@alaraasa.ee>
 */
var namePlace;
/**
 * Saved array position
 * @author Alar Aasa <alar@alaraasa.ee>
 */
var arrayPosition;
/**
 * The amount of repeats in the last
 * @author Alar Aasa <alar@alaraasa.ee>
 */
var count;
/**
 * Sorts the pupils array based on the parameter
 * @author Alar Aasa <alar@alaraasa.ee>
 * @function
 * @param {string}arrayParameter
 */
function sortArray(arrayParameter){
    //Sorting the array according to given parameter
    if (arrayParameter == "firstName"){
        pupils.sort(function(a, b) {
            return a.firstName.localeCompare(b.firstName);
        });
    } else if (arrayParameter == "lastName"){
        pupils.sort(function(a, b) {
            return a.lastName.localeCompare(b.lastName);
        });
    }
    else {console.log("sortArray Error");}
}

/**
 * Hides HTML elements based on the parameter
 * @author Alar Aasa <alar@alaraasa.ee>
 * @function
 * @param {string}hideParameter
 */
var hideDiv = function(hideParameter){
    switch (hideParameter) {
        case "all":         //hides all the divs
            document.getElementById("progreContainer").style.display = "none";
            document.getElementById("repeatContainer").style.display = "none";
            document.getElementById("searchContainer").style.display = "none";
            if (prevName == null){
            document.getElementById("changeContainer").style.display = "none";
            }
            break;
        case "tableContainer":        //only hides the table
            document.getElementById("tableContainer").style.display = "none";
            break;
        case "progeContainer": //only hides the proge container div
            document.getElementById("progeContainer").style.display = "none";
            break;
        case "changeContainer": //only hides the change container div
            document.getElementById("changeContainer").style.display = "none";
            break;
        case "repeatContainer": //only hides the change container div
            document.getElementById("repeatContainer").style.display = "none";
            break;
        case "searchContainer": //only hides the search container div
            document.getElementById("searchContainer").style.display = "none";
            break;
        default: //for debugging
            console.log("hideDiv error");
            break;
    }
};
/**
 * Shows HTML elements based on the parameter
 * @author Alar Aasa <alar@alaraasa.ee>
 * @function
 * @param {string} showParameter
 */
var showDiv = function(showParameter){
    switch (showParameter){ //the opposite of hideDiv()
        case "all":
            document.getElementById("progreContainer").style.display = "inline";
            document.getElementById("changeContainer").style.display = "inline";
            document.getElementById("repeatContainer").style.display = "inline";
            document.getElementById("searchContainer").style.display = "inline";
            break;
        case "tableContainer":
            document.getElementById("tableContainer").style.display = "inline";
            break;
        case "progeContainer":
            document.getElementById("progreContainer").style.display = "inline";
            break;
        case "changeContainer":
            document.getElementById("changeContainer").style.display = "inline";
            break;
        case "repeatContainer":
            document.getElementById("repeatContainer").style.display = "inline";
            break;
        case "searchContainer":
            document.getElementById("searchContainer").style.display = "inline";
            break;
        default:
            console.log("showDiv error");
            break;

    }
};

/**
 * Binary search through the array to find the element that matches the data from the HTML form,
 * saves it into a variable.
 * then generate HTML that displays the search count and the search status
 * @author Alar Aasa <alar@alaraasa.ee>
 * @param {boolean} searchParam
 * @function
 */
var searchName = function(searchParam) {
    //Binary search. Compares the input string to pupils.lastName and then pupils.firstName
    //Getting ready
    console.log("SEARCH BEGIN: PREVNAME == " + prevName);
    namePlace = null;
    
    if (searchParam == true){
        var query = document.getElementById("formInput").value; //Input data
        query = query.toLocaleLowerCase(); //Makes the input lowercase
        	if (namePlace == undefined && prevName == null && query==""){
        		query = " ";
        	}
        prevName = null;
    } else {
        query = prevName;
    }
    console.log("QUERY: " + query);
    if (query == "") {
        query = prevName;
    }
    
    

    hideDiv("all"); //hides all divs
    count = 0; //Amount of repeats
    var begin = 0; //Beginning of the array
    var middle = Math.floor(pupils.length / 2); //Middle of the array
    var found = -1; //Search status. -1 == not done.
    var last = pupils.length - 1;
    document.getElementById("progre").checked = false; //Progre checkbox status to false
    // sort by first name
    sortArray("firstName");

    //binary search loop comparing to firstName.
    while (begin != middle || last != middle) {
        console.log(pupils[middle].lastName + " . " + middle);
        middle = Math.floor(middle); //Recalculate middle
        if (pupils[middle].firstName == query) {
            found = 1;
            arrayPosition = middle;
            console.log("Found by firstName");
            showDiv("progeContainer");
            namePlace = true;
            break;
        } else if (middle == pupils.length - 1 || middle == 0 || begin == middle || last == middle || begin == last) {
            //breaking here. Otherwise, if one of those parameters is true, it will loop forever
            found = 0;
            console.log("Not found by firstName");
            break;
        } else if (pupils[middle].firstName > query) {
            count++;
            last = middle;
            middle = (last + begin) / 2;
            if (middle == 0.5) middle = 0; // 0.5 rounds to 1
            middle = Math.floor(middle);
        } else if (pupils[middle].firstName < query) {
            count++;
            begin = middle;
            middle = (last + begin) / 2;
            if (middle == pupils.length - 1.5) middle = pupils.length - 1; //7.5 rounds to 7
            middle = Math.floor(middle);
        }
    }

    //if search by first name failed, then search by first name
    if (found == 0) {
        sortArray("lastName");
        //reset parameters
        begin = 0;
        middle = Math.floor(pupils.length / 2);
        last = pupils.length - 1;
        //the same binary search loop as before, comparing to lastName this time.
        while (begin != middle || last != middle) {
            middle = Math.floor(middle);
            if (pupils[middle].lastName == query) {
                found = 1;
                showDiv("progeContainer");
                console.log("Found by lastName");
                namePlace = false;
                prevName = pupils[middle].lastName;
                sortArray("firstName");
                for (var b=0;b<pupils.length;b++) {
                    if (pupils[b].lastName == prevName) {
                        arrayPosition = b;
                        console.log("lastName after the fix:" + pupils[middle].lastName);
                    }
                }
                break;
            } else if (middle == pupils.length - 1 || middle == 0 || begin == middle || last == middle || begin == last) {
                found = 0;
                console.log("Not found by lastName");
                break;
            } else if (pupils[middle].lastName > query) {
                count++;
                last = middle;
                middle = (last + begin) / 2;
                if (middle == 0.5) middle = 0;
                middle = Math.floor(middle);
            } else if (pupils[middle].lastName < query) {
                count++;
                begin = middle;
                middle = (last + begin) / 2;
                if (middle == pupils.length - 1.5) middle = pupils.length - 1; //7.5 rounds to 7
                middle = Math.floor(middle);
            }

        }
    }
    //generate HTML with data

    //if name was not found:
    if (found == 0) {
        showDiv("searchContainer");
        showDiv("repeatContainer");
        document.getElementById("searchContainer").innerHTML = "<br>Õpilast ei leitud.";
        document.getElementById("repeatContainer").innerHTML = "<br>Korduste arv: " + count;
        prevName = "";
    }
        //if the pupil.proge was changed to true before, it will check the checkbox after searching
        if (pupils[arrayPosition].proge == true) {
            document.getElementById("progre").checked = true;
        }
        showDiv("repeatContainer");
        document.getElementById("repeatContainer").innerHTML = "<br>Korduste arv: " + count;
    };
/**
 * Clears the table element for reconstruction
 * @author Alar Aasa <alar@alaraasa.ee>
 * @function
 */
function resetTable(){
    document.getElementById("students").innerHTML = "";
}

/**
 * First, it deletes the content of the table.
 * If the table is shown and the function is called with "true" parameter, it hides the table.
 * Otherwise, it generates a new table from the "pupils" array.
 * @author Alar Aasa <alar@alaraasa.ee>
 * @function
 * @param {boolean}hideStatus
 */
function showTable(hideStatus) {
    //Clears the table div of everything, otherwise table wont update correctly
    resetTable();
    //if parameter=true, then hides the tableContainer div and changes the value of the table display button
    if (tableStatus == true && hideStatus == true) {
        document.getElementById("displayButton").value = "Kuvan kogu nimekirja";
        hideDiv("tableContainer");
        tableStatus = false;
    } else {
        //creates the table
        tableStatus = true;
        document.getElementById("displayButton").value = "Peidan nimekirja"; //changing the value of the display button
        showDiv("tableContainer"); //unhides the tableContainer div
        var table = document.getElementById("students"); //students = HTML <table id="students">
        //sort pupils by first name
        sortArray("firstName");
        //creates the caption
        var caption = table.createCaption();
        caption.innerHTML = "Õpilaste progemisoskus";
        //creates <thead> with two cells
        var header = table.createTHead();
        var trow = header.insertRow(0);
        trow.insertCell(0).innerHTML = "<b>Eesnimi</b>";
        trow.insertCell(1).innerHTML = "<b>Perenimi</b>";
        trow.insertCell(2).innerHTML = "<b>Kas oskab progeda?</b>";
        //creates table, the for cycle populates with one row per pupil and 2 cells per row
        var abody = table.createTBody();
        for (var j = 0; j < pupils.length; j++) {
            Brow = abody.insertRow(j);
            bCell1 = Brow.insertCell(0);
            bCell2 = Brow.insertCell(1);
            bCell3 = Brow.insertCell(2);
            bCell1.innerHTML = pupils[j].firstName;
            bCell2.innerHTML = pupils[j].lastName;
            if (pupils[j].proge == true) { //if .proge is true, make that cell green
                bCell3.bgColor = "Green";
            }
        }
        //generates the <tfoot> with one row and one cell that spans two columns
        var footer = table.createTFoot();
        var fRow = footer.insertRow(0);
        var fCell = fRow.insertCell(0);
        fCell.setAttribute("colspan", 3);
        fCell.innerHTML = "Kokku " + pupils.length + " õpilast.";
    }
}

/**
 * Changes the pupils array - firstName and lastName
 * If specified, adds the proge property to a pupil
 * If a table is shown, regenerates the table
 * @author Alar Aasa <alar@alaraasa.ee>
 * @function
 */
var editProge = function() {
    //edits the pupils array
    //data from form is put into a variable for saving'
    var newName = document.getElementById("formInput").value;
    var newNameStatus = true;
    if (newName == "" || newName == undefined){
        newNameStatus = false;
    }
    newName = newName.trim(); //removes the whitespaces from beginning and end
    var newProgre = document.getElementById("progre").checked; //status of the checkbox
    var newFirstName;
    var newNameArray = newName.split(" ");
    console.log("editProge prevName: " + prevName);
    //filling new first and last name
    if (namePlace == true && newNameStatus == true){ //firstName was searched AND newName is not blank
        if (newNameArray.length > 1){
            pupils[arrayPosition].lastName = newNameArray[newNameArray.length-1];
            newNameArray.pop();
        }
        newFirstName = newNameArray.join(" ");
        pupils[arrayPosition].firstName =  newFirstName;
        pupils[arrayPosition].proge = newProgre;
        prevName = newFirstName;
    } else if (namePlace == false && newNameStatus == true){ //lastName was searched AND newName is not blank
        if (newNameArray.length > 1) { //more than one word, that means the last word is lastName, rest is firstName
            pupils[arrayPosition].lastName = newNameArray[newNameArray.length-1];
            newNameArray.pop();
            newFirstName = newNameArray.join(" ");
            pupils[arrayPosition].firstName =  newFirstName;
            pupils[arrayPosition].proge = newProgre;
            prevName = pupils[arrayPosition].lastName;

        } else { //only last name
            console.log("arrayPosition at 380: " + arrayPosition);
            pupils[arrayPosition].lastName = newNameArray[0];
            pupils[arrayPosition].proge = newProgre;
            prevName = pupils[arrayPosition].lastName;
        }
    } else if (newNameStatus == false) { //newName is blank, change only proge
        pupils[arrayPosition].proge = newProgre;
    }
    //generate HTML with data
    document.getElementById("changeContainer").innerHTML = "<br>Õpilase " + prevName + " andmed muudetud.";
    showDiv("changeContainer");
    showDiv("repeatContainer");

    //if the table is shown, then recreates the table without hiding it
    if (tableStatus == true) {
        showTable(false);
    }

    searchName();
};
