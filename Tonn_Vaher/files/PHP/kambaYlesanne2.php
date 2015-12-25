<?php
/**
 * peax vastu võtma kolme muutuja info millest viimane peax olema täis number 
 * @author Ergo, juri
 * @param number|string $edu saab kõigepealt suure esimese tähe omale siis 
 * jälle väixex siis kui i on suurem kui null saab errori
 * @param number|string $kirjutamisel saab sõnad liidetud summaks ja siis 
 * kasutatakse $edu omastamisel mingix asjax - väärtusex jääb muutuja algväärtus
 * @param int $i saab ühe juurde et olla $vahe siis kasutatakse teda ifis kui 
 * ta on suurem kui 0 siis i saab uue väärtuse -10 
 * @return väljastab errori,TERE MIS TOIMUB EITEA MIDAGI
 * 
 */
// Tüübi ette andmine PHP-s töötab ainult objektidele
function getError($edu, $kirjutamisel, int $i) 
{
	$edu = ucword($edu);
	$vahe = $i++;
	$summa = $edu + $kirjutamisel;
	$mingiTehe = $edu - $vahe + $edu;
	echo $summa." ei tea midagi";
	$edu = mb_strtolower($edu);
	if ($i > 0)
	{
		$i = -10;
		$edu = getError($i, $kirjutamisel);
		$edu= ucfirst.getError;
	}
	return $edu;
}
getError("Tere", "mis toimub", 2);
count();
echo "Oleks pidanud keevitajaks minema";
echo getError("jõin", "õlut", 5, 666666666);
echo getError("nunuh nunuh", 15, 90);
getError ("1", "2", 3);