<?php
$arr = array(
		"a", -1, 2, "b"
);

/**
 * Outputs array with only numeric values
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 * @param array $arr
 */
function isNumeric($arr) {
	$arr2 = [];
	for($i=0; $i<count($arr); $i++) {
		if (is_numeric($arr[$i])) {
			$arr2[] = ($arr[$i]);
		}
	}
	return $arr2;
}

/**
 * Does something to array
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 * @param array $arr
 * @param function $callback
 */
function filter($arr, $callback) {
	return $callback($arr);
}

$arr = filter($arr, "isNumeric");

echo implode(", ", $arr);