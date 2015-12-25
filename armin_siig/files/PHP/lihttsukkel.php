<?php
$cycle = array (
		0 => 1,
		1 => 2,
		2 => 3,
		3 => 4,
		4 => 5,
		5 => 6,
		6 => 7,
		7 => 8,
		8 => 9,
		9 => 10 
);
$n = 0;

while ( $n < count ( $cycle ) ) 

{
	if ($n % 2 == true) {
		
		echo $cycle [$n], ' ';
	}
	$n ++;
}
echo '</br>';
$b = 0;
do {
	if ($b % 2 == true) {
		
		echo $cycle [$b], ' ';
	}
	$b ++;
} while ( $b < count ( $cycle ) );

echo '</br>';

for($b = 0; $b < count ( $cycle ); $b ++) 

{
	if ($b % 2 == true) {
		echo $cycle [$b], '</br>';
	}
}
foreach ( $cycle as $value ) 
{
	if ($b % 2 == true) 
	{
		
		echo $cycle [$b], ' ';
	}
}
