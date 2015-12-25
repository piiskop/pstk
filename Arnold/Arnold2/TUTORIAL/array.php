<?php
$styles=array("Jazz", "Blues");
$styles[] = "Rock'n'Roll"	;
$styles[count($styles-2)] = "Classic";
echo(array_pop($styles)); 		
		
		