var pupils = [{
        firstName: "kaire",
        lastName: "ojastu"
    }, {
        firstName: "raiko",
        lastName: "ojaste"
    }, {
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

 //Binary search. Compares the input string to pupils.lastName and then pupils.firstName
 function searchName(){
    var query = document.getElementById("formInput").value;
     query = query.toLowerCase();
     console.log("ženja");
     if (query == "ženja" || query == "Ženja"){ query = "Å¾enja";}
     if (query == "ženja") query = "ženja";
     var count = 0;
    var begin = 0;
    var found = -1;
    var middle = Math.floor(pupils.length/2);
    var last = pupils.length-1;

    // slort by last name
    pupils.sort(function(a, b){
        var nameA=a.lastName.toLowerCase(), nameB=b.lastName.toLowerCase()
        if (nameA < nameB) //sort string ascending
            return -1
        if (nameA > nameB)
            return 1
        return 0 //default return value (no sorting)
    });

     // debug
    console.log(pupils);
    console.log("Begin: " + begin + " Middle: " + middle + " Last: " + last);
    console.log("Pupils[" + middle + "].lastName ==" + pupils[8].lastName);
    console.log("Query: " + query);
    console.log("s"<"p"); //true
    console.log("Math.floor(0.5) == " + Math.floor(0.5));

    while (begin!=middle || last!=middle) {
        console.log(pupils[middle].lastName + " . " + query + " . " + middle);
        middle = Math.floor(middle);
        if (pupils[middle].lastName == query) {
            found = 1;
            console.log("Found");
            break;
        } else if (middle == 8 || middle == 0 || begin == middle || last == middle || begin == last) {
            found = 0;
            break;
        } else if (pupils[middle].lastName > query) {
            count++;
            begin = begin;
            last = middle;
            middle = (last + begin) / 2;
            if (middle == 0.5) middle = 0;
            middle = Math.floor(middle);
        } else if (pupils[middle].lastName < query) {
            count++;
            last = last;
            begin = middle;
            middle = (last + begin) / 2;
            if (middle == 7.5) middle = 8;
            middle = Math.floor(middle);
        }
    }
    // sort by first name, so that the table will be correct later
    pupils.sort(function(a, b){
         nameA=a.firstName.toLowerCase(), nameB=b.firstName.toLowerCase()
        if (nameA < nameB) //sort string ascending
            return -1
        if (nameA > nameB)
            return 1
        return 0 //default return value (no sorting)
    });
    console.log(pupils);
    //if search by last name failed, then search by first name
    if (found == 0) {
        console.log("Here2");
        //Parameetrite taastamine algväärtusteks
        begin = 0;
        middle = Math.floor(pupils.length / 2);
        last = pupils.length - 1;
        while (begin != middle || last != middle) {
            console.log(pupils[middle].firstName + " . " + query);
            middle = Math.floor(middle);
            if (pupils[middle].firstName == query) {
                found = 1;
                console.log("Found");
                break;
            } else if (middle == 8 || middle == 0 || begin == middle || last == middle || begin == last) {
                found = 0;
                break;
            } else if (pupils[middle].firstName > query) {
                count++;
                begin = begin;
                last = middle;
                middle = (last + begin) / 2;
                if (middle == 0.5) middle = 0;
                middle = Math.floor(middle);
            } else if (pupils[middle].firstName < query) {
                count++;
                last = last;
                begin = middle;
                middle = (last + begin) / 2;
                if (middle == 7.5) middle = 8;
                middle = Math.floor(middle);
            }
        }
    }

     //generate HTML with data
    if (found == 1) {
        document.getElementById("kordused").innerHTML = "Korduste arv: " + count;
    } else if (found == 0) {
        document.getElementById("kordused").innerHTML = "Opilast ei leitud. <br/>" + "Korduste arv: " + count;

    }

};

 // Function  that first generates the table with names and progre, then shows it in HTML.
function clickList() {
    createTable();
    displayList();
}
function displayList(){
    //If #tabel is hidden, sets #progre,#label1,#save, #tabel .display to inline and changes button text. And vice versa.
    if (document.getElementById("tabel").style.display == "none")
    {
        document.getElementById("progre").style.display = "inline";
        document.getElementById("label1").style.display = "inline";
        document.getElementById("save").style.display = "inline";
        document.getElementById("tabel").style.display = "inline";
        document.getElementById("display").value = "Peidan nimekirja";
    //vastupidi eelmisele
    } else {
        document.getElementById("label1").style.display = "none";
        document.getElementById("save").style.display = "none";
        document.getElementById("tabel").style.display = "none";
        document.getElementById("progre").style.display = "none";
        document.getElementById("display").value = "Kuvan kogu nimekirja";

    }
};
function createTable() {
    for (var i=0; i>pupils.length; i++){
        if(typeof(pupils[i].proge) == "undefined"){
            pupils[i].proge = "";
        };

        var table = document.getElementById("tabel");
        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);

        cell1.innerHTML = pupils[i].firstName;
        cell2.innerHTML = pupils[i].proge;
    }
}
function changeData() {

}