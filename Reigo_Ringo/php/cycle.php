<?php
$massiiv = array(0,1,2,3,4,5,6,7,8,9,10);

for ($a=0;$a < 10; $a++){
	
	if ($a % 2 == 1){
		echo $massiiv[$a] . '<br />';
	}	
	
}
$a=0;
while ($a < 10){
	
	if ($a % 2 == 1){
		echo $massiiv[$a] . '<br />';
	}	
	$a++;
	
}

$a=0;
do {
	if ($a % 2 == 1){
		echo $massiiv[$a] . '<br />';
	}
	$a++;
}
while ($a < 10);

$a=0;
foreach ($massiiv as $value){

	if ($a % 2 == 1){
		echo $massiiv[$a] . '<br />';
	}
	$a++;
}
