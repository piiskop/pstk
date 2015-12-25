<?php
require_once 'Medical.php';
require_once 'Plant.php';

$plants = new Plant;
$plants = Plant::getPlants();

$plants[1]->insertIdOfMedical(1);

$plants[2]->insertIdOfMedical(2);

$plants[3]->insertIdOfMedical(3);

$plants[3]->insertIdOfMedical(2);

$medicals = Medical::getMedicals();

$medicals[1]->insertIdOfPlant(1);

$medicals[2]->insertIdOfPlant(3);

$medicals[3]->insertIdOfPlant(2);

$medicals[3]->insertIdOfPlant(2);

foreach ($medicals as $idOfMedicals => $medi){
	echo "<br>". $medi->getBenefit().': ';
	foreach ($medi->getIdOfPlant() as $medId){
		echo ($plants[$medId]->getName().' ');
	}
}

foreach ($plants as $idOfPlants => $pla){
	echo "<br>". $pla->getName().': ';
	foreach ($pla->getIdOfMedicals() as $plaId){
		echo ($medicals[$plaId]->getBenefit().' ');
	}
}
