<?php
require_once 'configuration.php';
require_once 'Inimene.php';
require_once 'Asukoht.php';

$inimene1 = new Inimene ();
$inimene1->setId (1);
$inimene1->setEesnimi ("Tambet");
$inimene1->setPerenimi ("Song");

$inimene2 = new Inimene ();
$inimene2->setId (2);
$inimene2->setEesnimi ("Indrek");
$inimene2->setPerenimi ("Pong");

$asukoht1 = new Asukoht ();
$asukoht1->setId (1);
$asukoht1->setAsukoht ("Pärnu");
$asukoht1->insertInimene($inimene1);

echo $inimene1->getId ();
echo $inimene1->getPerenimi ();
echo $inimene1->getEesnimi ();
echo $asukoht1->getId ();
echo $asukoht1->getAsukoht ();
$asukoht1->insertInimene($inimene2);
$parnakad=array(
		$inimene1->getId()=>$inimene1, 
		$inimene2->getId()=>$inimene2
);
$asukoht1-> setInimesed($parnakad);
echo '<pre>';
var_dump ($asukoht1->getInimesed ());
echo '</pre>';



