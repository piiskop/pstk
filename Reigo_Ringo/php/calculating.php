
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php
			
			$arv = 5.6;			
			// ümardab alla
			echo floor($arv) . '<br />';
		
			// ümardab üles
			echo ceil($arv) . '<br />';			

			// annab absoluutväärtuse
			echo abs($arv) . '<br />';	
	
			// annab pi väärtuse 13 komakohaga
			echo pi() . '<br />';		

			// annab juhusliku numbri
			echo rand() . '<br />';

			// annab juhusliku numbri 0 ja 10 vahel, 0 ja 10 kaasaarvatud
			echo rand(0, 10) . '<br />';

			// annab suurima loetelust
			echo max(0, 10, 12, -5, 0.56) . '<br />';

			// annab väiksema loetelust
			echo min(0, 10, 12, -5, 0.56) . '<br />';

			// annab ruutjuure
			echo sqrt(4) . '<br />';

			// teeb kahendsüsteemi arvust kümendsüsteemi arvu
			echo bindec(1010100) . '<br />';		
		
		?>
	</body>
</html>