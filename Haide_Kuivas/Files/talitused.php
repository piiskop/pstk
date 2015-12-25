<?php
//HARJUTUS TALITUSED
// 1- loeb sõne “Süütuse eeldamine.”? tähemärgid UTF-8 vajalik, et ü tähed loeks üheks täheks
echo mb_strlen ('Süütuse eeldamine.','UTF-8'); 
echo '<br>';

// 2- teen sõne brauserile söödavaks
$html5 = 'mysql databases -h localhost -u databases -p < [faili nimi].sql';
echo htmlspecialchars ($html5, ENT_HTML5,ini_get("default_charset") ,true);

//3
/**
 * teisendab välja nime funtsiooni nimeks
 * @author Haide
 * @param string $fieldname fieldname
 * @return string nameOfFunction
 */
function changeFieldNameToFunctionName ($fieldname) {
	$changedFieldName = ucfirst($fieldname); // määrab algustähed
	$nameOfFunction   = 'get' . $changedFieldName; //muutujale liidetakse get
	return $nameOfFunction;
}

echo '<br>';
echo changeFieldNameToFunctionName ('phoneNumber'); 

// 4- 
echo '<br>';
$nimi= 'haide kuivas';
echo ucwords ($nimi);//muudab algustähed suureks

// 5-7
echo '<br>';
$muutuja='("In Transition 2.0")';
echo trim ($muutuja,'()"'); // võtab jutumärgid ära
echo '<br>';
echo mb_strtolower($muutuja, 'UTF-8');//teeb kõik tähed väiketähtedeks
echo '<br>';
echo mb_strtoupper ($muutuja, 'UTF-8');  // teeb stringis kõik suurtähtedeks

//8 muudan arvu
echo '<br>';
$arv=2015.16;
echo number_format($arv,1,'.',' ');//4 parameetrit, mis tingimused  anda
?>