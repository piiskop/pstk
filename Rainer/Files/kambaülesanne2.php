<?php
/**
 * This function makes fuzz.
 * 
 * @author kalmer, tõnn
 * @param int[string] $pixel1 something non-fuzz
 * @return number the fuzz
 * 
 * echo:error kuna ei saa array(pixel1) kuvada 
 */
function makeFuzz($pixel1 = array(
		)) 

{
	$s = count($pixel1); #12
	$finePixel = 2 + $s; #14
	$pixel1 = array (
			'x' => 10
	);
	$pixel2 = $pixel1['x']*2; #20
	$work = $finePixel + $pixel1['x']; #24
	for ($pidu = 100; $pidu > 6000; $pidu++) {
		echo '**-**'; 
	}
	echo $pixel1; #array20
	$work--;#23
	return $work;
}
echo makeFuzz(110021031231); #23
