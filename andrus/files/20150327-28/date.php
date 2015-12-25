<?php

require_once '../conf.php';
/**
 * 1.1 Sisendid
 * Kujul “yyyy-mm-dd hh:mm:ss”:
 * 1.1.1: algushetk (nt “2005-02-26 07:30:00”),
 * 1.1.2: lõpuhetk (nt “2005-02-27 22:37:00”)
 *
 * 1.2 Väljundid
 * Algus- ja lõpuhetke vahemik võimalikult lühikesel kujul:
 * 1.2.1: “d.m.y h-h”,
 * 1.2.2: “d.m.y h:m-h:m”,
 * 1.2.3: “d.-d.m.y” (nt “26.-27.2.2005”),
 * 1.2.4: “d.m.-d.m.y”,
 * 1.2.5: “d.m.y-d.m.y”.
 *
 * 1.3 Selgitus
 * Iga sündmuse algushetk ja lõpuhetk hoitakse andmebaasis sisendi kujul. Kui me
 * kuvame mingi sündmuse teabe, siis tahame kasutajale näidat selle sündmuse
 * perioodi võimalikult lühikesel kujul, milleks on vastavalt algus- ja
 * lõpuhetkele üks viiest väljundist.
 * Loon faili “date.php” ja kirjutan sinna nii talitluse kui ka HTML-osa,
 * milles kasutatakse seda funktsiooni. HTML-osas kuvatakse kolme sündmuse vahemikud.
 * Kujundan eraldiseisva CSS-failiga “css.css”.
 */
?>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="style.css" />
<title>Start and end time</title>
</head>
<body>
<?php
header ( "Content-Type: text/html; charset=UTF-8" );
if (isset ( $_GET ['t1'] ) and isset ( $_GET ['t2'] )) {
	// alguseaeg vormist
	$t1 = $_GET ['t1'];
	$startElements = explode ( ' ', $t1 );
	$startDate = explode ( '-', $startElements [0] );
	$startTime = explode ( ':', $startElements [1] );
	// lõpuaeg vormist
	$t2 = $_GET ['t2'];
	$endElements = explode ( ' ', $t2 );
	$endDate = explode ( '-', $endElements [0] );
	$endTime = explode ( ':', $endElements [1] );
	
	$startYear = $startDate [0];
	$endYear = $endDate [0];
	$startMount = $startDate [1];
	$endMount = $endDate [1];
	$startDay = $startDate [2];
	$endDay = $endDate [2];
	$startHour = $startTime [0];
	$endHour = $endTime [0];
	$startSec = $startTime [2];
	$endSec = $endTime [2];
	// aja kontroll
	if ($startYear != $endYear) {
		$time = $startYear . "-" . $endYear . " " . $startMount . "." . $startDay;
	} elseif ($startMount != $endMount) {
		$time = $startDay . "." . $startMount . "-" . $endDay . "." . $endMount . "." . $startYear;
	} elseif ($startDay != $endDay) {
		$time = $startDay . "-" . $endDay . " " . $startMount . "." . $startYear;
	} elseif ($startHour != $endHour) {
		$time = $startDay . "." . $startMount . "." . $startYear . " " . $startHour . "-" . $endHour . ":" . $startMount;
	} elseif ($startMount != $endMount) {
		$time = $startYear . "." . $startMount . "." . $startDay . " " . $startHour . ":" . $startMount . "-" . $endMount;
	} elseif ($startSec != $endSec) {
		$time = $startYear . "." . $startMount . "." . $startDay . " " . $startHour . ":" . $startMount . $startSec . "-" . $endSec;
	} 

	else {
		$time = "Sisestasite vale aja! Palun proovige uuesti.";
	}
	
	?>
	<div class="body">
		<h1 class="php">Sisestatud ajavahemik on</h1>
		<p class="php"><?php echo $time;?></p>
	</div>
<?php
}
?>
</body>
</html>