<?php
require_once 'error.php';
require_once 'Foods.php';
require_once 'Vitamins.php';

/**
 * table of Foode & Vitamins
 * @author andrus
 */

$listOfVitamins = Vitamins::getVitamins(); //vitamiinide nimekiri

$listOfVitamins[1]->insertIdOfFoods(1);
$listOfVitamins[1]->insertIdOfFoods(2);
$listOfVitamins[1]->insertIdOfFoods(3);

$listOfVitamins[2]->insertIdOfFoods(3);
$listOfVitamins[2]->insertIdOfFoods(4);
$listOfVitamins[2]->insertIdOfFoods(5);

$listOfVitamins[3]->insertIdOfFoods(2);
$listOfVitamins[3]->insertIdOfFoods(6);
$listOfVitamins[3]->insertIdOfFoods(1);

$listOfFoodsOfVitamin3 = $listOfVitamins[3]->getIdOfFooods();
$listOfFoodsOfVitamin1 = $listOfVitamins[1]->getIdOfFooods();

$listOfFoods = Foods::getFoods();

$listOfFoods[1]->insertIdOfVitamins(1);
$listOfFoods[1]->insertIdOfVitamins(3);

$listOfFoods[2]->insertIdOfVitamins(1);
$listOfFoods[2]->insertIdOfVitamins(3);

$listOfFoods[3]->insertIdOfVitamins(1);
$listOfFoods[3]->insertIdOfVitamins(2);

$listOfFoods[4]->insertIdOfVitamins(2);
$listOfFoods[5]->insertIdOfVitamins(2);
$listOfFoods[6]->insertIdOfVitamins(3);





/**
 * print to display
 */
foreach ($listOfFoodsOfVitamin3 as $idOfFood){
	echo ($listOfFoods[$idOfFood]->getName().' ');
}
echo "<br>" .($listOfFoods[2]->getName());

echo "<br>".($listOfFoods[2]->getName().' '.$listOfFoods[3]->getName().' '."<br>");

foreach ($listOfVitamins as $idOfVitamins => $vitamin){
	echo "<br>". $vitamin->getVitName().': ';
	foreach ($vitamin->getIdOfFooods() as $foodId){
		echo ($listOfFoods[$foodId]->getName().' ');
	}
}
echo "<br>";
foreach ($listOfFoods as $idOfFood => $food){
	echo "<br>".$food->getName().': ';
	foreach ($food->getIdOfVitamins() as $vitId){
		echo ($listOfVitamins[$vitId]->getVitName().' ');
	}
}


/* echo'<pre>';
		var_dump($listOfFoods);
echo'</pre>'; */ 
