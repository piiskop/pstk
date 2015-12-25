<?php
// for session variables
if (!isset($_SESSION))
{
	session_start();
}

// for localization
setlocale(LC_TIME, 'et_EE.UTF-8');
date_default_timezone_set('Europe/Tallinn');

// for seeing errors
ini_set('display_errors', 1);

if (defined('E_DEPRECATED'))
{
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
else
{
	error_reporting(E_ALL & ~E_STRICT);
}

// header
header('Content-type: text/html; charset=utf-8');

/* echo  'Kas Teil on ühiseid "alaealisi" lapsi?';

echo '<br/>',"Kas Teil on ühiseid 'alaealisi' lapsi?";

$commonParameters = array (
		array (
				'Laul' => 'Mälestused',
				'Esitaja' => 'Koit Toome' 
		),
		array (
				'Laul' => 'Mis värvi on armastus?',
				'Esitaja' => 'Uno Loop' 
		) 
);


echo '<pre>';
var_dump ( $commonParameters );
echo '</pre>';



$array1 = array (
		2,
		4,
		6,
		8,
		10 
);
$array2 = array (
		3,
		5,
		7,
		9,
		11 
);

$array3 = array (
		$array1 [0] + $array2 [0],
		$array1 [1] + $array2 [1],
		$array1 [2] + $array2 [2],
		$array1 [3] + $array2 [3],
		$array1 [4] + $array2 [4] 
);

echo '<pre>';
var_dump ( $array3 );
echo '</pre>';


 * <table>
 * <thead>
 * <tr>
 * <th>Laul</th>
 * <th>Esitaja</th>
 * </tr>
 * <tr>
 * <td>Mälestused</td>
 * <td>Koit Toome</td>
 * </tr>
 * <tr>
 * <td>Mis värvi on armastus?</td>
 * <td>Uno Loop</td>
 * </tr>
 * </table>  */
 
//phpinfo(INFO_CREDITS);

/*echo '<pre>';
var_dump ($_SERVER);
echo '</pre>'; */

$strtotime = strtotime('2015-02-03 04:52:31');

$date = date ('d.m.y H:i:s' , $strtotime);
echo $date;

$date = date ('Ymd' , $strtotime);
echo '<br>' .$date;

$date = date ('n' , $strtotime);
echo '<br>' .$date;

$date = date ('j' , $strtotime);
echo '<br>' .$date;

$date = date ('g:i' , $strtotime);
echo '<br>' .$date;

echo '<br>' . date_default_timezone_get();


//mb_strlen ( string $str [, string $encoding = mb_internal_encoding() ] )

echo '<br>' . mb_strlen('Süütuse eeldamine.', 'UTF-8');

$new = htmlspecialchars("mysql databases -h localhost -u databases -p < [faili nimi].sql", ENT_HTML5);
echo '<br>' .$new;

/*$phoneNumber = 'phoneNumber';
$nimi = 'get' . ucfirst('phoneNumber');
$nimi();*/


$trimmed = trim('("In Transition 2.0")' , '"()' );
echo '<br>' .$trimmed;

$mb_strtolower = mb_strtolower('("In Transition 2.0")');
echo '<br>' .$mb_strtolower;

$mb_strtoupper = mb_strtoupper('("In Transition 2.0")');
echo '<br>' .$mb_strtoupper;

echo '<br>' . number_format(2015.16 , 1, ".", " ");

$sentence = 'külmast tulest langes pime leek';

$parts = explode(' ' , $sentence);

$new = array ($parts[2] , $parts[1] , $parts[0] , $parts[4] , $parts[3]);
$new = implode(' ' , $new);
echo '<br>' .$new;







?>