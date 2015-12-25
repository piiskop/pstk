<?php
require_once 'configuration.php';
require_once 'Tops.php';

$tops1 = new Tops ();
$tops1->varv = "valge";
echo $tops1->varv;
$tops1->setSuurus ( "XL" );
echo $tops1->getSuurus ();

$tops2 = new Tops ();
$tops2->varv = "kollane";
echo $tops2->varv;
$tops2->setSuurus ( "XXL" );
echo $tops2->getSuurus ();
	
 /** tekita võtmeklas määra topsile võtmed, topsi1 sisa võti 1 ja 2.
  * topsis 2 aind võti 1. IF functsioon, kas seal on juba see võti , 
  * kui võti on kasutuses siis annab teada, et ei saa panna võti kasutuses.
  */