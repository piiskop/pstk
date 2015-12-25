
<?php
echo "Hello <strong>Buddy</strong>";
print ("Hello <strong>Buddy</strong>");
echo '<input type="text" name="name" value="Esimene">';
echo "<input type=\"text\" name=\"name\" value=\"Teine\">";
echo "<input type='text' name='name' value='Kolmas'>";
//Ühe rea kommentaar
/*
Mitme rea kommentaar
01.03.2015
*/

//Muutujan name kasutatakse väljaspool praegust php lõiku.
$name = "Mihkel";
?>

<input type="text" name="name" value="Tere <?php echo $name?>">

<?php
$number = 25;
$_number =25.7;
$bool = true;
echo 'Nimi: '.$name.'Number: '.$number;
echo 'Nimi: $name Number: $number';
echo "Nimi: $name Number: $number";

echo '<br>-----<br>';
echo '$num = 4;<br>$num += 3<br>$num is now 7<br>';
$num = 4;
$num += 3;
echo $num;
echo '<br>-----<br>';
$liida_sõnu = 'Algus';
$liida_sõnu .= ' Lõpp';
echo $liida_sõnu;
//02.03.2015
echo '<br>/*****IF*****/<br>';
if (0)
{
	echo 'FALSE';
}
else if (1)
{
	echo 'TRUE';
}
else
{
	echo 'Siia ei jõua.';
}

echo '<br>/*****IF LÜHEM*****/<br>';
if (1==1 ? 'TRUE' : 'FALSE');
	echo 'Toene<br>';
if (1==='1' ? 'TRUE' : 'FALSE');
	echo 'V22r<br>';

echo '<br>/*****WHILE LOOP*****/<br>';
$loendur = 1;
while ($loendur <= 10)
{
	echo $loendur.'<- Loenduri vaartus.<br>';
	$loendur++;
}

echo '<br>/*****DO WHILE LOOP*****/<br>';
$loendur=25;
do
{
	echo $loendur.'<- Loenduri vaartus.<br>';
	$loendur++;
}while($loendur <= 10);

echo '<br>/*****FOR LOOP*****/<br>';
for ($i=0;$i<10;$i++)
	echo $i.' ';

echo '<br>/*****SWITCH*****/<br>';
$number = 3;
switch ($number)
{
	case 0:
		echo 'Number on 0.';
		break;
	case 1:
		echo 'Number on 1.';
		break;
	case 2:
		echo 'Number on 2.';
		break;
	case 3:
		echo 'Number on 3.';
		break;
	default:
		echo 'Number on midagi muud.';
		break;
}
$today = 'Monday';
switch ($today)
{
	case 'Monday':
		echo 'Today is monday.';
		break;
	default:
		echo 'Today is not monday';
		break;
}

echo '<br>/*****Function*****/<br>';
function name($first , $last)
{
	echo $first.' '.$last;
}
function add($num1, $num2)
{
	$sum = $num1 + $num2;
	return $sum;
}
function name_age($first, $age)
{
	echo $first.' '.$age;
}
$first_name = 'Mihkel';
$last_name = 'Siim';
// string + string
name($first_name, $last_name);
//int + int
echo add(3,4);
//string + int
name_age($first_name, 28);

echo '<br>/*****GLOBAL VARIABLE*****/<br>';
$user_ip = $_SERVER['REMOTE_ADDR'];
function echo_ip()
{
	global $user_ip;
	echo $user_ip;
}
echo echo_ip();

echo '<br>/**************************/<br>';
echo '<br>/*****STRING FUNCTIONS*****/<br>';
echo '<br>/**************************/<br>';

echo '<br>/*****str_word_count*****/<br>';
echo $lause = 'See on naidis lause, & ! * selles lauses sonade arvuks on: ';
$sonade_arv_lauses = str_word_count($lause);
echo '<br>'.$sonade_arv_lauses;

//Koma järgi null on sama, mis ilma numbrita.
$sonade_arv_lauses = str_word_count($lause, 0);
echo '<br>'.$sonade_arv_lauses.'<br>';

//Koma järgi üks teeb lausest array. Array väärtuseks on sõna positsioon.
print_r ($sonade_arv_lauses = str_word_count($lause, 1));
echo '<br>';

//Koma järgi kaks teeb lausest array. Array väärtuseks on algustähe positsioon.
print_r ($sonade_arv_lauses = str_word_count($lause, 2));
echo '<br>';
//Kolmandaks saab sulgude sisse panna tähemärke, mida soovime lugeda sõnaks.
//Eelnevalt oli lauses 9 sõna, all oleva käsuga loetakse kokku 12 sõna.
print_r ($sonade_arv_lauses = str_word_count($lause, 0, '&!*'));
echo '<br>';
print_r ($sonade_arv_lauses = str_word_count($lause, 1, '&!*'));
echo '<br>';
print_r ($sonade_arv_lauses = str_word_count($lause, 2, '&!*'));


