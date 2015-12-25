/**
 * 
 */
var matches = [{
	winner: 'rainer',
	loser: 'illimar',
}, {
	winner: 'tarmo',
	loser: 'rainer',
}, {
	winner: 'kristjan',
	loser: 'kalmer',
}, {
	winner: 'per',
	loser: 'rando',
}, {
	winner: 'ülle',
	loser: 'riina',
}, {
	winner: 'kalmer',
	loser: 'aivar',
}, {
	winner: 'stiina',
	loser: 'ülle',
}, {
	winner: 'riina',
	loser: 'helena,'
}, {
	winner: 'boris',
	loser: 'aivar',
}, {
	winner: 'ahto',
	loser: 'ville',
}, {
	winner: 'tarmo',
	loser: 'indrek',
}, {
	winner: 'tarmo',
	loser: 'ahto',
}, {
	winner: 'kristi',
	loser: 'helena',
}, {
	winner: 'ranno',
	loser: 'tarmo',
}, {
	winner: 'ranno',
	loser: 'per',
}, {
	winner: 'külli',
	loser: 'katrin',
}, {
	winner: 'kristiina',
	loser: 'stiina',
}, {
	winner: 'genadi',
	loser: 'aivar',
}, {
	winner: 'kalmer',
	loser: 'boris',
}, {
	winner: 'kalmer',
	loser: 'genadi',
}, {
	winner: 'indrek',
	loser: 'rando',
}, {
	winner: 'per',
	loser: 'genadi',
}, {
	winner: 'ivar',
	loser: 'ville',
}, {
	winner: 'per',
	loser: 'indrek',
}, {
	winner: 'riina',
	loser: 'kristi',
}, {
	winner: 'ivar',
	loser: 'indrek',
}, {
	winner: 'tarmo',
	loser: 'per',
}, {
	winner: 'ivar',
	loser: 'priit',
}, {
	winner: 'kristiina',
	loser: 'külli',
}, {
	winner: 'kristiina',
	loser: 'janelle',
}, {
	winner: 'indrek',
	loser: 'illimar',
}, {
	winner: 'janelle',
	loser: 'riina',
}, {
	winner: 'külli',
	loser: 'janelle',
}, {
	winner: 'kaie',
	loser: 'helena',
}, {
	winner: 'ahto',
	loser: 'rainer',
}, {
	winner: 'stiina',
	loser: 'janelle',
}, {
	winner: 'ivar',
	loser: 'ranno',
}, {
	winner: 'rainer',
	loser: 'ville',
}, {
	winner: 'rando',
	loser: 'ahto',
}, {
	winner: 'stiina',
	loser: 'külli',
}, {
	winner: 'aivar',
	loser: 'ahto',
}, {
	winner: 'boris',
	loser: 'genadi',
}, {
	winner: 'stiina',
	loser: 'katrin',
}, {
	winner: 'ivar',
	loser: 'kalmer',
}, {
	winner: 'genadi',
	loser: 'indrek',
}, {
	winner: 'boris',
	loser: 'priit',
}, {
	winner: 'ville',
	loser: 'illimar',
}, {
	winner: 'aivar',
	loser: 'indrek',
}, {
	winner: 'kristi',
	loser: 'kaie',
}, {
	winner: 'kalmer',
	loser: 'tarmo',
}, {
	winner: 'katrin',
	loser: 'riina',
}, {
	winner: 'kristjan',
	loser: 'ivar',
}, {
	winner: 'priit',
	loser: 'indrek',
}, {
	winner: 'illimar',
	loser: 'rando',
}, {
	winner: 'boris',
	loser: 'tarmo',
}, {
	winner: 'illimar',
	loser: 'rando',
}, {
	winner: 'ahto',
	loser: 'illimar',
}, {
	winner: 'illimar',
	loser: 'stiina',
}, {
	winner: 'kristiina',
	loser: 'indrek',
}, {
	winner: 'aivar',
	loser: 'kristiina',
}, {
	winner: 'janelle',
	loser: 'katrin',
}, {
	winner: 'illimar',
	loser: 'rando',
}, {
	winner: 'rando',
	loser: 'stiina',
}, {
	winner: 'ville',
	loser: 'stiina',
}, {
	winner: 'priit',
	loser: 'per',
}, {
	winner: 'kalmer',
	loser: 'indrek',
}, {
	winner: 'kalmer',
	loser: 'kristjan',
}, {
	winner: 'kalmer',
	loser: 'kristjan',
}, {
	winner: 'boris',
	loser: 'indrek',
}];

