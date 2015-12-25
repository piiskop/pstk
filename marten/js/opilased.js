/**
 * This script represents a class of pupils and contains functions to search
 *  individuals within the class, change their information, and enable and disable
 *  the HTML elements containing data, notices and forms.
 *  @author marten<marten@kahr.ee>
 */

/**
 * Represents a class of pupils
 * @author marten<marten@kahr.ee>
 */

var pupils = [ {
	firstName: "kaire",
	lastName: "ojastu"
},{
	firstName: "raiko",
	lastName: "ojaste"
},{
	firstName: "eleri",
	lastName: "apolson"
},{
	firstName: "sander",
	lastName: "mets"
},{
	firstName: "maarika",
	lastName: "erika",
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
},];
/**
 * Represents the most recently searched name
 */
var recentName = "";
/**
 * Represents the current state of the table produced by listAll function
 */
var tableDisplayed = false;
/**
 * Sorts pupils array
 * @author marten<marten@kahr.ee>
 * @function
 * @param {string} type
 */
var nameSort = function(type) { //pupils sorteerimine
	if (type == "lastName") {
		pupils.sort(function(a, b) {
			return a.lastName.localeCompare(b.lastName);
		});
	}
	else {
		pupils.sort(function(a, b) {
			return a.firstName.localeCompare(b.firstName);
		});
	}
}
nameSort("lastName"); //Sorteerimine leheküle laadimisel
/**
 * Hides HTML div elements
 * @author marten<marten@kahr.ee>
 * @function
 */
var divDisable = function() { //Plokkide peitmise talitlus
	document.getElementById("formBContainer").style.display = 'none'; //Peidab salvestamise vormi
	document.getElementById("saveNoticeContainer").style.display = 'none'; //Peidab salvestamise teavituse ("Andmed muudetud") 
	document.getElementById("searchNoticeContainer").style.display = 'none'; //Peidab otsingu teavituse
	document.getElementById("repeatNoticeContainer").style.display = 'none'; //Peidab korduste teavituse
	//document.getElementById("tableContainer").style.display = 'none';
}
/**
 * Hides the tableContainer HTML div element
 * @author marten<marten@kahr.ee>
 * @function
 */
var tableDisable = function () { //Peidab nimekirja tabeli
	document.getElementById("tableContainer").style.display = 'none';
}
/**
 * Clears outdated content from table
 * @author marten<marten@kahr.ee>
 * @function
 */
var cleanTable = function() { //Puhastab tabeli sisu
	document.getElementById("listTable").innerHTML = "";
}
/**
 * Enables one or more hidden div elements based on parameter d
 * @author marten<marten@kahr.ee>
 * @function
 * @param {integer} d
 */
var divEnable = function(d) { //Plokkide näitamise talitlus
	switch (d) {
	case 0: //Näidatakse kõik peidetud elemendid
		document.getElementById("formBContainer").style.display = 'block';
		document.getElementById("saveNoticeContainer").style.display = 'block';
		document.getElementById("searchNoticeContainer").style.display = 'block';
		document.getElementById("repeatNoticeContainer").style.display = 'block';
		break;
	case 1: //Näidatakse salvestamise vorm
		document.getElementById("formBContainer").style.display = 'block';
		break;
	case 2: //Näidatakse salvestamise teavitus
		document.getElementById("saveNoticeContainer").style.display = 'block';
		break;
	case 3: //Näidatakse otsingu teavitus
		document.getElementById("searchNoticeContainer").style.display = 'block';
		break;
	case 4: //Näidatakse korduste teavitus
		document.getElementById("repeatNoticeContainer").style.display = 'block'; 
		break;
	case 5: //Näidatakse nimekirja tabel
		document.getElementById("tableContainer").style.display = 'block';
		break;
	default:
		break;
	}
}
/**
 * Searches through array to find element matching text from HTML form
 * @author marten<marten@kahr.ee>
 * @function
 */
