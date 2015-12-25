<!DOCTYPE html>
<html>
	<head>
		<title>PHP matemaatika</title>
		<meta charset="UTF-8" />
	</head>
	<body>
	<?php
		$importantDecimal = -17.89;

		// floor: ümardab komakohaga arvu lähima täisarvuni (allapoole)
		echo floor($importantDecimal) . '<br />';		// -18
		
		// ceil: ümardab komakohaga arvu lähima täisarvuni (ülespoole)
		echo ceil($importantDecimal) . '<br />';		// -17
		
		// abs: tagastab arvu absoluutväärtuse
		echo abs($importantDecimal) . '<br />';			// 17.89
		
		// pi: tagastab pii (vaikimisi 13 komakohta)
		echo pi() . '<br />';
		
		// rand: tagastab suvalise täisarvu
		echo 'Suvaline täisarv (min 0, max ' . getrandmax() . '): ' .
			rand() . '<br />';
		
		echo 'Suvaline täisarv (min 10, max 20): ' . rand(10, 20) . '<br />';
		
		// max: suurim arv loetelust
		echo max(9.11, 4, -2.43, 5) . '<br />';			// 9.11
		
		// min: vähim arv loetelust
		echo min(9.11, 4, -2.43, 5) . '<br />';			// -2.43
		
		// bindec: tagastab kahendsüsteemi arvu kümnendsüsteemi kuju
		echo bindec('10') . '<br />';					// 2
		
		// sqrt: tagastab arvu ruutjuure
		echo sqrt(256);									// 16
		
	?>
	</body>
</html>