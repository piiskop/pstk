/**Mergesort
 * 
 */

var array= {[
		'winner' : 'rainer',
		'looser' : 'illimar'
	],
	 [
		'winner' : 'tarmo',
		'looser' : 'rainer'
	],
	 [
		'winner' : 'kristjan',
		'looser' : 'kalmer'
	],
	 [
		'winner' : 'per',
		'looser' : 'rando'
	],
	 [
		'winner' : 'ülle',
		'looser' : 'riina'
	],
	 [
		'winner' : 'kalmer',
		'looser' : 'aivar'
	],
	 [
		'winner' : 'stiina',
		'looser' : 'ülle'
	],
	 [
		'winner' : 'riina',
		'looser' : 'helena'
	],
	 [
		'winner' : 'boris',
		'looser' : 'aivar'
	],
	 [
		'winner' : 'ahto',
		'looser' : 'ville'
	],
	 [
		'winner' : 'tarmo',
		'looser' : 'indrek'
	],
	 [
		'winner' : 'tarmo',
		'looser' : 'ahto'
	],
	 [
		'winner' : 'kristi',
		'looser' : 'helena'
	],
	 [
		'winner' : 'ranno',
		'looser' : 'tarmo'
	],
	 [
		'winner' : 'ranno',
		'looser' : 'per'
	],
	 [
		'winner' : 'külli',
		'looser' : 'katrin'
	],
	 [
		'winner' : 'kristiina',
		'looser' : 'stiina'
	],
	 [
		'winner' : 'genadi',
		'looser' : 'aivar'
	],
	 [
		'winner' : 'kalmer',
		'looser' : 'boris'
	],
	 [
		'winner' : 'kalmer',
		'looser' : 'genadi'
	],
	 [
		'winner' : 'indrek',
		'looser' : 'rando'
	],
	 [
		'winner' : 'per',
		'looser' : 'genadi'
	],
	 [
		'winner' : 'ivar',
		'looser' : 'ville'
	],
	 [
		'winner' : 'per',
		'looser' : 'indrek'
	],
	 [
		'winner' : 'riina',
		'looser' : 'kristi'
	],
	 [
		'winner' : 'ivar',
		'looser' : 'indrek'
	],
	 [
		'winner' : 'tarmo',
		'looser' : 'per'
	],
	 [
		'winner' : 'ivar',
		'looser' : 'priit'
	],
	 [
		'winner' : 'kristiina',
		'looser' : 'külli'
	],
	 [
		'winner' : 'kristiina',
		'looser' : 'janelle'
	],
	 [
		'winner' : 'indrek',
		'looser' : 'illimar'
	],
	 [
		'winner' : 'janelle',
		'looser' : 'riina'
	],
	 [
		'winner' : 'külli',
		'looser' : 'janelle'
	],
	 [
		'winner' : 'kaie',
		'looser' : 'helena'
	],
	 [
		'winner' : 'ahto',
		'looser' : 'rainer'
	],
	 [
		'winner' : 'stiina',
		'looser' : 'janelle'
	],
	 [
		'winner' : 'ivar',
		'looser' : 'ranno'
	],
	 [
		'winner' : 'rainer',
		'looser' : 'ville'
	],
	 [
		'winner' : 'rando',
		'looser' : 'ahto'
	],
	 [
		'winner' : 'stiina',
		'looser' : 'külli'
	],
	 [
		'winner' : 'aivar',
		'looser' : 'ahto'
	],
	 [
		'winner' : 'boris',
		'looser' : 'genadi'
	],
	 [
		'winner' : 'stiina',
		'looser' : 'katrin'
	],
	 [
		'winner' : 'ivar',
		'looser' : 'kalmer'
	],
	 [
		'winner' : 'genadi',
		'looser' : 'indrek'
	],
	 [
		'winner' : 'boris',
		'looser' : 'priit'
	],
	 [
		'winner' : 'ville',
		'looser' : 'illimar'
	],
	 [
		'winner' : 'aivar',
		'looser' : 'indrek'
	],
	 [
		'winner' : 'kristi',
		'looser' : 'kaie'
	],
	 [
		'winner' : 'kalmer',
		'looser' : 'tarmo'
	],
	 [
		'winner' : 'katrin',
		'looser' : 'riina'
	],
	 [
		'winner' : 'kristjan',
		'looser' : 'ivar'
	],
	 [
		'winner' : 'priit',
		'looser' : 'indrek'
	],
	 [
		'winner' : 'illimar',
		'looser' : 'rando'
	],
	 [
		'winner' : 'boris',
		'looser' : 'tarmo'
	],
	 [
		'winner' : 'illimar',
		'looser' : 'rando'
	],
	 [
		'winner' : 'ahto',
		'looser' : 'illimar'
	],
	 [
		'winner' : 'illimar',
		'looser' : 'stiina'
	],
	 [
		'winner' : 'kristiina',
		'looser' : 'indrek'
	],
	 [
		'winner' : 'aivar',
		'looser' : 'kristiina'
	],
	 [
		'winner' : 'janelle',
		'looser' : 'katrin'
	],
	 [
		'winner' : 'illimar',
		'looser' : 'rando'
	],
	 [
		'winner' : 'rando',
		'looser' : 'stiina'
	],
	 [
		'winner' : 'ville',
		'looser' : 'stiina'
	],
	 [
		'winner' : 'priit',
		'looser' : 'per'
	],
	 [
		'winner' : 'kalmer',
		'looser' : 'indrek'
	],
	 [
		'winner' : 'kalmer',
		'looser' : 'kristjan'
	],
	 [
		'winner' : 'kalmer',
		'looser' : 'kristjan'
	],
	 [
		'winner' : 'boris',
		'looser' : 'indrek'
	]};
