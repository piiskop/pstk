<?php

header("Content-Type: text/html; charset=utf-8");


if(!isset($_SESSION))
{
	session_start();
}

setlocale(LC_TIME, 'et_EE.UTF-8');
ini_set('display_errors', 1);
if (defined('E_DEPRECATED'))
{
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
else
{
	error_reporting(E_ALL & ~E_STRICT);
}
date_default_timezone_set('Europe/Tallinn');


$firstPart = "esimene osa";
$secondPart = " ja teine osa";

 echo $firstPart . $secondPart; echo "<br /><br />";

echo 10 * "sõne";  		#jutumärkide vahel on tulemus alati 0, välja arvatud, kui " " vahel on arv
echo "<br /><br />";   

echo (int) 0.25;  
echo "<br /><br />"; 

echo (int) 1.75;  
echo "<br /><br />";

echo "sõne"; 
echo "<br /><br />";

echo 'sõne kahel real'; 
echo "<br /><br />";
echo 'sõne\nkolmel real';
echo "<br /><br />";
echo 'sõne sees \'ülakoma\'';
echo "<br /><br />";





