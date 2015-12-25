<?php
$array = array('BMW', 'Toyota', 'Audi', 'Mercedes', 'Saab', 'Volvo', 'Opel', 'Ferrari', 'Alfa-Romeo', 'Volkswagen');

// WHILE LOOP

$n = 1;
while($n<=11){
	echo $array[$n];
	$n+=2;
}
echo '<br/>';

// DO WHILE LOOP

$n =1;
do {
	echo $array[$n];
	$n+=2;
}
		while($n<11);
		
echo '<br/>';

// FOR LOOP

for ($n=1; $n<11; $n+=2){
	echo $array[$n];
	
}

echo '<br/>';
// FOREACH LOOP

foreach ($array as $car){
	echo $car;
}
?>