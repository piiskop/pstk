<?php
/**
 * replacing and extracting values from array
 * @author Kristine <Kristinesepp@gmail.com>
 */
 

$styles = array('Jazz','Blues');
$styles[] = "Rock'n'roll";
$styles [count($styles)-2] = "Classic";

echo ( array_pop($styles) );



/**
 *  code to alert a random value from array arr
 * @author Kristine <Kristinesepp@gmail.com>
 */
 
$arr = array("Plum","Orange","Donkey","Carrot","JavaScript");
$rand_keys = array_rand($arr);
echo $arr[$rand_keys];


/**
 * @author Kristine <Kristinesepp@gmail.com>
 * a function which finds a value in array
 * @param array
 * @param value
 * @returns {Number} returns its(value in array) index, or -1 if not found
 */

function find($array, $value){
	for($i=0; $i<count($fruits); $i++){
		if($array($i) == $value) return $i;
	}
	return -1;
}

?>