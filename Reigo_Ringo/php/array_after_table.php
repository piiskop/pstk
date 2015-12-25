<?php

$massiiv = [
	"id_growing" => 1,
	"name" => "sidrun",
	"grows_where" => "indoors",
	"is_edible" => TRUE,		
	"is_suitable_houseplant" => TRUE		
];

print_r($massiiv);

//------------------------------------------------------
$mas1 = array(1,2,3,4,5,6,7,8,9,10,11);

$muutuja = 1;
$liidab_siia = 0;

while ($muutuja < 12){
if ($muutuja % 2 == 0){
	$liidab_siia = $liidab_siia + $mas1[$muutuja];
}
$muutuja = $muutuja + 1;

};
echo '<br />' . $liidab_siia . '<br />';
//-------------------------------------------------------
$mas2 = array(1,2,3,4,5,6,7,8,9,10,11,12);
$indeksid = array(3, 5, 7, 9, 11);
$indeks = 0;
$liidab_siia = 0;

while ($indeks < count($indeksid)){
$liidab_siia = $liidab_siia + $mas2[$indeksid[$indeks]];

$indeks = $indeks + 1;

};
echo $liidab_siia;


?>