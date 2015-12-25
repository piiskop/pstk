<?php
require_once '../settings.php';

$firstPart = "Aias ei sadanud ";
$lastPart = "leiba";
echo $firstPart . $lastPart;
echo "<br/>";

echo 10 * 0.25;
echo "<br/>";

print_r (PHP_INT_MAX);
echo "<br/>";
var_dump (PHP_INT_MAX);
echo "<br/>", pow(2, 32) / 2 - 1;

$muutuja = 0;
$muutuja++;
++$muutuja;
$muutuja = $muutuja + 1;
$muutuja += 4;
$muutuja2 = 5;
echo "<br/>", ($muutuja != $muutuja2);
if ($muutuja != $muutuja2)
{
	echo " 44 ";
}
else
{
	echo " 47 ";
}

echo "<br/>", "arv: $muutuja";

echo "<br/>", ($muutuja != $muutuja2) ? " 44 " : " 47 ";
echo "<br/>";
?>
48: Kas Teil on ühiseid "alaealisi" lapsi?
<?php 
echo "<br/>", "50: ", "Kas Teil on ühiseid \"alaealisi\" lapsi?";
echo "<br/>", "51: ", 'Kas Teil on ühiseid "alaealisi" lapsi?';
echo "<br/>", "52: ", $lause = 'Kas Teil on ühiseid "alaealisi" lapsi?';
echo "<br/>", "53: ", $lause;
print_r ("<br/>" . "54: " .$lause);

$occurenceOfWords = array (
	array (
		"word" => "gentle",
		"occurence" => 4
	),
	array (
		"word" => "light",
		"occurence" => 4
	),
	array (
		"word" => "rage",
		"occurence" => 8
	),
	array (
		"word" => "men",
		"occurence" => 4
	),
	array (
		"word" => "dying",
		"occurence" => 4
	),
);
echo "<pre>", "78: " . print_r ($occurenceOfWords); "</pre>";

$array1 = array (2, 4, 6, 8, 10);
$array2 = array (3, 5, 7, 9, 11);
$array3 = array ($array1[0]+$array2[0], $array1[1]+$array2[1], $array1[2]+$array2[2], $array1[3]+$array2[3], $array1[4]+$array2[4]);
echo "<pre>", "83: " . print_r ($array3); "</pre>";

$value1 = "yes";
$value2 = ("$value1 no");
$value3 = ("$value2 maybe");
echo "<br/>", $value3;

$i = 0;
while ($i < 3)
{
	echo ("<br/>93: " . $i);
	$i++;
}

$n = 0;
unset ($n);
do
{
	echo ("<br/>93: " . $n);
	$n++;
}
while ($n < 3);

echo "<br/>" . "106: " . date("d.m.y h:i:s");
echo "<br/>" . "107: " . date("omd");
echo "<br/>" . "108: " . date("m");
echo "<br/>" . "109: " . date("d");
echo "<br/>" . "110: " . date("h");

echo "<br/>", "112: " . trim('"Üleminekul 2.0"', '" ');
echo "<br/>", "113: " . mb_strlen("Süütuse eeldamine.", "UTF-8");
echo "<br/>", "114: " . htmlspecialchars("mysql databases -h localhost -u databases -p < [faili nimi].sql");

echo "<br/>", "116: " . number_format(2015.16, 1, ".", "");
echo "<br/>", "117: " . trim('("In Transition 2.0")', '"\(\)');

$poem = explode(" ", "külmast tulest langes pime leek");
echo "<br/>", "120: " . $poem[2] . " " . $poem[1] . " " . $poem[0] . " " . $poem[3] . " " . $poem[4];