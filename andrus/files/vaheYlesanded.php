
<?php
/**
 * @author peeter
 * 
 */
//Ülesanne-1 Andrus Kull 09.12.14
/*	$enimi = "Andrus";
	$pnimi = "Kull";
	$nimi = $enimi.' '.$pnimi;
	$vanus = 32;
	$kaal = 72;

	echo "$nimi on $vanus aastane ja kaalub $kaal kg!";
	echo "Tere tulemast $enimi $pnimi!";
*/
/*
 * Eeldades, et hetkel on kolmas veebruar 2015 kell 4:52:31, lisan dünaamiliselt hetke aja väljatrüki kujul
    1 “03.02.2015 04:52:31”,
    2 “20150203”,
    3 “2” (kuu),
    4 “3” (kuupäev) ja
5 “4:05” (tund).

 * */
?>
<ol>
	<li>
		<?php
		echo date('d.m.Y H:i:s');
		echo "<br/>";
		?>
	</li>
	<li>
		<?php
		echo date(omd);
		echo "<br/>";
		?>
	</li>
	<li>
		<?php
		echo date(n);
		echo "<br/>";
		?>
	</li>
	<li>
		<?php
		echo date(j);
		echo "<br/>";
		?>
	</li>
	<li>
		<?php
		echo date('G:i');
		?>
	</li>
</ol>
<?php
#echo "<br/>";

/*
 *Kirjutan teksti välja “Kas Teil on ühiseid "alaealisi" lapsi?” neljal moel:
    1 HTML-s,
    2 PHP-s jutumärkide vahel,
    3 PHP-s ülakomade vahel,
4 PHP-s eelnevalt väärtustatud muutujaga. 
 * */
?>
<ol>
	<li>Kas Teil on ühiseid "alaealisi" lapsi?</li>
	<li>
		<?php 
		echo "Kas Teil on ühiseid \"alaealisi\" lapsi?";
		?>
	</li>
	<li>
		<?php
		echo 'Kas Teil on ühiseid "alaealisi" lapsi?';
		echo "<br/>";
		?>
	</li>
	<li>
		<?php
		$text = 'Kas Teil on ühiseid "alaealisi" lapsi?';
		echo $text;
		?>
	</li>
</ol>

<!-- Muutuja slide 26 -->
<?php 
	$enimi = "Andrus";
	$pnimi = "Kull";
	$nimi = $enimi.' '.$pnimi;
	$vanus = 32;
	$kaal = 72;

//	echo "$nimi on $vanus aastane ja kaalub $kaal kg!";
	echo "Tere tulemast {$enimi}perenimi $pnimi!", "<br/>";
?>

<!-- Talitus funktsioon slide 27 -->
<?php 
	function funktsiooniNimi($arv1, $arv2){
		$arv4 = $arv1 + $arv2;
		return ($arv4);
	}
	
	echo funktsiooNinimi(1, 2);
?>
<?php 
/*
 function funktsion2(){
 	$nr1 = 6;
 	$nr2 = 2;
 	
 	$nr3 = $nr1 * $nr2;
 	
 	return ($nr3)
 }
 
 echo funktsion2($nr3);*/
?>
<?php 
	echo "<br/>";
	echo strlen("Süütuse eeldamine.", "UTF-8");
	echo "<br/>";
	echo mb_strlen("Süütuse eeldamine.");
?>
<?php 
	echo "<br/>";
	echo ucfirst ("Tere tere");
	echo "<br/>";
?>
<!-- slide 36 talitused -->
<?php 
	echo mb_strlen("Süütuse eeldamine.");
	echo "<br/>";
	echo htmlspecialchars('mysql databases -h localhost -u databases -p < [faili nimi].sql', ENT_HTML5, "UTF-8");
	echo "<br/>";
	
	$sona = 'phoneNumber';
	echo 'get'.ucfirst($sona);
	echo "<br/>";
	
	$nimi = "andrus kull";
	echo ucwords($nimi);
	echo "<br/>";
	
	echo trim('"In Transitsion 2.0"', '"');
	echo "<br/>";
	
	echo mb_strtolower('In Transition 2.0', 'UTF-8');
	echo "<br/>";
	
	echo mb_strtoupper('In Transition 2.0', 'UTF-8');
	echo "<br/>";
	
	$nr1 = 2015.16;
	echo number_format($nr1, 1, '.',' '), "<br>";
	$nr = '2015,16';
	echo number_format($nr, 1, '.',' '), "<br\>";
?>
