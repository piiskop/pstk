<?php
ini_set('display_errors', 1);
if (defined('E_DEPRECATED')) {
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
else {
	error_reporting(E_ALL & ~E_STRICT);
}
header ( 'Content-Type: text/html; charset=utf-8' );
date_default_timezone_set ( 'Europe/Tallinn' );
echo "Meie aeg on: ", date ( "D-M-Y H:i:s" ), "<br />";
$lause = 'Kas Teil on ühiseid "alaealisi" lapsi?';
?>

<head>
	<script	src="../scripts.js"></script>
	<link rel="stylesheet" href="../CSS/igast.css" type="text/css" media="all" />
</head>
<body>
<button onmousedown="showContents(event);" class="showContents" style="align:right;position:fixed;">Näita sisukorda</button>
<div id="containerForContents" style="display: none; top: 0; left: 0;">
	<h2>Sisukord</h2>
	<ul>
		<li><a href="#" onclick="window.location='#date';this.parentNode.parentNode.parentNode.style.display ='none';return false;">Date</a></li>
		<li><a href="#" onclick="window.location='#echo';this.parentNode.parentNode.parentNode.style.display ='none';return false;">Echo</a></li>
		<li><a href="#" onclick="window.location='#variable';this.parentNode.parentNode.parentNode.style.display ='none';return false;">Muutuja</a></li>
		<li><a href="#" onclick="window.location='#function';this.parentNode.parentNode.parentNode.style.display ='none';return false;">Talitlus</a></li>
		<li><a href="#" onclick="window.location='#length';this.parentNode.parentNode.parentNode.style.display ='none';return false;">Sõne pikkus</a></li>
		<li><a href="#" onclick="window.location='#specialchars';this.parentNode.parentNode.parentNode.style.display ='none';return false;">HTML eritähed</a></li>
		<li><a href="#" onclick="window.location='#upperFirst';this.parentNode.parentNode.parentNode.style.display ='none';return false;">Esiätht suureks</a></li>
		<li><a href="#" onclick="window.location='#upperAllFirst';this.parentNode.parentNode.parentNode.style.display ='none';return false;">Algustähed suureks</a></li>
		<li><a href="#" onclick="window.location='#trim';this.parentNode.parentNode.parentNode.style.display ='none';return false;">Märkide eemaldamine</a></li>
		<li><a href="#" onclick="window.location='#strtolower';this.parentNode.parentNode.parentNode.style.display ='none';return false;">Tähed väikeseks</a></li>
		<li><a href="#" onclick="window.location='#round';this.parentNode.parentNode.parentNode.style.display ='none';return false;">Ümardamine</a></li>
		<li><a href="#" onclick="window.location='#array';this.parentNode.parentNode.parentNode.style.display ='none';return false;">Array</a></li>
	</ul>
</div>


<h1 id="date">
	<a href="http://php.net/manual/en/function.date.php">Date (11-15)</a>
</h1>
<ol>
	<li><?php echo date( 'd.m.y H:i:s' ); ?></li>
	<li><?php echo date( 'Ymd' ); ?></li>
	<li><?php echo date( 'n' ), " <b><i>kuu ilma 0</i></b>"; ?></li>
	<li><?php echo date( 'j' ), " <b><i>päev ilma 0</i></b>"; ?></li>
	<li><?php echo date( 'G:i' ); ?></li>
</ol>
<h1 id="echo">Echo (19-22)</h1>
<ol>
	<li><b><i>HTML </i></b>"Kas Teil on ühiseid "alaealisi" lapsi?</li>
	<li><b><i>jutumärkide vahel </i></b><?php echo "Kas Teil on ühiseid \"alaealisi\" lapsi?"; ?></li>
	<li><b><i>ülakomade vahel </i></b><?php echo 'Kas Teil on ühiseid "alaealisi" lapsi?'; ?></li>
	<li><b><i>muutujaga </i></b><?php echo $lause; ?></li>
</ol>
<h1 id="variable">Muutuja (26-33)</h1>
<?php
$first = 'a';
$second = "{$first}b";
$third = $second . 'c';
?>
<ol>
	<li><?php echo $first; ?></li>
	<li><?php echo $second, " <b><i>loogiliste sulgudega</i></b>"; ?></li>
	<li><?php echo $third, " <b><i>punktiga</i></b>"; ?></li>
</ol>
<h1 id="function">Talitlus (37-40)</h1>
<?php
function kuva($sodi) {
	echo $sodi;
}
kuva ( 'Lorem Ipsum' );
?>
<h1 id="length">Sõne pikkus (44-45)</h1>
<?php
echo "Süütuse eeldamine (mb_strlen): ", mb_strlen ( 'Süütuse eeldamine.', 'UTF-8' ), '<br />';
echo "Süütuse eeldamine (strlen): ", strlen ( 'Süütuse eeldamine.' );
?>
<h1 id="specialchars">HTML eritähed(49-50)</h1>
<?php
echo "ilma ", 'mysql databases -h localhost -u databases -p < [faili_nimi].sql', '<br />';
echo "special ", htmlspecialchars ( 'mysql databases -h localhost -u databases -p < [faili_nimi].sql' );
?>
<h1 id="upperFirst">Esitäht suureks (54)</h1>
<?php
echo 'get' . ucfirst ( 'phoneNumber' );
?>
<h1 id="upperAllFirst">Algustähed suureks (58)</h1>
<?php
echo ucwords ( 'tõnn vaher' );
?>
<h1 id="trim">Märkide eemaldamine (62-63)</h1>
<?php
$sona = '"(In Transition 2.0)"';
echo trim ( $sona, '"()' );
?>
<h1 id="strtolower"> Tähed väikeseks (67)</h1>
<?php
echo mb_strtolower ( $sona, 'UTF-8' );
?>
<h1 id="strtoupper">Tähed suureks (71)</h1>
<?php
echo mb_strtoupper ( $sona, 'UTF-8' );
?>
<h1 id="round">Ümardamine (76)</h1>
<?php
// number, mitu kohta, koma koht, tuhandete vahe
echo number_format ( 2015.16, 1, '.', ' ' );
?>
<h1 id="array">Array (80-86)</h1>
<?php
$a1 = array (2,4,6,8,10);
$a2 = array (3,5,7,9,11);
$i = 0;
while ($i < 5) {
	echo $a1[$i] + $a2[$i] . " ";
	$i++;
}
?>
</body>