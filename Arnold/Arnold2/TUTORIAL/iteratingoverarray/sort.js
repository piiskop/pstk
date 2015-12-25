/**
 * 
 */
function ageCompare(a, b) {

	if (a.age > b.age)
		return 1

	else if (a.age < b.age)
		return -1

	return 0
}
function ageSort(people) {
	people.sort(ageCompare)
}
var john = {
	name : "John Smith",
	age : 23
}

var mary = {
	name : "Mary Key",
	age : 18
}

var bob = {
	name : "Bob-small",
	age : 6
}

var people = [ john, mary, bob ]

ageSort(people)

// check the order

for (var i = 0; i < people.length; i++) {

	alert(people[i].name)

}