/**
 * @access private
 * @var multitype[string] a recursive array of the result of the merging. Every
 *      player has his/her own subarray like this:
 * 
 * <pre>
 *  [kalmer] =&gt; Array
 *     (
 *         [player] =&gt; kalmer
 *         [winners] =&gt; Array
 *             (
 *             )
 * 
 *         [place] =&gt; 1
 *     )
 * 		
 * </pre><code>winners</code> contains the arrays of winners of the current player.
 */
var results = [];

/**
 * This function cleans the winners recursively if the loser has won over
 * his/her previous winner.
 * 
 * @access private
 * @param boolean
 *            $parameters['deep'] Are we digged in recursively?
 * @param mixed[int]
 *            $parameters['results'] the actual results of merging of the winner
 * @param string
 *            $parameters['winner'] the name of the winner
 * @param string
 *            $parameters['loser'] the name of the loser
 * @param string
 *            $parameters['parent'] the name of the parent
 */
function cleanWinner(parameters) {
	// console.log(" 255: " + cleanWinner.caller.name);
	// if the winner has an entry for his/her winners
	if (isset(parameters.results) && isset(parameters['results']['winners'])) {

		// for each player who has won over the current winner
		for (player in parameters['results']['winners']) {
			// if we are at the first level
			if (!parameters['deep']) {
				// set the parent to be the current player
				parameters['parent'] = player;
			}

			// if the loser is the current player
			if (parameters['loser'] === player) {
				// remove the parent from the winners over the winner
				delete (results[parameters['winner']]['winners'][parameters['parent']]);
				// for each player
				for (previousloser in results) {
					// if the player has set winners
					if (isset(results[previousloser]['winners'])) {
						// for each past winner
						for (previousWinner in results[previousloser]['winners']) {
							// if the past winner is the current winner
							if (previousWinner === parameters['winner']) {

								/*
								 * remove the past winner from the list of
								 * winners over the past loser
								 */
								delete (results[previousloser]['winners'][previousWinner]);
								/*
								 * insert the parent to the list of winners over
								 * the past loser
								 */
								results[previousloser]['winners'][parameters['parent']] = results[parameters['parent']];

								// update losers of the past loser
								updateloser({
									'loser' : previousloser
								});
							}
						}
					}
				}
			}
			// console.log(" 299: "+ parameters['results']['winners'][player]);
			// clean winners
			cleanWinner({
				'deep' : true,
				'results' : parameters['results']['winners'][player],
				'winner' : parameters['winner'],
				'loser' : parameters['loser'],
				'parent' : parameters['parent']
			});
		}
	}
}

/**
 * This function creates the chart using merge sorting.
 * 
 * @access public
 * @author kalmer
 * @param string[string[int]]
 *            $parameters['matches'] the matches where the index is
 *            <code>winner</code> or <code>loser</code> and the value is
 *            the name of either winner or loser
 */
