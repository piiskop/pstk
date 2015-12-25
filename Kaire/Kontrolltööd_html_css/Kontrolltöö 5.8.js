/**
 * @var the raw data of pupils
 * @author Kaire <kaire.ojastu@gmail.com>
 */

var pupils =
[ {
	firstName : "kaire",
	lastName : "ojastu"
}, {
	firstName : "raiko",
	lastName : "ojaste"
}, {
	firstName : "eleri",
	lastName : "apsolon"
}, {
	firstName : "sander",
	lastName : "mets"
}, {
	firstName : "maarika",
	lastName : "erika"
}, {
	firstName : "kristen",
	lastName : "aeg"
}, {
	firstName : "keijo",
	lastName : "palts"
}, {
	firstName : "ingmar",
	lastName : "nurmiste"
}, {
	firstName : "ženja",
	lastName : "fokin"
} ];


/**
 * binaarse otsingu kordused
 * @author Kaire <kaire.ojastu@gmail.com>
 */
var count = 0;//korduste arv
/**
 * binaarne otsing eesnime järgi, et leida õpilane
 * @author Kaire <kaire.ojastu@gmail.com>
 */
var binary = function(){
	pupils.sort(function(a,b){//sordib õpilased eesnime järgi
	return a.firstName.localeCompare(b.firstName);
});
    /* 
     * se = search element
     * mi = minIndex - alguspunkt
     * mx = maxIndeks - lõpp-punkt
     * ci = currentIndex - praegune indeks
     * ce = currentElement - praegune element
     * count = sammulugeja 
     */
	var se = document.getElementById('frame').value;//element id-järgi
    var count = 0;
	var mi = 0;
    var mx = pupils.length - 1;
    var ci;
    var ce;
    while (mi <= mx) {//kui alguspunkt on väiksem/võrdne lõpp-punkt
    	count++;//suurendab kordust ühe võrra
    	ci = Math.floor((mi + mx) / 2 );//otsingu keskpunkt
    	console.log(ci);
		console.log(pupils[ci]);
		ce = pupils[ci]["firstName"];//eesnimede keskpunkti väärtus
        if (pupils[ci].firstName < se) {
        	mi = ci + 1;
        }
        else if (pupils[ci].firstName > se) {
        	mx = ci - 1;
        }
        else {
		document.getElementById('leitud').style.display = 'block';//element id-järgi//näitab
		document.getElementById('eiLeitud').style.display = 'none';//element id-järgi//peidab
		document.getElementById('kordus').innerHTML = "Korduste arv: "+ count;//sisemise teksti väärtus//näitab korduste arvu
		count = 0;//kordus
		var checkboxProgInput = document.getElementById("checkboxProgInput");
		return ci;//lõpetab funktsiooni
		checkboxProgInput.checked = false;//nullib kui checkbox on kontrollitud
	}
	if (mi > mx) {//kui tulemust ei leitud eesnimede hulgast
		pupils.sort(function(a, b) {//sordib õpilased perekonnanime järgi 
		return a.lastName.localeCompare(b.lastName);
		});
		console.log(pupils);
		binary2();//kutsub välja teise binaarse otsingu
		}
    }
}
/**
 * binaarne otsing perekonnanime järgi, et leida õpilane
 * @author Kaire <kaire.ojastu@gmail.com>
 */
		/* 
		 * se = search element
		 * mi = minIndex - alguspunkt
		 * mx = maxIndeks - lõpp-punkt
		 * ci = currentIndex - praegune indeks
		 * ce = currentElement - praegune element
		 * count = sammulugeja 
		 */
var binary2 = function(){//sordib õpilased perekonnanime järgi kui eesnime järgi ei leia
		var se = document.getElementById("frame").value;//element id-järgi
	    var count = 0;
	    var mi = 0;
	    var mx = pupils.length - 1;
	    var ci;
	    var ce;

	    while (mi <= mx) {//kui alguspunkt on väiksem/võrdne lõpp-punkt
	    	count++;//suurendab kordust ühe võrra
	    	ci = Math.floor((mi + mx) / 2 );//otsingu keskpunkt
	    	ce = pupils[ci]["lastName"];//keskpunkti väärtus
	    	if (pupils[ci].lastName < se) {
	        	mi = ci + 1;
	        }
	        else if (pupils[ci].lastName > se) {
	        	mx = ci - 1;
	        }
	        else {
			document.getElementById('leitud').style.display = 'block';//element id-järgi//näitab
			document.getElementById('eiLeitud').style.display = 'none';//element id-järgi//peidab
			document.getElementById('kordus').innerHTML = "Korduste arv: " + count;//sisemise teksti väärtus//näitab korduste arvu 
			count = 0;//kordus
			var checkboxProgInput = document.getElementById("checkboxProgInput");
			return ci;
			checkboxProgInput.checked = false;
	    }
		if (mi > mx) {
			document.getElementById('leitud').style.display = 'none';//element id-järgi//peidab
			document.getElementById('eiLeitud').style.display = 'block';//element id-järgi//näitab
			document.getElementById('kordus').innerHTML = "Korduste arv: "+ count;//sisemise teksti väärtus//näitab korduste arvu
			count = 0;//korduste arv
		}
	}
}
	/**
	 * salvestamine
	 * @author Kaire <kaire.ojastu@gmail.com>
	 */

function save (){//salvestamine
		/* ci = currentIndex - praegune indeks
	 	*/
   		var ci;
		var checkboxProgInput = document.getElementById('checkboxProgInput');//element id-järgi
		var inputElement = document.getElementById('frame');//element id-järgi
		if (checkboxProgInput.checked === true) { 		
			pupils[ci].canCode = 'yes';
		} else {
			pupils[ci].canCode = 'no';
		};
		var a = inputElement.value;
		s = a.trim();
		var ci;
		if(!s){
			console.log("Tühja nime ei salvestata, palun sisesta nimi!");
		}
		else if (foundIt === "byFirstName"){
			console.log(foundIt);
			pupils[ci]["firstName"] = s;
		} else if (foundIt === "byLastName") {
			console.log(foundIt);
			pupils[ci]["lastName"] = s;
		}
	if (s.indexOf(' ') === -1 && s === pupils[ci].firstName) {
		pupils[ci]["firstName"] = s;
		andmeteMuutmine.style.display = 'block';
		andmeteMuutmine.innerHTML = "Õpilase " + s + " andmed muudetud.";
	} else if (s.indexOf(' ') === -1 && s === pupils[ci].lastName) {
		pupils[ci]["lastName"] = s;
		andmeteMuutmine.style.display = 'block';
		andmeteMuutmine.innerHTML = "Õpilase " + s + " andmed muudetud.";
	} else if (s.indexOf(' ') > 0) {
		a = s.lastIndexOf(' ');
		pupils[ci]["firstName"] = s.substring(0, a);
		pupils[ci]["lastName"] = s.substring(a + 1);
		andmeteMuutmine.style.display = 'block';
		andmeteMuutmine.innerHTML = "Õpilase " + s + " andmed muudetud.";
	}
	console.log(pupils[ci]);
	console.log(pupils);
}
	