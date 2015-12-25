<?php
echo ' 2: ', is_numeric(FALSE);
if (is_readable(dirname(__FILE__) . '/test.php'))
{
	echo ' 4: fail olemas';
}
else
{
	echo ' 7: faili pole';
}
exit;
if (isset($_GET['numberDay']))
{
	echo ' 4: ', is_numeric($_GET['numberDay']);
}
?>
<form method="get">
<label for="numberDay">Sisesta</label>
<input type="text" class="numberDay" id="numberDay" name="numberDay"/>
<input type="color" name="color"/>
<input type="submit" value="edasi"/>
</form>
<?php
exit;
function timeConvert($mysqlTime)
{

	date_default_timezone_set('Europe/Helsinki');
	
	$date = date_create($mysqlTime);
	$timestamp = date_timestamp_get($date);
	echo $timestamp;
}
$mysqlTime = "2006-12-24 10:12:00";
timeConvert($mysqlTime);
?>
<style type="text/css">
input:invalid
{
	background-color: red;
}
input:valid
{
	background-color: green;
}
</style>
<form>
<input type="checkbox" id="checkbox"/>
<input type="text" spellcheck="true"/>
<input required="required" x-moz-errormessage="katakana" type="url" pattern="https?://.+" step="0.1" onchange="console.log('color: '+this.value);"/>
<input type="submit" formnovalidate="formnovalidate"/>
<input type="submit"/>
</form>
<script type="text/javascript">
var checkbox = document.getElementById("checkbox");
checkbox.indeterminate=true;
</script>
<?php
exit;
/**
 * Created on 27.02.2015
 *
 * @copyright Copyright &copy; 2015, Kalmer Piiskop <pandeero@gmail.com>
 */
header ( 'Cache-Control: no-cache, must-revalidate' );
header ( 'Pragma: no-cache' );
header ( 'Expires: Mon,26 Jul 1997 05:00:00 GMT' );
phpinfo();
function convertDatetime($str)
{

	list($date, $time) = explode(' ', $str);
	list($year, $month, $day) = explode('-', $date);
	list($hour, $minute, $second) = explode(':', $time);

	date_default_timezone_set('Europe/Helsinki');

	$timestamp = mktime($hour, $minute, $second, $month, $day, $year);

	return $timestamp;
}
echo ' 23: ', convertDatetime('2005-02-27 22:37:00');
$trees = array (
	'okaspuud' => array (
		'type' => 'okaspuud',
		'trees' => array (
			'kuusk' => array (
				'type' => 'kuusk',
				'evergreen' => true
			),
			'mänd' => array (
				'type' => 'mänd',
				'evergreen' => true
			),
			'lehis' => array (
				'type' => 'lehis',
				'evergreen' => false
			)
		)
	),
	'lehtpuud' => array (
		'type' => 'lehtpuud',
		'trees' => array (
			'kask' => array (
				'type' => 'kask',
				'evergreen' => false
			),
			'pihlakas' => array (
				'type' => 'pihlakas',
				'evergreen' => false
			),
			'plasticAppleTree' => array (
				'type' => 'plasticAppleTree',
				'evergreen' => true
			)
		)
	)
);

foreach ( $trees as $arrayOfTypeOfTrees ) {
	foreach ( $arrayOfTypeOfTrees ['trees'] as $treeItem ) {
		if ($treeItem ['evergreen']) {
			if ($treeItem['type'] === 'kuusk')
			{
				echo "\n" . ' 54: kuusk on igihaljas: ', $treeItem ['type'];
				continue;
			}
			echo "\n" . ' 34: igihaljas: ', $treeItem ['type'];
		} else {
			echo "\n" . ' 58: ei ole igihaljas: ', $treeItem ['type'];
		}
	}
}
echo "\n";
exit ();
$muutuja = 0;
while ( $muutuja < 2 ) {
	echo ' 13: ', $muutuja, "\n";
	$muutuja ++;
}

$muutuja = 0;
do {
	echo ' 19: ', $muutuja, "\n";
	$muutuja ++;
} while ( $muutuja < 2 );

for($muutuja = 0; $muutuja < 2; $muutuja ++) {
	echo ' 24: ', $muutuja, "\n";
}

$numbers = array (
	0,
	1
);
foreach ( $numbers as $number ) {
	echo ' 33: ', $number, "\n";
}

exit ();
$a = 2;

if ($a == 3) {
	echo ' 14: $a on kolm';
} else if ($a == 2) {
	echo ' 18: $a on kaks';
} else {
	echo ' 18: $a ei ole suurem kui kaks';
}

switch ($a) {
	case 3 :
		{
			echo ' 29: $a on kolm';
			break;
		}
	case 2 :
		{
			echo ' 34: $a on kaks';
			$a ++;
			continue;
		}
	default :
		{
			echo ' 39: $a ei ole kaks ega kolm';
			break;
		}
}

?>
<br />
<?php
// echo '<pre>';
$name = filter_var ( $_GET ['name'], FILTER_VALIDATE_BOOLEAN );
$emailAddress = filter_var ( $_GET ['emailAddress'], FILTER_VALIDATE_EMAIL );
var_dump ( $_SERVER ['PHP_SELF'] );
setcookie ( 'bisquite', true, mktime ( 18, 55, 00, 3, 20, 2000 ) );
?>
<form action="php.php" method="get">
	<label>Nimi:</label> <input type="text" name="name" /> <label>Meiliaadress:</label>
	<input type="text" name="emailAddress" />
	<button type="submit">Jah, tahan saada spämmi.</button>
</form>
<?php
var_dump ( date ( 'd.m.Y H:i:s', mktime ( 0, 0, 0, 1, 15, 1979 ) ) );

// echo '</pre>';
exit ( 40 );
// phpinfo();
// date_default_timezone_set('GMT');
$href = 'a' . 2;

echo ' 12: ', 0 % 2, "\n";
echo ' 15: ', 1 % 2, "\n";
echo ' 16: ', 2 % 2, "\n";
echo ' 17: ', 3 % 2, "\n";
die ( '1' );

?>
Täna on
<?php

$today = date ( 'G:i' );
// We print out the date.
echo $today;
echo "This \nspans
output as well";
if (true) {
	echo ' 20 ';
}

$variable = 1995;
echo 'Muutuja on ' . gettype ( $variable ) . '.<br/>';
settype ( $variable, 'String' );
echo 'Muutuja on ' . gettype ( $variable ) . '.<br/>';
echo 'Kas muutuja on täisarv?' . is_int ( $variable );

$data = 'väljas';
function displayData() {
	$data = 'sees';
	echo $data;
}
displayData ();
echo $data;
function incrementStatic() {
	static $static = 0;
	$static ++;
	if ($static < 10) {
		incrementStatic ();
	} else {
		echo ' 48: ', $static;
	}
}
incrementStatic ();

define ( "NUMBER", 1995 );
echo '<br/>' . NUMBER;

echo '<br/>' . chr ( 13 ) . 'jou';
?>
<br />

echo time ();
</script>