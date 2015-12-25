<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php  require_once 'configuration.php';?>
<?php

$pere = array (
		1,
		2,
		3,
		4,
		5,
		6,
		7,
		8,
		9 
);
/**
 * i on 0, kuni i on nii suur kui pere sisu,
 * ja kui i vabajääk on 1
 * kuva masiivist pere s.
 * iga tsükli järel suurenda i ühe võrra
 */
$i = 0;
while ( $i < count ( $pere ) ) {
	if ($i % 2 == 1) {
		echo "<br> 23: ", $pere [$i];
	}
	$i ++;
}
echo "<br>";

/**
 * Kasuta DO
 */
$i = 0;
do {	
	$i % 2 == 1;
	echo $pere [$i];
	$i ++;
} while ( $i < count ( $pere ) );


/**
 * Kasuta PRE
 */
echo " <pre>";
print_r ( $pere );
echo "</pre>";

/**
 * KASUTA VAR_DUMP
 */
var_dump ( $pere );

?>

</body>
</html>