var search = function() { //Otsib massivist ees- ja perekonnanime järgi
	divDisable();
	var key = document.getElementById("nameInput").value; //Otsingu võti võetakse HTML vormi lahtrist
	var c = 0; //Korduse arv
	var l = pupils.length - 1; //Massiivi viimane indeks
	var m = Math.floor(l/2); //Valitud element
	var success = false;
	document.getElementById("progInput").checked = false;
	//Otsing lastName järgi
	for (; m>=0 && m<=l;c++) {
		console.log("m is" + m);
		if (pupils[m]["lastName"] == key) { //Kui väärtus leitud
			divEnable(1); //Näitab salvestamise vormi
			recentName = key; //Salvestab viimati otsitud nime muutujasse salvestamise protsessis kasutamiseks
			if (pupils[m]["prog"]) { //Kui leitud isik oskab programmeerida
				document.getElementById("progInput").checked = true //Pannakse märk programmeerimise kasti
				success = true; //Tõeväärtus, mis näitab, et edasi pole vaja otsida.
			}
			else { //Kui ei oska programmeerida, pannakse ainult tõeväärtus
				success = true;
			}
		}
		if (pupils[m]["lastName"] > key) { //Kui otsitav on praegusest lahtrist tähestikus madalamal
			if (m == 0 ) { break } //Käesolev lahter on juba massiivi esimene, tsükkel lõpetatakse
			m = Math.floor(m/2); //Käesolev asukoht jagatakse kahega ja ümardatakse alla.
		}
		if (pupils[m]["lastName"] < key) { //Kui otsitav on praegusest lahtrist tähestikus kõrgemal
			if (m == l ) { break } //Käesolev lahter on juba massiivi viimane või massiivist väljunud, tsükkel lõpetatakse
			m = l - Math.floor((l-m)/2); //Võetakse uus massivi asukoht käesoleva ja massiivi lõpu vahel 
			if (m > l) break; 
		}
		if (success) { break; } //Otsitav isik on leitud, tsükkel lõpetatakse
		if (c > 3) { break; } //Loogiliselt maksimaalne korduste arv, tsükkel lõpetatakse

	}
	//Algab otsing eesnime järgi, loogika sisuliselt identne perenime järgi otsimisel.
	nameSort("firstName"); //Massiiv sorteeritakse firstName järgi
	m = Math.floor(l/2); //Asukoht massiivis lähestatakse keskele
	if (!success) { //Kui otsing pole juba lõppenud, hakatakse otsima
		c = 0; //Korduste arv lähestatakse
		for (; m>=0 && m<=l;c++) {
			if (pupils[m]["firstName"] == key) {
				divEnable(1); //Näitab salvestamise vormi
				recentName = key; //Salvestab viimati otsitud nime muutujasse  salvestamise protsessis kasutamiseks
				if (pupils[m]["prog"]) { //Kui leitud isik oskab programmeerida
					document.getElementById("progInput").checked = true
					success = true;
				}
				else {
					success = true;
				}
			}
			if (pupils[m]["firstName"] > key) {
				if (m == 0 ) { break; }
				m = Math.floor(m/2);
			}
			if (pupils[m]["firstName"] < key) {
				if (m == l ) { break; }
				m = l - Math.floor((l-m)/2);
				if (m > l) break; 
			}
			if (success) { break; }
			if (c>3) { break; } //Loogiliselt maksimaalne korduste arv, tsükkel lõpetatakse
		}

	}
	if (!success) { //Kui õpilast ei leitud nimekirjast
		divEnable(3); //Kuvatakse otsingu tulemuse teavitus
		document.getElementById("searchNoticeContainer").innerHTML = "Sellist õpilast pole"; //Teavitusse kirjutatakse, et õpilast ei leitud
		recentName = ""; //Unustatakse viimati otsitud nimi
	}
	document.getElementById("repeatNoticeContainer").innerHTML = "Korduste arv: " + c; //Teavitusalase sisestatakse korduste arv
	c = 0; //Lähestatakse korduste arv
	nameSort("lastName"); //Nimekiri sorteeritakse perenime järgi
	divEnable(4); //Näidatakse korduste arvu teavitus
	document.getElementById("nameInput").value = recentName; //Otsingu lahter eeltäidetakse hiljuti otsitud nimega
}
/**
 * Builds and displays table from data in array
 * @author marten<marten@kahr.ee>
 * @function
 * @param {bool} noupdate
 */
