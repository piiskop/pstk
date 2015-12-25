<?php
ini_set('display_errors', 1);

/** 
 * @author Ergo
 * @param number|string $guy1 jääb samax
 * @param string[string] $guy2 indexes are <code>firstName</code> and <code>lastName</code> samax
 * @param string $target
 * @return string error
 */
function makeFun($guy1, $guy2 = array (
		'firstName' => 'no',
		'lastName'  => 'name'
), $target = 'court') {
	if ($guy1== 'Martin'){
		$guy2['lastName']='Saabas';
	};
	ucfirst($guy2['firstName']);
	echo $guy2["firstName"];
	$tere = $guy1 + $guy2[1];
	echo $tere;
	if ($target != 'court')
		echo '<br />Totally making fun<br />';
	return $guy2;
	echo $nägemist ["lõpp"];

} 
makeFun(1,array('firstName' => 'Keegi',
				'lastName' => 'Teine'));
