<?php

$muutuja=0;
while ($muutuja <2)
{
	echo $muutuja;
	$muutuja++;	
}

$muutuja=0;
do {
	echo $muutuja;
	$muutuja++;
	} while ($muutuja<2);
	
for ($muutuja=0; $muutuja<2; $muutuja++)
{
	echo $muutuja;
}

$numbers=array(
		0, 
		1
);
foreach ($numbers as $number){
	echo $number;
}

?>
