<?php
$Numbrid = array(
array (
				0 => 2,
				1 => 4,
				2 => 6,
				3 => 8,
				4 => 10
),
array (
				0 => 3,
				1 => 5,
				2 => 7,
				3 => 9,
				4 => 11
),
);

for ($nr = 0; $nr <= 4; $nr++)
{
	echo $Numbrid[0][$nr] + $Numbrid[1][$nr];
	echo "<br>";
}