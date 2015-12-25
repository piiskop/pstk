<?php
require_once 'kiisud.php';

$kiisud1 = new kiisud ();
$kiisud1->setKarv ("must");
$kiisud1->setSilm ("sinine");

$kiisud2 = new kiisud ();
$kiisud2->setKarv ("pruun");
$kiisud2->setSilm ("kollane");

$kiisud3 = new kiisud ();
$kiisud3->setKarv ("valge");
$kiisud3->setSilm ("roheline");

echo $kiisud1->getKarv();