/**
 * @author Juhan Kõks
 */
/**
 * puplis raw data and coder field
 */
var pupils = [ {
	firstName : "kaire",
	lastName : "ojastu",
	coder: false
}, {
	firstName : "raiko",
	lastName : "ojaste",
	coder: false
}, {
	firstName : "eleri",
	lastName : "apsolon",
	coder: false
}, {
	firstName : "sander",
	lastName : "mets",
	coder: false
}, {
	firstName : "maarika",
	lastName : "erika",
	coder: false
}, {
	firstName : "kristen",
	lastName : "aeg",
	coder: false
}, {
	firstName : "keijo",
	lastName : "palts",
	coder: false
}, {
	firstName : "ingmar",
	lastName : "nurmiste",
	coder: false
}, {
	firstName : "ženja",
	lastName : "fokin",
	coder: false
} ];

/**
 * sorting
 */
pupils.sort(function(a,b){
	return a.lastName.localeCompare(b.lastName);
});

/**
 * Controller controlls the logic 
 */

function controller(){
	/**
	 * We call binarysearch method
	 */
	var bc=binarySearch();
	/*
	 * if student is in our array then show the ui and save the key
	 */
	if (bc!=-1){
		document.getElementById("answer").style.display = "block";
		document.getElementById("counter").style.display = "block";
		var node=document.getElementById("info");
		node.style.display="block";
		node.innerHTML="";
   	    keySaver(bc);
   	    coderChecker();
	}
	/*
	 * if not, then show "No such student"
	 */
	else {
		document.getElementById("counter").style.display = "block";
		var node=document.getElementById("info");
		node.style.display="block";
		node.innerHTML="Sellist õpilast pole";
		document.getElementById("answer").style.display = "none";
		document.getElementById("key").style.display = "none";
	}
}
/**
 * Binary search
 */
var binarySearch=function(){
	/*
	 * mi - minimum point
	 * mx - maximum point
	 * ci - current index
	 * ce - current element
	 * se - search element
	 * count - counting loops
	 * return the index of an element
	 */
	var se=document.getElementById("name").value;
	var mi=0;
	var mx=pupils.length-1;
	var ci;
	var ce;
	var count=0;
	
	 while (mi <= mx) {
		    count++;
	        ci = Math.floor((mi + mx) / 2);
	        ce = pupils[ci]["lastName"];
	        if (ce < se) {
	            mi = ci+ 1;
	        }
	        else if (ce>se) {
	            mx = ci - 1;
	        }
	        else {
	       	    loopCounter(count);
	            return ci;
	        }
	    	

	    }
	    loopCounter(count);
	    return -1;
	
	
};

/**
 * This writes loops into DOM
 */
var loopCounter=function(counter){
	var node=document.getElementById("counter");
	node.innerHTML="Korduste arv: "+counter;	
}

/**
 * This writes key into DOM
 */
var keySaver=function(key){	
	var node=document.getElementById("key");
	node.value=key;
}
/**
 * This saves the data
 */
var save=function(){
	var name=document.getElementById("name").value;
	var coder=document.getElementById("coder").checked;
	var key=document.getElementById("key").value;
	/*
	 * if name field is not empty, then we update it
	 */
	if(name)
		{
		pupils[key]["lastName"]=name;
		}
	pupils[key]["coder"]=coder;
	var updateInfo=document.getElementById("info");
	updateInfo.innerHTML="Õpilase "+pupils[key]["lastName"]+" andmed on muudetud.";
	showList();
	makeRequest("POST");
}
/**
 * This toggles the show/hide control
 */
var toggleShow=function(){
	var table = document.getElementById("table");
	var b=document.getElementById("buttonShow");
	if (table.style.display != 'block') { 
		showList();
	    table.style.display="block";
		b.innerHTML="Peidan nimekirja.";
		}
	else{
		table.style.display="none";
		b.innerHTML="Kuvan kogu nimekirja.";	
	}
	
}
var showList=function(){
	/*
	 * cleans table
	 */
	var table = document.getElementById("tbody");
	table.innerHTML="";
	var len=pupils.length;
	/*
	 * populates table body with data
	 */
	for(var i=0;i<len;i++){
	var row=table.insertRow(i);
	var cell0=row.insertCell(0);
	var cell1 = row.insertCell(1);
	var cell2=row.insertCell(2);
    cell0.innerHTML= pupils[i]["firstName"];
	cell0.style.backgroundColor="cyan";
	cell1.innerHTML = pupils[i]["lastName"];
	if(i%2!=0){
		cell0.style.backgroundColor="red";
		cell1.style.backgroundColor="red";
		cell2.style.backgroundColor="red";
		}
	
	if(pupils[i]["coder"]==true){
		cell2.style.backgroundColor="green";
	}
	cell2.innerHTML="";

		}
	/*
	 * populates table footer
	 */
	var tfooter=document.getElementById("tfooter");
	tfooter.innerHTML="Kokku "+len+" õpilast";	
}

/**
 * If coder is true, then checkbox must be checked
 */
var coderChecker=function(){
	var key=document.getElementById("key").value;
	if(pupils[key]["coder"]==true)
		{
		document.getElementById("coder").checked = true;
		}
	else{
		document.getElementById("coder").checked = false;
	}
}
/**
*makerequest Controlling AJAX requests
*/
var makeRequest=function(params){
	 var xhttp = new XMLHttpRequest();
	 if(params=="GET"){
	xhttp.onreadystatechange = function() {
	if (xhttp.readyState == 4 && xhttp.status == 200) {
		var input = xhttp.responseText;
		var parsed = JSON.parse(input);
		pupils = Object.keys(parsed).map(function(key) {
			return parsed[key]
		});
		pupils.sort(function(a,b){
			return a.lastName.localeCompare(b.lastName);
		});
        controller();	
}
	  };
	xhttp.open("GET", "opilased.php", true);
	xhttp.send();

	 }
	 else if(params=="POST"){
			var data = JSON.stringify(pupils);
     		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
		}
			    
			  }; 
			xhttp.open("POST", "opilased.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send();

	 } 
}