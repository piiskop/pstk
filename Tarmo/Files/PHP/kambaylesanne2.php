<?php
/**
 * Oluline osa (mis puudutab tagastust):
 * funktsioon kontrollib, kas esimese parameetri vaartus on taisarv.
 * Kui on, suurendab seda 2 vorra, kuvab saadud vaartuse ekraanile ja 
 * tagastab selle.
 * Kui esimene parameeter ei ole taisarv, kontrollitakse, 
 * kas teine on 9. Kui jah, kuvatakse ekraanile
 * lause "9 is just went wrong" (ja tagastatakse
 * defineerimata muutuja $somethingUp...). Kui ei, kutsutakse
 * sama funktsioon uuesti valja parameetritega 0, 1, 2, 3
 * ja tagastatakse tulemus vastavalt kommentaari alguses
 * kirjeldatud toimingutele.
 * 
 * @author Kaia, kalmer
 * @param int $first
 * @param int $second
 * @param int $third
 * @param int $last
 * @return int $somethingUp
 */
function makeSomethingUp($first, $second, $third, $last){
	if (is_int($first)) {
		$first++; # 456
		$somethingUp = ++$first; # 457
		echo $somethingUp; # 457
	}
	elseif ($second == 9) {
		echo $second. " is just went wrong";
	}
	else
	{
		$somethingUp = makeSomethingUp(0,1,2,3);
	}
	$third = $somethingUp + $second; # 7145
	$last = 'viimane';
	return $somethingUp; # 457

}
//first
echo makeSomethingUp(455, 6688, 877, 455); # 457


?>

<?php 
echo mk_time('%D');
?>
?>