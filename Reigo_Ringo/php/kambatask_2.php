<?php
/**
 * Mad cow mess.
 * esimesele antakse väärtus 20, teisele "Vastus on", uusvärk annab Vastus ei ole 20,
 * $x on 20-125, $z on 78963, $y on 20*"Vastuson"/20, echotakse "Vastus ei ole 20",
 * $teine .......
 * Ei saa enam aru...... * @Tambet
 * 
 * @param number/sting $esimene
 * @param String $teine
 * @return number
 * 
 * 
 * $teine kasutab samafunktsiooni, sisendiks $teine ja FALSE.
 * $x on kolme arvu jagatiste jääkide jagatise jääk.
 * $m lahutab esimesest 15 ja korrutab kahega. 
 * Kui $esimene ja $teine võrdsed, siis väljastatakse $x.
 * Funktsioon tagastab teeb_midagi, mis ei ole muutuja ega funktsioon ... . @Tarmo
 */
function teeb_midagi($esimene, $teine) {
	$esimene = 10 * 2;
	//$teine = "Vastus on "; // string = 0
	$teine = 100;
	$uus_vark = "Vastus ei ole " . $esimene;
	$x = $esimene - 125;
	$z=78963;
	$y = $esimene * $teine / $esimene;
	//alusta uus tehe
	//$teine = teeb_midagi($teine, FALSE);
	$x = $x % $y % $z; // siin nulliga jagamine võtab jäägi 0-ga
	$m = ($esimene - 15) * 2;
	if ($esimene==$teine)
	{
	return $x;
	}
	//return teeb_midagi;
	echo $uus_vark . '<br />' . $y . '<br />' . $x . '<br />' . $m;
}
echo teeb_midagi(123, "afds");
//echo $x;


