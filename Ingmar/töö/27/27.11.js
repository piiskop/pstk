/**
 * @author Ingmar:Juurik<ingmar.juurik@gmail.com>
 * @the raw data of pupils
 */

var pupils = [
	{
		name: "Kaire",
		coder: false
	},
	{
		name: "Raiko",
		coder: false
	},
	{
		name: "Eleri",
		coder: true
	},
	{
		name: "Sander",
		coder: true
	},
	{
		name: "Erika",
		coder: true
	},
	{
		name: "Kristen",
		coder: true
	},
	{
		name: "Keijo",
		coder: false
	},
	{
		name: "Ingmar",
		coder: true
	},
	{
		name: "Rasmus",
		coder: true
	},
	{
		name: "Ralf",
		coder: true
	},
	{
		name: "ženja",
		coder: false
	}
];




var toggleShow = function () {
	var t = document.getElementById('table-container'),
		hidden = false;

	for (var i = 0; i < t.classList.length; i++) {
		if (t.classList[i] === 'hide') {
			hidden = true;
			break;
		}
	}
	if (hidden) {
		t.classList.remove('hide');
		document.getElementById('showTable').innerHTML = 'Peida nimekiri';
	} else {
		t.classList.add('hide');
		document.getElementById('showTable').innerHTML = 'Kuva nimekiri';

	}
};


var _sortUTF8 = function () {
	var array = pupils;
	array.sort(function (a, b) {
		return a.name.localeCompare(b.name, 'et');
	});
	console.log(array);
	return array;
};

/**
 * sort names
 */

var _sort = function (array) {

	if (array.length < 2) {
		return array;
	}
	var i, buf, j;
	for (i = (array.length - 1); i >= 0; i--) {
		for (j = i; j >= 0; j--) {

			if (array[i].name < array[j].name) {
				buf = array[j];
				array[j] = array[i];
				array[i] = buf;
			}
		}
	}
	return array;
};

/**
 * binary search
 */

var _binarySearch = function (s) {
	pupils = _sort(pupils);
	var r = {needle: -1, steps: 0, found: false};
	var left = 0,
			right = pupils.length,
			mid = Math.floor((left + right) / 2);

	while (right - left > 1) {
		r.steps++;
		if (pupils[mid].name === s) {
			r.needle = mid;
			r.found = true;
			return r;
		} else if (pupils[mid - 1].name === s) {
			r.needle = mid - 1;
			r.found = true;
			return r;
		}
		
		if (s > pupils[mid].name) {
			left = mid;
		} else if (s < pupils[mid].name) {
			right = mid;
		}
		mid = Math.floor((left + right) / 2);
	}
	return r;
};


var insertTable = function () {
	var arrayOfPupils = _sortUTF8();
	var tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
	var tableFoot = document.getElementById('dataTable').getElementsByTagName('tfoot')[0];

	while (tableBody.firstChild) {
		tableBody.removeChild(tableBody.firstChild);
	}

	while (tableFoot.firstChild) {
		tableFoot.removeChild(tableFoot.firstChild);
	}

	for (var i = 0; i < arrayOfPupils.length; i++) {
		var row = tableBody.insertRow(i);
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		cell1.innerHTML = arrayOfPupils[i].name;
		if (arrayOfPupils[i].coder) {
			cell2.classList.add('coder');
		}
		cell1.classList.add('nameBg');
	}

	var row = tableFoot.insertRow(0);
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	cell1.innerHTML = 'Õpilasi kokku';
	cell2.innerHTML = arrayOfPupils.length;

};

var search = function () {

	document.getElementById('repeated').innerHTML = '';
	document.getElementById('keyStudent').value = -1;
	document.getElementById("coding").checked = false;
	document.getElementById('update-status').innerHTML = "";

	var name = document.getElementById('name').value.trim();
	if (name.length < 1) {
		return;
	}
	var r = _binarySearch(name);
	document.getElementById('repeated').innerHTML = "Korduste arv: " + r.steps.toString();

	if (r.found) {
		document.getElementById('update-status').innerHTML = "Otsitud õpilane on nimekirjas!";
		document.getElementById("coding").checked = pupils[r.needle].coder;
		document.getElementById("name").value = pupils[r.needle].name;
	} else {
		document.getElementById('update-status').innerHTML = "Otsitud õpilast ei ole nimekirjas!";
	}

	document.getElementById('keyStudent').value = r.needle;
};

var save = function () {
	var k = document.getElementById('keyStudent').value;
	if (parseInt(k) < 0) {
		return;
	}
	var coder = document.getElementById("coding").checked;
	var name = document.getElementById("name").value.trim();
	pupils[k].coder = coder;
	pupils[k].name = name;
	document.getElementById('keyStudent').value = -1;
	document.getElementById("coding").checked = false;
	document.getElementById("name").value = '';
	insertTable();
};
_sortUTF8();
pupils = _sort(pupils);
insertTable();