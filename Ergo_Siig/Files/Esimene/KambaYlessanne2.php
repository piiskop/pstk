<?php
/**
 * Liidab, korrutab, votab jaagi ja uuesti liidab
 * siis tagastab jaagi ja summa
 * väljastab kuupäeva (funktsooni sees)
 * kirjutab kuubäeva ja $kokku kokku
 * lopuks on a ja b tagastus, valjastab jaagi ja summa
 * kutsub välja funktsiooni uu ja teeb nendega tehteide funktsiooni sees
 * @author PP, Reigo, 
 * @param integer $a
 * @param integer $b
 * @return string
 * @return arvutada ikka ei viitsi ise selleks on tänapäeval masinad. Eks näis 
 * mis tuleb kui käima lasta -> moni error ikka on.
 * RR - annab stringi '5551554 soojad pirukad14.03.2015'
 */
function uus ($a, $b)
{
	$s = 582 + 6655;
	$tulemus = $a * $b;
	$jaak = $a % $b;
	$summa = $b + $a;
	echo "jaak on : ". $jaak . '<br />';
	echo "summa on : ". $summa . '<br />';
	$kokku = $tulemus + $jaak + $summa . ' soojad pirukad';
	$date = date('d.m.Y');
	$kokku = $kokku . $date;
	return $kokku;
}
uus(5, 4);
echo $tulemus;
echo $jaak, " ", $summa;
echo uus(17, 54);
uus(54, 999);
$s=54+999;
echo ucwords(uus(555,999));