var listAll = function(noupdate) { //Kuvatakse nimekiri kõigi nimekirja liikmetega
	cleanTable(); //Puhastatakse tabel vanast sisust
	if (tableDisplayed && noupdate) { //Kui tabel on juba nähtaval ja seda ei uuendata, on tegemist "Peida Tabel" nupulevajutusega.
		tableDisable(); //Tabel Peidetakse
		document.getElementById("tableButton").innerHTML = "Kuvan kogu nimekirja"; //Muudetakse "Peida Tabel" nuputekst "Kuvan kogu nimekirja" nuputekstiks
		tableDisplayed = false;
	}
	else {
		divEnable(5);
		var t = document.getElementById("listTable");
		var l = pupils.length;
		var fRow = t.insertRow();
		fRow.className = "tableFirstRow";
		var fRowFNameCell = document.getElementsByTagName("tr")[0].insertCell();
		var fRowFNameText = document.createTextNode("First Name");
		fRowFNameCell.appendChild(fRowFNameText);
		var fRowLNameCell = document.getElementsByTagName("tr")[0].insertCell();
		var fRowLNameText = document.createTextNode("Last Name");
		fRowLNameCell.appendChild(fRowLNameText);
		fRow.appendChild(fRowFNameCell);
		fRow.appendChild(fRowLNameCell);
		for (i=1;i<=l;i++) { //Tsükkel käib üle kõik pupils massiivi elemendid
			var dRow = t.insertRow();
			i--; //Vähendab indeksit, et see vastaks pupils massivi indeksile
			var dRowFNameText = document.createTextNode(pupils[i]["firstName"]);
			var dRowLNameText = document.createTextNode(pupils[i]["lastName"]);
			if (pupils[i]["prog"]) { //Loob tingimusel klassiga tabelirea (roheline taust)
				i++; //Suurendab indeksit, et see vastaks html tabeli rea indeksile
				var dRowFNameCell = document.getElementsByTagName("tr")[i].insertCell();
				var dRowLNameCell = document.getElementsByTagName("tr")[i].insertCell();
				dRowFNameCell.appendChild(dRowFNameText);
				dRowLNameCell.appendChild(dRowLNameText);
				dRow.appendChild(dRowFNameCell);
				dRow.appendChild(dRowLNameCell);
				dRow.className = "progTrueRow";
			}
			else { //Luuakse tavaline tabelirida (kollane taust)
				i++; //Suurendab indeksit, et see vastaks html tabeli rea indeksile
				var dRowFNameCell = document.getElementsByTagName("tr")[i].insertCell();
				var dRowLNameCell = document.getElementsByTagName("tr")[i].insertCell();
				dRowFNameCell.appendChild(dRowFNameText);
				dRowLNameCell.appendChild(dRowLNameText);
				dRow.appendChild(dRowFNameCell);
				dRow.appendChild(dRowLNameCell);
			}
		}
		document.getElementById("tableButton").innerHTML = "Peidan nimekirja";
		tableDisplayed = true;
	}
	
}
/**
 * Saves input data to array
 * @author marten<marten@kahr.ee>
 * @function
 */
