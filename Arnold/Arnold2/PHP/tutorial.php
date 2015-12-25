<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
include '../shiporder/settings.php';
$kristen = array (
	'age' => 20,
	'sugu' => 'mees',
	'phoneNumbers' => array (
		0 => '112',
		1 => '110' 
	) 
);

foreach ($kristen['phoneNumbers'] as $index => $value) {
	if ($value === '112') {
		continue;
	}
	echo ' <br/>38: ', $value;
}
unset($kristen['phoneNumbers'][1]);
echo ' 34: <pre>';
define('PH_NEUTRAL', 7);
var_dump(PH_NEUTRAL);
echo '</pre>';
require_once '../shiporder/settings.php';
try {
	$operand1 = 32;
	$operand2 = 3;
	if ($operand2 == 0) {
		throw new Exception('Nulliga jagada ei saa.');
		
	}
} catch (Exception $exception) {
	echo $exception->getMessage();
} finally {
	echo ' 35 ';
}

/**
 * This function rearranges the words in a string according to the given new
 * order.
 *
 * @author kalmer
 * @param string $parameters['origin']
 *        	the original text
 * @param int[] $parameters['newOrder']
 *        	the new order
 */
function rearrange($parameters) {
	$arrayOfOrigin = explode(' ', $parameters['origin']);
	$arrayOfResult = array ();
	foreach ( $parameters['newOrder'] as $order ) {
		$arrayOfResult[] = $arrayOfOrigin[$order];
	}
	echo ' 76: ', implode(' ', $arrayOfResult);
}

rearrange(array (
	'origin' => 'külmast tulest langes pime leek',
	'newOrder' => array (
		2,
		1,
		0,
		4,
		3 
	) 
));

// XSS
if (isset($_GET) && isset($_GET['say'])) {
	echo '<br/>', $_GET['say'];
}
?>
<a href="?say=kalmer">say "kalmer"</a>
	<a href="?say=%3Cscript%3Ealert%28%27Oh%20no%21%27%29%3C/script%3E">say
		something else</a>
</body>
</html>