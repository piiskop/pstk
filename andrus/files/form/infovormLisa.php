<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
ini_set ( 'display_errors', 1 );
if (defined ( 'E_DEPRECATED' )) {
	error_reporting ( E_ALL & ~ E_DEPRECATED & ~ E_STRICT );
} else {
	error_reporting ( E_ALL & ~ E_STRICT );
}
date_default_timezone_set ( 'Europe/TAllinn' );

// lisab vormist saaadus andmed muutujasse
$number1 = $_GET ['n1'];
$number2 = $_GET ['n2'];

echo 'Number 1 on ' . $number1;
echo "<br/>";
echo 'Number 2 on ' . $number2;
?>
<h1>Else If</h1>
<br>
<p>Kontrollin arvu Number <?php echo($_GET ['n1']);?>:</p>
<?php
if ($_GET ['n1'] < 10) {
	echo 'Sisestatud arv ' . $_GET ['n1'] . ' on vaiksem kui kymme';
} elseif ($_GET ['n1'] == 10) {
	echo 'Sisestatud arv on ' . $_GET ['n1'];
} else {
	echo 'Sisestatud arv on suurem ku kymme';
	echo "<br/>";
	echo 'Sisestatud arv on ' . $_GET ['n1'];
}
?>
<p>Kontrollin arvu Number <?php echo($number2);?>:</p>
<?php
$residue = $number2 / 2;
if (is_float ( $residue )) {
	echo ("Sisestatud arv on paaritu");
} else {
	echo ("Sisestatud arv on paaris");
}
?>