echo '<br>/*****shuffle*****/<br>';

$tahtede_segamine = str_shuffle('abcdefghijklmnopqrstuv0123456789');
echo $tahtede_segamine;

echo '<br>/*****substring( , , )*****/<br>';
//substringi abil saab stringist võta teatud tähtede lõigu.
//Keskmine on alguspositsioon(kaasa arvatud), viimane on soovitud stringi pikkus.
$pool_1 = substr($tahtede_segamine,0,5);
$pool_2 = substr($tahtede_segamine,2,5);
echo $pool_1.'<br>';
echo $pool_2;

echo '<br>/*****strrev( )*****/<br>';
$oiget_pidi = 'See on katsetus.';
$valet_pidi = strrev($oiget_pidi);
echo $oiget_pidi.'<br>'.$valet_pidi.'<br>';

echo '<br>/*****<strong>similar_text( , , )</strong>*****/<br>';
$lause_1 = 'See on minu esimene lause vordluseks.';
$lause_2 = 'See on minu teine lause vordlemiseks.';
similar_text($lause_1, $lause_2, $tulem);
echo 'Vorreldakse lauseid: <br>"'.$lause_1.'"<br>"'.$lause_2.'".<br>';
echo 'Nende sarnasus on: '.$tulem.'%';

echo '<br>/*****<strong>strlen( )</strong>*****/<br>';
$lause_1_pikkus = strlen($lause_1);
echo $lause_1_pikkus;

echo '<br>/*****<strong>trim( )</strong>*****/<br>';
$trimmitav = '        Whitespace eemaldamine vasakult ja paremalt.  ';
//Stringi pikkus
echo strlen($trimmitav).'<br>';
//Whitesspace eemaldatakse nii vasakult kui paremalt.
echo strlen(trim($trimmitav)).'<br>';
//Whitespace eemaldatakse vasakult.
echo strlen(ltrim($trimmitav)).'<br>';
//Whitespace eemaldatakse paremalt.
echo strlen(rtrim($trimmitav)).'<br>';

echo '<br>/*****<strong>array</strong>*****/<br>';
$toidud = array('Pasta','Riis','Kartul');
echo $toidud[1].$toidud[0].'<br>';
print_r ($toidud);
echo '<br>';
$toidud[3] = 'Liha';
print_r ($toidud);
echo '<br>';
echo '<br>/*****<strong>Associative Arrays</strong>*****/<br>';
$toidud_2 = array('Pasta'=>300,'Riis'=>150,'Kartul'=>200);
echo $toidud_2 ['Riis'];
echo '<br>';
echo $toidud_2 ['Pasta'];
echo '<br>';
echo $toidud_2 ['Kartul'];

echo '<br>/*****<strong>Multi-dimensional Arrays</strong>*****/<br>';

$inimesed = 
	array(
		'mehed'=>array('Mats','Ats','Joonas'),
		'naised'=>array('Juula', 'Luuli', 'Loona'));


echo $inimesed['mehed'][0];
echo $inimesed['mehed'][2];
echo $inimesed['naised'][2];

echo '<br>/*****<strong>Multi-dimensional Arrays</strong>*****/<br>';
foreach ($inimesed as $sugu => $sisemine_array) 
{
	echo $sugu.'<br>';
	foreach ($sisemine_array as $nimi) 
	{
		echo $nimi.'<br>';
	}
	echo '<br>';
}


/******20.03.2015*******/
echo "<h3>20.03.2015</h3>";
$monay = array (
	'coins' => array(
	'naming' => 'cent',
	'value' => 5
	),
	
	array(
		'naming' => 'centavo',
		'value'=>5
	)
);
print_r($monay);
var_dump($monay);

define ('PII',3.14);
echo PII;
var_dump(PII);
var_dump(pii);//Viskab errori kuna defineerimisel on suured tähed
define ('PIII',3.14,TRUE);
var_dump(piii);//Ei viska errorit kuna defineerimisel on kolmanal kohal TRUE

var_dump(date_default_timezone_get());

var_dump(time(void));
//var_dump(strftime('%D'));
//var_dump(date('d.m.Y H:i:s', mktime(0,0,0,1,15,1979));
//var_dump(mktime


/**********************/
?>
<!-- GET POST -->
<?php 
var_dump();
?>
<hotm action="php-php"  method="get">
	<label>Nimi:</label>
	<input type="text" name="name"></input>
	<label>Meiliaadress:</label>
	<input type="text" name="name"></input>
	<button type="submit"></button>
</form>

<!-- COOKIE -->