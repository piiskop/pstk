<?php
	require_once './php/settings.php';
	$arr = [ 4, "Clare", 1, "Miria", 2, "Ophelia" ];
 	$failcount = 0;
 	$arrlength = count($arr);
	function find($array,$target) {
		$arraylength = count($array);
		for ($c = 0; $c < $arraylength ; $c++) {
			if ($array[$c] == $target) {
				return $c;
			}
		}
		return -1;
	}
//	echo "14: ".find($arr,4);
	for ( $n = 1; $n < (($arrlength)+$failcount); $n++){
 		if (find($arr,$n) == -1) { 
 			echo "18: Not Found<br/>";
 			if ($failcount < 5) {
 			$failcount++;
 			}
 		}
 		else {
 		echo "24: ".$n." - ".$arr[find($arr,$n)+1]."<br/>";
 		}
 	}
	
	