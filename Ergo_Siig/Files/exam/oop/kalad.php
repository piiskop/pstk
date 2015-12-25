<html>
<head>
	<meta charset="UTF-8">
	<title>Kalad</title>
</head>

<?php
require_once 'kaladController.php';
require_once 'error.php';

//andmete sisestamine
$kala1 = new kala ();
$kala1->setNimi ("Siig");
$kala1->setSugukond ("Kalalised");
$kala1->setElukoht ("Meri");
$kala1->setVarv ("punane");

$kala2 = new kala ();
$kala2->setNimi ("Ahven");
$kala2->setSugukond ("Silmulised");
$kala2->setElukoht ("Jõgi");
$kala2->setVarv ("sinine");

$kala3 = new kala ();
$kala3->setNimi ("Lest");
$kala3->setSugukond ("Merelised");
$kala3->setElukoht ("Järv");
$kala3->setVarv ("Kollane");

//andmete kuvamine
echo $kala1->getNimi();
echo "<br>";
echo $kala1->getSugukond();
echo "<br>";
echo $kala1->getElukoht();
echo "<br>";
echo "<br>";
echo $kala2->getNimi();
echo "<br>";
echo $kala2->getSugukond();
echo "<br>";
echo $kala2->getElukoht();
echo "<br>";
echo "<br>";
echo $kala3->getNimi();
echo "<br>";
echo $kala3->getSugukond();
echo "<br>";
echo $kala3->getElukoht();
echo "<br>";
echo $kala3->getVarv();
?>