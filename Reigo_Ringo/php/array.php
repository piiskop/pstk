
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php
			
			$arv = 5;
			$massiiv = array(2, 5, 'midagi', 5, 0.56);
			
			// leiab kas tegu on massiiviga			
			if (is_array($massiiv)){  
			echo 'on masiiv <br />';  
			}
			else {
			echo 'pole massiiv <br />';  
			};
			
			// leiab kas on int tüüpi
			echo (is_int($massiiv) ? 'on int' : 'pole int') . '<br />';
			echo (is_int($arv) ? 'on int' : 'pole int') . '<br />';
			
			// leiab mis tüüpi muutuja on
			echo gettype($arv) . '<br />';

			// näitab infot muutuja kohta
			print_r($massiiv);
			
			echo '<br />';	
		
			// leiab mitu elementi massiivis on
			echo count($massiiv) . '<br />';
	
			$massiiv2 = array(2, 5, 2, 5, 3);		
			// leiab mitu elementi massiivis on
			print_r(array_count_values($massiiv2));
			
			echo '<br /><br />';			
		
			// vahetab massiivis võtmed ja väärtused	
			$massiiv3 = [
			    "kapsas" => "hispaania",
			    "porgand" => "poola"];
			print_r($massiiv3);	
			echo '<br />';					
			print_r(array_flip($massiiv3));	
			echo '<br /><br />';	
						
			// sorteerib elemendid madalamast kõrgemani
			sort($massiiv2);			
			print_r($massiiv2);			
			echo '<br /><br />';				
			
			// sorteerib võtmetega massiivid elementide väärtuste järgi madalamast kõrgemani
			$massiiv4 = [
			    "kapsas" => 4,
			    "porgand" => 2,
			    "apelsin" => 1			    
			    ];
			print_r($massiiv4);				
			echo '<br />';				
			asort($massiiv4);			
			print_r($massiiv4);			
			echo '<br /><br />';		
					
			// sorteerib võtmetega massiivid elementide võtmete järgi madalamast kõrgemani			
			ksort($massiiv4);			
			print_r($massiiv4);											
		?>
	</body>
</html>