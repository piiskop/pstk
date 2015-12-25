<?php
/**
 * @
 */

echo 'Aeg: '. date('d.m.Y G:i:s'. 1);
echo '<br />';
echo 'Aeg: '. date('D.M.y g:I:S'. 1);
echo '<br />';
echo "WTF is \nsõne";
echo '<br />';
echo "WTF is \"sõne\"";

echo '<br /><hr><center>Harjutus 1</center><br />';
echo 'Aeg: '. date('d.m.Y G:i:s');
echo '<br />';
echo 'Aeg: '. date('Ymd');
echo '<br />';
echo 'Aeg: '. date('n');
echo '<br />';
echo 'Aeg: '. date('j');
echo '<br />';
echo 'Aeg: '. date('G:m');

echo '<br /><hr><center>Harjutus 2</center><br />';
?>
<ol>
	<li>Kas Teil on ühiseid "alaealisi" lapsi?</li>
	<li><?php echo '"Kas Teil on ühiseid "alaealisi" lapsi?"<br>'; ?></li>
	<li><?php echo "'Kas Teil on ühiseid \"alaealisi\" lapsi?'<br>";?></li>
	<li><?php $lause = 'Kas Teil on ühiseid "alaealisi" lapsi?'; echo $lause; ?></li>
</ol>
<?php 
echo '<br /><hr><center>Harjutus 3 - Failide liitmine</center><br />';
echo 'Ülesanne eraldi failides. (require)';

echo '<br /><hr><center>Harjutus 4 - Muutuja</center><br />';
$muutuja_int;
$muutuja_int = 7;
$muutuja_string_1 = 'Seitse';
$muutuja_string_2 = "$muutuja_string_1 on t2isarv<br>";
echo $muutuja_string_2;
$muutuja_string_2 = "{$muutuja_string_1}on t2isarv";
echo $muutuja_string_2;

echo '<br /><hr><center>Harjutus 5 - Funktsioon</center><br />';
function liida($num1, $num2)
{
	$summa = $num1 + $num2;
	return $summa;
}
$arv_1 = 3;
$arv_2 = 4;
echo $arv_1.' + '.$arv_2.' = '.liida($arv_1, $arv_2);

echo '<br /><hr><center>Harjutus 6 - Talitlused</center><br />';
echo "\n".'<br><br>1 - Stringi pikkus<br>';
$m66detav = "Süütuse eeldamine.";
echo 'Stringi "'.$m66detav.'" pikkuseks on '.mb_strlen($m66detav, 'UTF-8').'.<br>';
echo 'Stringi "'.$m66detav.'" pikkuseks on '.strlen($m66detav).'.';



echo "\n".'<br><br>2 - String HTML5-ks<br>';
$html5= 'mysql databases -h localhost -u databases -p < [faili nimi].sql';
echo htmlspecialchars ($html5, ENT_HTML5, ini_get("default_charset") , true);

echo "\n".'<br><br>3 - Suur täht<br>';
$valja_nimi = 'phoneNumber';
echo 'get'.ucfirst($valja_nimi);

echo "\n".'<br><br>4 - Suured tähed<br>';
$nimi = 'mihkel siim';
echo ucwords($nimi);

echo "\n".'<br><br>5 - trim<br>';
$trimmitav = '("In Transition 2.0")';
echo trim($trimmitav,'"()');

echo "\n".'<br><br>6 - lower<br>';
echo strtolower($trimmitav);

echo "\n".'<br><br>7 - upper<br>';
echo strtoupper($trimmitav);

echo "\n".'<br><br>8 - numbri vorming<br>';
$muudetav = 2015.16;
echo number_format($muudetav,1,'.',' ');



/*
$suurendatav = 'woop woop woop';
echo ucfirst($suurendatav);
echo ucwords($suurendatav);

$upper = 'See teeb suureks ka õ';
echo mb_strupper($upper);
*/
#########################
#		13.03.2015		#
#########################
echo "\n".'<br><br><h2>13.03.2015</h2><br>';


$esimene	= array(2,4,6,8,10);
$teine		= array(3,5,7,9,11);
for ($i = 0; $i < count($esimene); $i++)
{
	echo "$esimene[$i] + $teine[$i]".' = '.($esimene[$i] + $teine[$i]).'<br>';
}


?>