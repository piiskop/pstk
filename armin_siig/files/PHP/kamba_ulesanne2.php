<?php
/**
 * kamp(10,3) kuvab "Tahan siia midagi huvitavat kirjutada", returnib 210
 * kamp (4,'ei pane siia numbrit') kuvab "Tahan siia midagi huvitavat kirjutada"
 * ja tuleb error, sest 
 * ei saa $c-ga teha aritmeetilisi tehteid
 *   
 * @param int $a
 * @param int $b
 * @return int|array>
 * @return ei tee midagi -> error
 * @author PP
 */
function kamp($a, $b){
	echo "Tahan siia midagi huvitavat kirjutada";
	$c=$a+$b;
	$c = $c++;
	$c = $c * ($a * $b / 2);
	$misvarkOn = $c % $a;
	$kala = $b % $c;
	$m="see on programm";
	if ($c == 2){
		echo 'väga väga halb';
		break;
	};
	for ($a=1; $a > $kala; $a++) {
		echo 'Jee'. '<br />';
	}
	echo $m;
	if (($m = 2) ==$a)
	{
		$c = array (
				'c' => $c,
				'a' => $a,
				'b' => $b,
				'misvarkOn' => $misvarkOn,
				'kala' => $kala,
				'm' => $m
		);
	}
	return $c;
}
echo $m, "on";
echo kamp(10, 3);
echo '<br />';
echo 'Oli ju ilus kood';
echo "Loodan, et funktsioon tsüklisse ei jäänud :)";
//echo kamp(4, 'ei pane siia numbrit');
echo kamp(4, 15);