function manageResults(parameters) {

	// for each match result
	for (match in parameters['matches']) {
		// if there is no entry for the winner yet
		if (isset(results[parameters['matches'][match]['winner']])) {
			// set an entry for the winner
			results[parameters['matches'][match]['winner']] = {
				'player' : parameters['matches'][match]['winner'],
				'winners' : {}
			};
			// console.log(" 333 ");
		}
		// console.log(" 334:
		// "+results[parameters['matches'][match]['winner']].toSource());
		/*
		 * manage all the cases where the winner has previously lost to somebody
		 * in the winner’s winners’ critical path
		 */
		cleanWinner({
			'deep' : false,
			'results' : results[parameters['matches'][match]['winner']],
			'winner' : parameters['matches'][match]['winner'],
			'loser' : parameters['matches'][match]['loser'],
			'parent' : null
		});
		// console.log(" 345: "+
		// results[parameters['matches'][match]['winner']].toSource());
		// set an entry for the loser
		if (!isset(results[parameters['matches'][match]['loser']])) {
			results[parameters['matches'][match]['loser']] = {
				winners : {}
			};
		}
		results[parameters['matches'][match]['loser']]['player'] = parameters['matches'][match]['loser'];
		// insert the list of the winner to the winners' list of the loser
		results[parameters['matches'][match].loser].winners[parameters['matches'][match].winner] = results[parameters['matches'][match]['winner']];
		// console.log(" 356: " +
		// results[parameters['matches'][match]['winner']].toSource());
		// update losers of the loser
		updateloser({
			'loser' : parameters['matches'][match]['loser']
		});
	}

	// for each player
	for (player in results) {
		// if there is an entry for the winners by the player
		if (isset(results[player]['winners'])) {
			/*
			 * set the place of the player according to the length of the
			 * critical path of the player's winners
			 */
			results[player]['place'] = array_depth({
				'array' : results[player],
				'keyForChildren' : 'winners'
			}) - 1;
		}
		// otherwise
		else {
			// set the place as 1 for the player
			results[player]['place'] = 1;
		}

	}
	sortedArray = array_sort(results);
	for (player in sortedArray) {
		console.log(' 629: <br/>', player, ', (', sortedArray[player]['place'],
				')');
	}

}

/**
 * This function sorts an array.
 * 
 * @author kalmer
 * @param arrayIn the array to sort
 * @returns {Array} the sorted array
 */
function array_sort(arrayIn) {

	var arrayCouplets = new Array();
	for (key in arrayIn) {

		arrayCouplets.push({

			key : key,
			value : arrayIn[key]
		});
	}

	arrayCouplets.sort(function(a, b) {
		console.log(" 443: " + a.value.place + ", " + b.value.place);
		if (a.value.place < b.value.place) {
			return -1;
		}
		if (a.value.place > b.value.place) {
			return 1;
		}
		return 0;
	});

	var arrayOut = new Array();
	for (i in arrayCouplets) {

		arrayOut[arrayCouplets[i]['key']] = arrayCouplets[i]['value'];
	}

	return arrayOut;
}

/**
 * This function finds out the depth of the array.
 * 
 * @access private
 * @author kalmer
 * @param mixed
 *            $parameters['array'] the array
 * @param string
 *            $parameters['keyForChildren'] the key for the children
 * @return number the depth
 */
var array_depth = function(parameters) {
//	    var level = 1;
//	    var key;
//	    for(key in parameters.array) {
//	        if (!parameters.array.hasOwnProperty(key)) continue;
//
//	        if(typeof parameters.array[key] == 'object'){
//	            var depth = array_depth(parameters.array[key]) + 1;
//	            level = Math.max(depth, level);
//	        }
//	    }
//	    return level;
	    
	    
	    
		if (!empty(parameters['array'][parameters['keyForChildren']])) {
		parameters['array'] = parameters['array'][parameters['keyForChildren']];
	}

	var max_depth = 1;

	for (index in parameters['array']) {
		if (is_object(parameters['array'][index])) {
			depth = array_depth({
				'array' : parameters['array'][index],
				'keyForChildren' : parameters['keyForChildren']
			}) + 1;
			if (depth > max_depth) {
				max_depth = depth;
			}
		}
	}

	return max_depth;
}

/**
 * This function updates recursively the losers with the information about
 * their winners.
 * 
 * @access private
 * @param string
 *            $parameters['loser'] the name of the loser
 */
var updateloser = function(parameters) {

	// for each player
	for (player in results) {

		/*
		 * if the loser exists in the list of the winners over the current
		 * player
		 */
		if (isset(results[player]['winners'][parameters['loser']])) {
			/*
			 * update the list of the loser in the winners' list of the current
			 * player with the list of the loser
			 */
			results[player]['winners'][parameters['loser']] = results[parameters['loser']];
			// update losers of the player
			updateloser({
				'loser' : player
			});
		}

	}

}

manageResults ({
	matches : matches
});