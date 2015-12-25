<?php
//Includes code from another file
require_once 'settings.php';

// header
header('Content-type: text/html; charset=utf-8');

$firstPart = "Taevas on ";
$lastPart = "pilved<br>";
echo '<br>' , $firstPart . $lastPart;


$muutuja = 0;
$muutuja++;
$muutuja = $muutuja + 1;
++$muutuja;
$muutuja += 4;
$muutuja = $muutuja + 4;

$muutuja2 = 5;

echo($muutuja != $muutuja2) , '<br>';

	if($muutuja != $muutuja2){
		echo ' 44';
	}
	else {
		echo '45';
	}

//die('lõpp');



echo (int) 1.25;

echo "<br>sõne " . 1.75;

echo '<br>' , pow(2, 32) / 2 - 1;

echo '<br> sõne kahel <br/> real';

?>
<html><br/> Kas teil on ühiseid "alaealisi" lapsi?</html>
<?php 


echo '<br>' , 'Kas teil on ühiseid "alaealisi" lapsi?'; 
echo '<br>' , "Kas teil on ühiseid \"alaealisi\" lapsi?";
echo <<<STRING
<br/>
Kas teil on ühiseid "alaealisi" lapsi?
STRING;

//echo '<br>' . strlen($firstPart);

/*$numbers = array(
	'0' =>	1,
	'1' =>	5,
	'2' =>	7,
	8	
) ;

echo '<pre>'; var_dump($numbers['0']);echo '</pre>'; */


$songs = array(
	array(
		'name' => 'Sõidulaul',
		'artist' => 'Mihkel Raud'
	),		
	array(
		'name' => 'Sõidulaul',
		'artist' => 'Lenna Kuurma'
	),
);

$array1 = array (2, 4, 6, 8, 10);
$array2 = array (3, 5, 7, 9, 11);
$array3 = array ($array1[0]+$array2[0],$array1[1]+$array2[1],$array1[2]+$array2[2],$array1[3]+$array2[3],$array1[4]+$array2[4]);

echo'<pre>';var_dump($array3);echo'</pre>';

$muutuja4 = 'õues ' ;
$muutuja5 = 'paistis ' . $muutuja4 . 'päike.';
$muutuja6 = 'Täna ' . $muutuja5;

echo $muutuja6;

echo '<br/>' . date('d.m.Y H:i:s');
echo '<br/>' . date('omd');
echo '<br/>' . date('m');
echo '<br/>' . date('d');
echo '<br/>' . date('H:i');


echo '<br/>' . mb_strlen("õmd", 'UTF-8');
echo '<br/>' . mb_strlen("Süütuse eeldamine." , 'UTF-8');
echo '<br/>' . htmlspecialchars('mysql databases -h localhost -u databases -p < [faili nimi].sql');
echo '<br/>' . trim('("In Transition 2.0")', '()"');


/*
 * Splitting string into array.
 */
$sentence = 'külmast tulest langes pime leek';
echo'<pre>'; var_dump(explode(" ", $sentence)); 
//langes(2) tulest(1) külmast(0) leek(4) pime(3)



/*
 * This function reaarranges words in a string.
 */
function rearrange($parameters)
{
	$arrayOfOrigin = explode(' ', $parameters['origin']);
	$arrayOfResult = array ();
	foreach ($parameters['newOrder'] as $order)
		{
			$arrayOfResult[] = $arrayOfOrigin[$order];
		}
	echo implode (' ', $arrayOfResult);
}

	rearrange(array(
		'origin' => 'külmast tulest langes pime leek',
		'newOrder' => array (2, 1, 0, 4, 3)
)
);
	
