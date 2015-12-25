/**
 * @author kristen:sepp <seppkristen@gmail.com>
 * @var the raw data of pupils
 */
var pupils =[{
	firstname: "kaire",
	lastname: "ojastu",
	progeb: "ei"
},{
	firstname: "raiko",
	lastname: "ojaste",
	progeb: "ei"
},{
	firstname: "eleri",
	lastname: "apsolon",
	progeb: "ei"
},{
	firstname: "sander",
	lastname: "mets",
	progeb: "ei"
},{
	firstname: "maarika",
	lastname: "erika",
	progeb: "ei"
},{
	firstname: "kristen",
	lastname: "aeg",
	progeb: "jah"
},{
	firstname: "keijo",
	lastname: "palts",
	progeb: "ei"
},{
	firstname: "ingmar",
	lastname: "nurmiste",
	progeb: "ei"
},{
	firstname: "ženja",
	lastname: "fokin",
	progeb: "ei"
} ];
// muutujad mis loevad endasse html elemendid
var searchresult = document.getElementById("searchresult");
var nr = document.getElementById("nr");
var fname = document.getElementById("fname");
var lname = document.getElementById("lname");
var kordus = document.getElementById("kordused");
var save = document.getElementById("save");
var progeja = document.getElementById("progeja");
var show = "no";
var currentIndex;
// funktsioon et peita erinevaid html elemente
function peida(id){document.getElementById(id).style.visibility="hidden"};
// peidab lehe laadimisel html elemendi progeb
peida("progeb");
// funktsioon et muuta peidetud html elemendid tagasi nähtavaks
function näita(id){document.getElementById(id).style.visibility = "visible";};
// funktsioon et muuta html elemendi sisu tühjaks
function clear(id){document.getElementById(id).innerHTML = "";};
// sorteerime tabeli tähestikulisse järjekorda
pupils.sort(function(a, b) {
	return a.firstname.localeCompare(b.firstname);
});
// funktsioon mis tühjendab tabeli sisu
function puhastatabel(){
		clear("tabel");
};
// funktsioon mis värvib tabelis tausta
function background(x){
	if (pupils[i].progeb==="jah"){
		x.setAttribute("bgcolor", "#00FF00");
	} else {
		x.setAttribute("bgcolor", "#B6B6B4");
	};
};
// funktsioon mis loob nimekirjast tabeli ja lisab sellele värvid
function showpupils(){
	var x = document.createElement("TABLE");
    x.setAttribute("id", "tabel");
    document.body.appendChild(x);
    if (show==="yes"){
    	puhastatabel();
    }
	for (i=0;i<pupils.length;i++){
		var y = document.createElement("TR");
		y.setAttribute("id", "myTr"+[i]);
	    document.getElementById("tabel").appendChild(y);
		var znr = document.createElement("TD");
		znr.setAttribute("id", "myTd"+[i]);
		background(znr);
		var zfname = document.createElement("TD");
		zfname.setAttribute("id", "myTd"+[i]);
		background(zfname);
		var zlname = document.createElement("TD");
		zlname.setAttribute("id", "myTd"+[i]);
		background(zlname);
	    var nr = document.createTextNode(i+1);
	    var fname = document.createTextNode(pupils[i].firstname);
	    var lname = document.createTextNode(pupils[i].lastname);
	    znr.appendChild(nr);
	    zfname.appendChild(fname);
	    zlname.appendChild(lname);
	    document.getElementById("myTr"+[i]).appendChild(znr);
	    document.getElementById("myTr"+[i]).appendChild(zfname);
	    document.getElementById("myTr"+[i]).appendChild(zlname);
	};
	show = "yes";
};
// funktsioon mis kontrollib kas õpilane on progeja või mitte
function progeb(){
	var progebox = document.getElementById("progebox");
	if (progebox.checked===true){
		progebox.checked=true;
		pupils[currentIndex].progeb="jah";
		progeja.innerHTML= pupils[currentIndex].firstname + " " + pupils[currentIndex].lastname + " on progeja";
	} else {
		progebox.checked=false;
		pupils[currentIndex].progeb="ei";
		progeja.innerHTML= pupils[currentIndex].firstname + " " + pupils[currentIndex].lastname + " ei ole progeja";
	}
}
// otsingu funktsioon
function otsingFirstname(){
	pupils.sort(function(a, b) {
		return a.firstname.localeCompare(b.firstname);
	});
	searchname = document.getElementById("searchname").value;
	steps = 0;
	clear("save");
	clear("progeja");
	minIndex = 0;
	maxIndex = pupils.length - 1;
    var currentElement;
 
    while (minIndex <= maxIndex) {
        currentIndex = (minIndex + maxIndex) / 2 | 0;
        console.log(currentIndex + "line 129");
        currentFirstname = pupils[currentIndex].firstname;
        currentLastname = pupils[currentIndex].lastname;
        console.log(steps + "line 132");
        steps++;
        if (currentFirstname < searchname) {
            minIndex = currentIndex + 1;
        }
        else if (currentFirstname > searchname) {
            maxIndex = currentIndex - 1;
        }
        else if (currentFirstname === searchname) {
			searchresult.innerHTML = "Leitud " + searchname + "</br>";
			searchresult.innerHTML += currentFirstname + " " +currentLastname;
			kordus.innerHTML = "Otsingute arv: " + steps;
			foundby = "eesnimi";
			näita("progeb");
			if (pupils[currentIndex].progeb === "jah"){
				progebox.checked = true;
				break;
			}else{
				progebox.checked = false;
				break;
			}
        }
        else {
            return currentIndex;  
        }
    searchresult.innerHTML = "Sellist õpilast pole";
	kordus.innerHTML = "Korduste arv: " + steps;
	peida("progeb");
    }
    return -1;
    console.log("error177")
}
function otsingLastname(){
	pupils.sort(function(a, b) {
		return a.lastname.localeCompare(b.lastname);
	});
	searchname = document.getElementById("searchname").value;
	steps = 0;
	clear("save");
	clear("progeja");
	minIndex = 0;
	maxIndex = pupils.length - 1;
    var currentElement;
 
    while (minIndex <= maxIndex) {
        currentIndex = (minIndex + maxIndex) / 2 | 0;
        console.log(currentIndex + " CurrentIndex line 179");
        currentFirstname = pupils[currentIndex].firstname;
        currentLastname = pupils[currentIndex].lastname;
        console.log(steps + " line 181");
        steps++;
        if (currentLastname < searchname) {
            minIndex = currentIndex + 1;
        }
        else if (currentLastname > searchname) {
            maxIndex = currentIndex - 1;
        }
        else if (currentLastname === searchname) {
			searchresult.innerHTML = "Leitud " + searchname + "</br>";
			searchresult.innerHTML += currentFirstname + " " +currentLastname;
			kordus.innerHTML = "Otsingute arv: " + steps;
			foundby = "perenimi";
			näita("progeb");
			if (pupils[currentIndex].progeb === "jah"){
				progebox.checked = true;
				break;
			}else{
				progebox.checked = false;
				break;
			}
        }
        else {
            return currentIndex;  
        }
    searchresult.innerHTML = "Sellist õpilast pole";
	kordus.innerHTML = "Korduste arv: " + steps;
	peida("progeb");
    }
    return -1;
    console.log("error211")
}
function salvesta(){
	searchname = document.getElementById("searchname").value;
	bits = searchname.split(/[\s,]+/);
	console.log(bits);
	if (foundby==="eesnimi" && bits[0]!= ""){
		originalFname = pupils[currentIndex].firstname;
		originalLname = pupils[currentIndex].lastname;
		pupils[currentIndex].firstname = bits[0];
		save.innerHTML= originalFname + " " + originalLname + " is now changed to " + pupils[currentIndex].firstname + " " + pupils[currentIndex].lastname;
		if (bits.length>1){
			pupils[currentIndex].lastname=bits[1];
			save.innerHTML= originalFname + " " + originalLname + " is now changed to " + pupils[currentIndex].firstname + " " + pupils[currentIndex].lastname;
		};
	} else if (foundby==="perenimi" && bits[0]!= ""){
		originalFname = pupils[currentIndex].firstname;
		originalLname = pupils[currentIndex].lastname;
		pupils[currentIndex].lastname = bits[0];
		save.innerHTML= originalFname + " " + originalLname + " is now changed to " + pupils[currentIndex].firstname + " " + pupils[currentIndex].lastname;
		if (bits.length>1){
			pupils[currentIndex].firstname=bits[0];
			pupils[currentIndex].lastname=bits[1];
			save.innerHTML= originalFname + " " + originalLname + " is now changed to " + pupils[currentIndex].firstname + " " + pupils[currentIndex].lastname;
		};
	};
	progeb();
}
