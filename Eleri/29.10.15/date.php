<?php
# for session variables
if (!isset($_SESSION)) {
    session_start();
}

# for localization
setlocale(LC_TIME, 'et_EE.UTF-8');
date_default_timezone_set('Europe/Tallinn');

# for seeing errors
ini_set('display_errors', 1);

if (defined('E_DEPRECATED')) {
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
} else {
    error_reporting(E_ALL & ~E_STRICT);
}

# header
header('Content-type: text/html; charset=utf-8');

echo '<pre>';

echo date("M-d-Y", mktime(4, 52, 31, 2, 2, 2015));


echo strtotime("now"), "\n";
echo strtotime("2 February 2015"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";

echo date("M-d-Y", strtotime('2015-11-17 10:24:41'));

$time = strtotime(date('Y-m-d H:i:s')) - strtotime('2014-06-25 14:50:03');
echo '<br/>';
echo $time;

$length = "Süütuse eeldamine";

$alustaalt = mb_strtolower($length, 'UTF-8');
$pikkus = mb_strlen($length, 'UTF-8');
echo '<br/>'.$alustaalt;
echo '<br/>'.$pikkus;

$myFirstName = 'eleri';
$myLastName = 'apsolon';

$myFirstName = ucfirst($myFirstName);
$myLastName = ucfirst($myLastName);

echo '<br/>'. "My name is ". $myFirstName. " ". $myLastName;

echo '<br/>'.number_format(2015.16,1, ".", " ");

$transition = ("(\"In Transition 2.0\")");
echo '<br/>'.$transition;

$trimmed = trim($transition, "\()\"");
echo '<br/>'. $trimmed;

$str1 = strtolower($trimmed);
echo '<br/>'.$str1;
$str2 = strtoupper($trimmed);
echo '<br/>'.$str2;

$sentence = "külmast tulest langes pime leek";
$explod = explode(" ", $sentence);
$massiiv = array(
    $explod[2],
    $explod[1],
    $explod[0],
    $explod[4],
    $explod[3]
);
$newsentence = implode(" ", $massiiv);

echo $newsentence;









/*
$field = 'phoneNumber';

$field = ucfirst($field);  
echo '<br/>'.$field;

$muutuja = 'get'.$field;

$muutuja();
*/

