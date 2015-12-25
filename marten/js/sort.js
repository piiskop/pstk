/**
 * 
 */
var playersGlobal = ["Madis","Toomas","Kert","Alfred","Jaanus","Mihkel","Tanel","Edvin","Marek","Jüri"]
var rankingsGlobal;
var historyGlobal;

var getRandomIntInclusive = function(min,max) {
	return Math.floor(Math.random() * (max - min + 1))
			+ min;
}

var match = function(playerA,playerB) {
	matchResult = getRandomIntInclusive(0,1);
	//Result 0: playerA võit; Result 1: playerB võit
	if (matchResult == 0) {
		console.log("16:" + str.toUpperCase(playersGlobal[playerA]) + ":" + str.toLowerCase(playersGlobal[playerB]));
	}
	if (matchResult == 1) {
		console.log("19:" + str.toLowerCase(playersGlobal[playerA]) + ":" + str.toUpperCase(playersGlobal[playerB]));
	}
	return matchResult;
}

var rankings = function() {
	var c = 0;
	while (c < 10) {
		for (var i=0;i<10;i++) {
			if (i == c){
				i++;
			}
			else {
				historySearch
			}
		}
	}
}