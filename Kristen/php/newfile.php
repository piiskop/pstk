<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<html>
<?php
$string1="a";
$string2="b";
echo PHP_INT_MAX.'. '.pow(2, 32)/2-1 ."<br>";
echo $string1." ".$string2."<br>";
echo PHP_VERSION;
?>
<p>Kas teil on ühiseid "alaealisi" lapsi?</p>
<?php 
echo "Kas teil on ühiseid \"alaealisi\" lapsi?"."<br>"; // \-erimärk järgneb sellele
echo 'Kas teil on ühiseid "alaealisi" lapsi?'."<br>";
$a="Kas teil on ühiseid";
$b=" \"alaealisi\" lapsi?";
echo $a.$b."<br>";
print_r("mingi sõne<br>");
$kristen = array(
		'age'==20,
		'sugu'=='mees',
		'phonenumber'==array(
				'112',
				'110'
	)
)

?>