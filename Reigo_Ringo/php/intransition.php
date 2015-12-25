<?php
$muutuja = '("In Transition 2.0")';
echo trim($muutuja, '"()') . '<br />';
echo strtolower(trim($muutuja, '"()')) . '<br />';
echo strtoupper(trim($muutuja, '"()')) . '<br />';

$arv = 2015.16;

echo number_format(round($arv, 1), 1,'.', ' ') . '<br />';

$muutuja2 = 'Süütuse eemaldamine';

echo strlen($muutuja2) . '<br />';

echo htmlspecialchars('"mysql databases -h localhost -u databases -p < [faili nimi].sql"') . '<br />';

function funktsioon($field) {
	echo 'get' . ucfirst($field) . '<br />';
};

funktsioon('phoneNumber');
funktsioon('midagimuud');


$eesnimi = 'reigo';
$perenimi = 'ringo';
$nimi = $eesnimi . ' ' . $perenimi;
echo ucwords($nimi);

?>