<html>
<head>
<meta charset="UTF-8">
<title>Esimene</title>
<link type="text/css" rel="stylesheet" href="esimene.css" />
</head>
<?php
/** see näitab vigu, requier see igasse php-se.**/
ini_set("display_errors", 1);
if (defined ("E_DEPRECATED"))
{
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
else
{
	error_reporting(E_ALL & ~E_STRICT);
}
echo "Esimene\n ";
//phpinfo(2);
//echo date('d.m.Y H:i:s',$_SERVER['REQUEST_TIME']);
//echo date("omd");
//echo "                        \n kell\n on:", date('d.m.Y.G:1:s', 1);
?>
<!--  Harjutus:Date-->
<h1>Date</h1>
<?php
//Erinevad võimalused kutsumax funksiooni date()
echo " <br>Date ", date('d.m.Y H:i:s',$_SERVER['REQUEST_TIME']);
echo " <br>Date ", date('Ymd',$_SERVER['REQUEST_TIME']);
echo " <br>Date ", date('n',$_SERVER['REQUEST_TIME']);
echo " <br>Date ", date('j',$_SERVER['REQUEST_TIME']);
echo " <br>Date ", date('G:m',$_SERVER['REQUEST_TIME']);
?>
<!-- Loetelu ja php ja html koos -->

<h1>Loetelu ja Echo</h1>

<ol>
	<li>
		Kas Teil on ühiseid "alaealisi" lapsi?
	<li>
		<?php
			echo "Kas Teil on ühiseid \"alaealisi\" lapsi?";
		?>
	<li>
		<?php
		echo 'Kas Teil on ühiseid "alaealisi" lapsi?';
		?>
	<li>
		<?php
			$lause = 'Kas Teil on ühiseid "alaealisi" lapsi?';
			echo $lause;
		?>
</ol>
<h1>PHP ja HTML erinevatest failidest kokku</h1>
<!-- Erinevatest  failidest lehe kokku panemine-->
	<body>
		<?php require_once 'header.html';?>
		<?php require_once 'body.php';?>
		<?php require_once 'footer.html';?>		
	</body>
<?php
//soovitatakse aksutada "require_once" kui teist faili sisse lugeda ja kutsuda muutujaid sealt
?>
<!--  Harjutus: Muutujad-->
<h1>Muutujad</h1>
<?php
//omistan 2-le muutujale väärtused
$esimene="esimene";
echo $esimene, "<br>";
$osa ="osa";
echo $osa, "<br>";
//Seon 2 muutujat omavahel ja annan selle väärtuse kolmandale muutujale
$kolmas = "$esimene{$osa}";
//näitan kolmandat muutujat
echo $kolmas;
?>
<!--  Harjutus: Muutujad-->
<h1>Funksioonid</h1>
<?php

echo "arvutan a ja b kokku: ";
//Teen funksiooni
function arvuta($a, $b)
{
 	$c = $a + $b * $a;
 	return $c;
}
//näitan ekraanil
echo arvuta(3,4);
?>
<!--  Harjutus: Tähed-->
<h1>Tähed</h1>
<?php
//Näitan tähtede arvu
//mb_strlen ( string $str [, string $encoding = mb_internal_encoding() ] 
echo mb_strlen ("fuck you");
echo "<br>";
//Spetsiaal märgid
//htmlspecialchars ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 
//	[, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] 
echo htmlspecialchars("<//&", ENT_HTML5, "UTF-8");
echo "<br>";
//Esimene täht suureks
//string ucfirst ( string $str )
echo ucfirst ( "fuck you");
echo "<br>";
//Kõik esimesed tähed suureks
//string ucwords ( string $str )
echo ucwords ( "fuck you");
echo "<br>";
//Võetakse tähti vähemax
//string trim ( string $str [, string $character_mask = " \t\n\r\0\x0B" ] )
echo trim ( "fuck you", "ou");
echo "<br>";
//Kõiktähed suureks
//string mb_strtoupper ( string $str [, string $encoding = mb_internal_encoding() ] )
echo mb_strtoupper ( "fuck you");
echo "<br>";
//Numbrite formeering
//string number_format ( float $number [, int $decimals = 0 ] )
echo number_format (345.5432,2);
echo "<br>";
echo "<br>";
echo "<br>";

//Harjutused sõnadele
echo mb_strlen ("Süütuse eeldamine.");
echo "<br>";
echo htmlspecialchars("mysql databases -h localhost -u databases -p < [faili nimi].sql", ENT_HTML5, "UTF-8");
echo "<br>";
echo "getPhoneNumber >>>> ", trim ( "getPhoneNumber", "get");
echo "<br>";

function getnumber($sisestus)
{
	$sisestus = ucfirst ($sisestus);
	$tagastan = "get{$sisestus}";
return $tagastan;
}
echo getnumber("phoneNumber");
echo "<br>";

echo ucwords ( "ergo siig");
echo "<br>";
echo trim ( "(\"In Transition 2.0\")", "(\"\")");
echo "<br>";
echo mb_strtolower ( "(\"In Transition 2.0\")");
echo "<br>";
echo mb_strtoupper ( "(\"In Transition 2.0\")");
echo "<br>";
$muutuja = 2015.16;
echo number_format($muutuja, 1,"."," ");
echo "<br>";
?>
<!--  Harjutus: Tähed-->
<h1>Massiivid</h1>
<?php
$kalad = array(
array (
		"Name" => "Säga",
		"elab" => "meres"
),
array (
		"Name" => "Säga",
		"elab" => "meres"
),
array (
		"Name" => "Meriahven",
		"elab" => "tiigis"
),
);
echo $kalad[1]["Name"];
echo "<br>";
echo $kalad[1]["elab"];
echo "<br>";
echo $kalad[2]["Name"];
echo "<br>";
echo "<br>";
echo "<br>";