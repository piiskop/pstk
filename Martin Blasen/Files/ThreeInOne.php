<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Three Kittens</title>
<link rel="stylesheet" type="text/css" href="ThreeInOne.css">


</head>
<body>

<?php 

echo mb_strlen ("Süütuse eeldamine.", 'utf-8');

echo htmlspecialchars ( 'mysql databases -h localhost -u
databases -p < [faili_nimi].sql' );

echo 'get' . ucfirst ( 'phoneNumber' );

echo ucwords('martin blasen');

echo trim("In Transition 2.0", '"');

$nr6 = "In Transition 2.0";
$nr6 = mb_strtolower($nr6);
echo $nr6;

$nr7 = "In Transition 2.0";
$nr7 = mb_strtoupper($nr7);
echo $nr7; 

?>
<br>
<?php 
$number=2015.16;

$format = number_format($number, 1, '.', ' ');

echo $format;
?>

<br>

<?php 

echo trim("randmstuff", 'f');



?>

<br>

<?php
function kittens($cat) {
	echo $cat;
};

echo kittens ( 3 );
?>

<br>

<?php

$cat = "Kitten";

$Q = "Which {$cat}is the cutest?";

$question = $Q;

echo $question;

?>

<?php  require_once 'Kitten1.html'; ?>
<?php  require_once 'Kitten4.html'; ?>
<?php  require_once 'Kitten3.html'; ?>


</body>
</html>