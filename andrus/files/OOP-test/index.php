<?php
require 'class_lib.php';

$car = new car ();
$car->setCarColor ( 'punane' );
$car->setCarMark ( 'Audi' );
$car->setCarModel ( 'A4s' );

$vheel = new vheels ();
$vheel->setVheelColor ( 'valge' );
$vheel->setVheelDiameter('17');

$image = new image();
$image->setImage('https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTDs5Q6m8IFBO1XhNo9OIcVQ-TN7zqvT5ITB4dgeARQ9sw3TtohLw');

echo 'See ' . $car->getCarMark () . ' ' . $car->getCarModel () . ' on ' 
		. $car->getCarColor () . ' ja sellel on ' . $vheel->getVheelColor () .
'd veljed, nende velgede l&auml;bim&otilde;&otilde;t on '.$vheel->getVheelDiameter().'".';
echo '<br>';
var_dump ($image->getImage('https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTDs5Q6m8IFBO1XhNo9OIcVQ-TN7zqvT5ITB4dgeARQ9sw3TtohLw'));
