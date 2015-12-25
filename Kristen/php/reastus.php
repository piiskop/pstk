<!DOCTYPE HTML>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<?php
$tabel=array(
		"<figure><img src=\"http://i.imgur.com/as8A7Dm.png\" alt=\"Päikeseloojangu ajal\"><figcaption>Päikeseloojangus</figcaption></figure>",
		"<figure><img src=\"http://i.imgur.com/Lby4iRd.png\" alt=\"Pilt seinal\"><figcaption>Käisime pildistamas</figcaption></figure>",
		"<figure><img src=\"http://i.imgur.com/xQuldqr.png\" alt=\"Rannas 2015 septembris\"><figcaption>Rannas 2015</figcaption></figure>",
		"<figure><img src=\"http://i.imgur.com/J856vW7.png\" alt=\"Peale Gerli lõpetamist\"><figcaption>Kui Gerli kooli lõpetas</figcaption></figure>"
);
$paaris=array(
		2,4,6,8,10
);
$paaritu=array(
		1,3,5,7,9
);
$summa=array(
		$paaris[0]+$paaritu[0],
		$paaris[1]+$paaritu[1],
		$paaris[2]+$paaritu[2],
		$paaris[3]+$paaritu[3],
		$paaris[4]+$paaritu[4]
);
$arv=1;
$burks=$arv." kanaburger";
$jooksöök="koola ja ".$burks;
echo $jooksöök;
print_r($summa);
print_r($tabel);
echo INFO_GENERAL."<br>";
echo INFO_CREDITS."<br>";
echo INFO_CONFIGURATION."<br>";
echo INFO_MODULES."<br>";
echo INFO_ENVIRONMENT."<br>";
echo INFO_VARIABLES."<br>";
echo INFO_LICENSE."<br>";
echo INFO_ALL."<br>";
echo date('d.m.y H:i:s')."<br>";
echo date('omd')."<br>";
echo date('n')."<br>";
echo date('j')."<br>";
echo date('H:i')."<br>";
$algus=0;
while ($algus<count($tabel)){
	echo "while ".$tabel[$algus];
	$algus++;
};
$koht=0;
do{
	echo "do-while ".$tabel[$koht]."<br>";
	$koht++;
}while($koht<count($tabel));
for($i=0;$i<count($tabel);$i++){
	echo "for ".$tabel[$i]."<br>";
};
foreach ($tabel as $k=>$value){
	echo "foreach ".$tabel[$k]."<br>";
};
echo "stringlength: ".strlen("Süütuse eeldamine")."<br>";
echo htmlspecialchars("mysql databases -h localhost -u databases -p < [faili nimi].sql")."<br>";
/*kas eelmine rida on ikka string v mitte*/
if (is_string(htmlspecialchars("mysql databases -h localhost -u databases -p < [faili nimi].sql"))){
	echo "Jepp"."<br>";
}else{
	echo "nope"."<br>";	
};
$allah="phoneNumber";
$muutuja = "get".ucfirst($allah);
$muutuja();
