/**
 * 
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

pupils.sort(function(a,b) {
	return a.firstName.localeCompare(b.firstName);
});

var a = document.getElementById('Form1');

function findPupil(){
for (var i=0 ; i<pupils.length ; i++){
if (a.value === pupils[i].firstName){
	document.write(a.value+" Is found");
}
}
	
}
/*if (pupils.indexOf(a.value) < 0) {
	document.write(a.value+" Not found");}
else {
	document.write(a.value+" Is found");} 
*/
/*

*/