var saveProg = function () {
	var newName = document.getElementById("nameInput").value;
	var newProg = document.getElementById("progInput").checked;
	var newNameParsed = false;
	var success = false;
	if (newName) {
		//Parsing newName
		newName = newName.split(" ");
		var newLastName;
		var newFirstName;
		if (newName.length > 1) { //parse here if more than one word in newName
			newLastName = newName.pop();
			newFirstName = newName.join(" ");
			newNameParsed = true;
			console.log("241: Multiple new names: " + newLastName + ", " + newFirstName);
		}	//If there is only one word in newName, it will be parsed after 
		//entry in array is located
		//Locating array entry and replacing
		var c = 0; //Korduse arv
		var l = pupils.length - 1; //length of array
		var m = Math.floor(l/2); //current position in array
		//Search by firstName
		nameSort("firstName"); //Sort by firstName for search
		for (; m>=0 && m<=l;c++) {
			if (pupils[m]["firstName"] == recentName) {
				if (newName.length == 1 && !newNameParsed) {
					newFirstName = newName[0];
					newLastName = pupils[m]["lastName"];
					newNameParsed = true;
				}
				
				if (newProg) {
					pupils[m] =	{
							firstName: newFirstName,
							lastName: newLastName,
							prog: true
					};
					document.getElementById("nameInput").value = newFirstName;
					success = true;
					break;
				}
				else { 
					pupils[m] =	{
							firstName: newFirstName,
							lastName: newLastName,
							prog: false
					};
					document.getElementById("nameInput").value = newFirstName;
					success = true;
					break;
				}
			}
			if (pupils[m]["firstName"] > recentName) {
				if (m == 0 ) { break; }
				m = Math.floor(m/2);
			}
			if (pupils[m]["firstName"] < recentName) {
				if (m == l ) { break; }
				m = l - Math.floor((l-m)/2);
				if (m > l) break; 
			}
			if (c>=3) { break; }
		}
		//searching by lastName
		nameSort("lastName"); //Sort array by lastName
		m = Math.floor(l/2); //reset current position in array to middle
		if (!success) {
			for (; m>=0 && m<=l;c++) {
				if (pupils[m]["lastName"] == recentName) {
					if (newName.length == 1 && !newNameParsed) {
						newLastName = newName[0];
						newFirstName = pupils[m]["firstName"];
						newNameParsed = true;
					}
					if (newProg) {
						pupils[m] =	{
								firstName: newFirstName,
								lastName: newLastName,
								prog: true
						};
						document.getElementById("nameInput").value = newLastName;
						break;
					}
					else { 
						pupils[m] =	{
								firstName: newFirstName,
								lastName: newLastName,
								prog: false
						};
						document.getElementById("nameInput").value = newLastName;
						break;
					}
				}
				if (pupils[m]["lastName"] > recentName) {
					if (m == 0 ) { break; }
					m = Math.floor(m/2);
				}
				if (pupils[m]["lastName"] < recentName) {
					if (m == l ) { break; }
					m = l - Math.floor((l-m)/2);
					if (m > l) break; 
				}
				if (c>6) { break; } //Loogiliselt maksimaalne korduste arv
			}
		}
		document.getElementById("saveNoticeContainer").innerHTML = "Õpilase " + recentName + " andmed muudetud."
		document.getElementById("repeatNoticeContainer").innerHTML = "Korduste arv: " + c;
		c = 0;
		nameSort("lastName");
		
		divEnable(2);
		divEnable(4);
	}
	if (tableDisplayed) {
		listAll();	
	}
	postAJAX();
}
/**
 * A function to search with AJAX
 * @author marten<marten@kahr.ee>
 */
var makeRequest = function () {
	var input = document 
	if (input) {
		var httpRequest;
		httpRequest = new XMLHttpRequest();
		if (!httpRequest) {
			console.log('398: Giving up :(Cannot create an XMLHTTP instance)');
			return false;
		}
		httpRequest.onreadystatechange = function(){
				if (httpRequest.readyState === XMLHttpRequest.DONE) {
					if (httpRequest.status === 200) {
						var incomingJSON = httpRequest.responseText;
						var parsedJSON = JSON.parse(incomingJSON);
						pupils = Object.keys(parsedJSON).map(function(k) { return parsedJSON[k] });
						console.log("407: pupils updated with AJAX");
						nameSort("lastName");
						document.getElementById("progInput").checked = false;
						search();
						if (tableDisplayed) {
							listAll(false);
						}
					} else {
						console.log('409: There was a problem with the request.');
					}
				}
		};
		httpRequest.open('GET', "http://localhost/pstk/marten/php/opilased.php");
		httpRequest.send();
	}
}
/**
 * A function to save data to server with AJAX. Called from saveProg function
 * @author marten<marten@kahr.ee>
 */
var postAJAX = function() {
	var stringJSONData = JSON.stringify(pupils);
	var httpRequest = new XMLHttpRequest();
	if (!httpRequest) {
		console.log('398: Giving up :(Cannot create an XMLHTTP instance)');
		return false;
	}
	httpRequest.onreadystatechange = function(){
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
					console.log('439: Sent data to server with POST')
				} else {
					console.log('442: There was a problem with the request.');
				}
			}
	};
	httpRequest.open('POST', 'http://localhost/pstk/marten/php/opilased.php');
	httpRequest.setRequestHeader("Content-type", "application/json");
	httpRequest.send(stringJSONData);
}