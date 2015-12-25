<?php
$a='arm';
$b="{$a}2";
$c=$a+$b;
echo "$b<br>";

function kirjuta()
{
	echo ('süütuse	eeldamine');
}
kirjuta();

$str = 'Süütuse eeldamine.';
echo 'Lauses "' . $str . '" on ' . mb_strlen($str, 'UTF-8')
. ' tähemärki.<hr />';

echo mb_strtoupper($str, 'UTF-8') . '<hr />';

$str = '("(In Trans()ition 2.0)")';
echo trim($str, '()"') . '<hr />';

echo number_format(2015.16, 2, '.', ' ');