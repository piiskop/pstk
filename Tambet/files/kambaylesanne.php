<?php
/**
 * @author Tõnis, Kaia * 
 * @param number $yks = 1
 * @param number $kaks = 1
 * @return string 
 */
function a($yks, $kaks) {
	$c = 'B1234566'; // muutuja ja väärtus
	$d = '<br />' . 'EHEE' . '<br />'; // muutuja ja väärtus
	$x = $c - $d; // muutuja milles lahutatakse eelnevalt määratud muutujad
	              // kui funktsiooni esimene parameeter on suurem kui üks ja teine parameeter väiksem kui kümme
	if ($yks > 1 && $kaks < 10) {
		$count = strlen ( trim ( $x ) ); // loeta
		$midagi = ucfirst ( $c ); // muutuja $c väärusel tehakse esimene täht suureks ja kirjutakse muutuja $midagi väärtuseks
	}
	$x .= ' (' . $yks . ', ' . $kaks . ')';
	if ($c === $yks) {
		$kaks = $c;
	} else if (strlen ( $yks ) > strlen ( $kaks )) {
		echo "vale info on ikka äge";
	} else {
		$kaks = a ( $yks, $kaks );
	}
	;
	$m = 567;
	// while (1 > 0){ echo 'sure arvuti';}
	
	return $x;
}
echo "test";
exit ();
// Hoiatus: üritatakse kuvada defineerimata muutujaid $yks ja $kaks
echo $yks, "</br>", $kaks;

/*
 * Kui funktsioon a parameetritega 1 ja 1 välja kutsuda,
 * ei kuva see ekraanile midagi.
 * Rida 36 põhjustab lõputu tsükli, nii et tagastamiseni ei jõuta.
 */
echo a ( 1, 1 );