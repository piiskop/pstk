<?php
//phpinfo();
$href= "see on href";
$lause="Kas Teil on ühiseid \" alaealisi \" lapsi?";
echo " Aasta: ", date(" Y "), " kuu: ", date(" m ");
echo "kahel \n\"real";
echo $href;
echo "\n". ">";
echo date ("d.m.Y. h:m:s"), " päev.kuu.aasta tund:minut:sekund";
echo "\n". ">";
echo date ("Ydm");
echo "\n". ">";
echo date ("n");
echo "\n". ">";
echo date ("j");
echo "\n". ">";
echo date ("G:i");
// Kas teil on ühiseid "alaealisi"lapsi?
echo "</br>";
echo $lause;
echo "\n";
echo "Kas Teil on ühiseid \" alaealisi \" lapsi?";
echo "\n";
echo "Kas Teil on ühiseid ' alaealisi ' lapsi?";
echo "</br>";
?>
<!doctype html>
<html>
<meta charset="utf-8">
<?php $lause="Kas Teil on ühiseid \" alaealisi \" lapsi?"; ?>
<ol>
<li> Kas Teil on ühiseid " alaealisi " lapsi?</li>
<li> <?php echo "Kas Teil on ühiseid  ' alaealisi ' lapsi?"; ?></li>
<li> <?php echo "Kas Teil on ühiseid \" alaealisi \" lapsi?";?> </li>
<li> <?php echo $lause;?> </li>
</ol>
</html>

<?php 
//Failide sisse lugemine
echo "indeks";
echo "\n";
require_once "home.php";
require_once 'work.php';
echo "</br>";

//Muutuja ($esimene= "mingi väärtus";) 1.muutujale väärtus, 2.muutujale 1 väärtus, 3.muutujale 2 väärtus, echo
$esimene= "Esimene ";
$teine = $esimene." Mees " ;
$kolmas= "{$teine}Kuul ";
echo $kolmas;
echo "</br>";

//Talitus (f unction funktsiooninimi(sisend siia) {talitlus siia;} ). 
function kaks_korda_kaks($viies=2)
{
	return $viies * 2;
}
echo kaks_korda_kaks();
echo "</br>";

//Sõne pikkuse mõõtmine(mb_strlen)
echo strlen ("õ");
echo "</br>";
echo mb_strlen ("õ", "UTF-8");
echo "</br>";
echo mb_strlen ("Süütuse eeldamine.", "UTF-8");
echo "</br>";

//htmlspecialchars	kuvab spetsiaalmärke sõnena, mitte koodina
echo htmlspecialchars("<div> </div>", ENT_COMPAT, "UTF-8");
echo "<div> </div>";

//ucfirst.			 Esimese tähe suurtähtedeks
echo ucfirst("tambet");
echo "</br>";
// ucwords. 

// trim.			 Eemaldab esimese märgi
echo trim("Tambet Song", "T");
echo "</br>";

// mb_ strtolower.	 Väiketähtedeks
echo mb_strtolower("KALMER");
echo "</br>";

//number_format
echo "</br>";

//Harjutus Talitlused
//2.
$sõne="mysql databases -h localhost -u databases -p < [faili nimi].sql";
echo htmlspecialchars($sõne);
echo "</br>";
//3.välja nimi phoneNumber, võtmistalitlusega teha getPhone Number
function trancport_fieldName_to_functionName($fieldNane)
{
	$trancformeFieldName= ucfirst($fieldNane);
	$nameOfFunction= ("get").$trancformeFieldName;
	return  ("$nameOfFunction");
}
echo trancport_fieldName_to_functionName("phoneNumber");
echo "</br>";

//4. ESIMESED SUURED TÄHED
echo ucfirst("tambet song");
echo "</br>";
//5.
echo ("In Transaction 2.0");
echo "</br>";
//6.VÄIKETÄHTEDEKS
echo mb_strtolower("In Transaction 2.0");
echo "</br>";
//7. SUURTÄHTEDEKS
echo mb_strtoupper("In Transaction 2.0");
echo "</br>";
//8. ARV 2015,15 KUJULE 2 015.2
echo number_format(2015.16, 1,".", " ");
echo "</br>";

?>
