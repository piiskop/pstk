<!DOCTYPE html>
<html>
	<head>
		<title>PHP operaatorid</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php
			/*	----------------  *
			 *  Unary operators  *
			 *	----------------  */
			
			// ++/-- muutuja ees suurendab/vähendab selle väärtust 1 võrra enne toimingut
			// (antud juhul kuvamist ekraanile) 
			$age = 99;
			echo 'Mari oli ' . $age . '-aastane, aga siis tuli sünnipäev
					ja Mari sai ' . ++$age . '.<br />';		
	
				
			// ++/-- muutuja järel muudab selle väärtust pärast toimingut
			$cabbageCount = 10;
			echo 'Matil oli ' . $cabbageCount-- . ' kapsast, aga Mari võttis ühe ära
					ja Matile jäi ainult ' . $cabbageCount . '.<hr />';
	
			
			/*	----------------  *
			 *  Binary operators  *
			 *	----------------  */
			
			// Muutujale väärtuse omistamine: =
			$firstName = 'Kaia';
			$lastName = 'Küünal';
			
			// Väärtuste võrdlemine: ==, !=
			if (3 == '3') {
				echo '3 on 3!<br />';
			}
			
			if ($firstName != $lastName) {
				echo $firstName . ' ja ' . $lastName . ' ei ole ühesugused nimed.<hr />';
			}
			
			// Aritmeetika: +, -, *, /, %
			$a = 3;
			$b = 2;
			echo $a . ' + ' . $b . ' = ' . ($a + $b) . '<br />';
			echo $a . ' - ' . $b . ' = ' . ($a - $b) . '<br />';
			echo $a . ' * ' . $b . ' = ' . ($a * $b) . '<br />';
			echo $a . ' / ' . $b . ' = ' . ($a / $b) . '<br />';
			echo $a . ' % ' . $b . ' = ' . ($a % $b) . '<hr />';
			
			$a += $b;
			echo 'a = a + b on sama, mis a += b: ' . $a . '<br />';
			
			$a = 3;
			$a -= $b;
			echo 'a = a - b on sama, mis a -= b: ' . $a . '<br />';
			
			$a = 3;
			$a *= $b;
			echo 'a = a * b on sama, mis a *= b: ' . $a . '<br />';
			
			$a = 3;
			$a /= $b;
			echo 'a = a / b on sama, mis a /= b: ' . $a . '<br />';
			
			$a = 3;
			$a %= $b;
			echo 'a = a % b on sama, mis a %= b: ' . $a . '<hr />';
			
			// Sõnede ühendamine: .=
			echo $firstName . ' ' . $lastName . '<hr />';

			// Loogika: %%, ||, !
			if ($a > 0 && $b > 0) {
				echo 'a ja b on mõlemad positiivsed.<br />';
			}
			
			if (1 == 2 || 3 == '3') {
				echo 'Vähemalt üks tingimus oli tõene.<br />';
			}
			
			if (!0 && !false && !'' && !null) {
				echo 'Palju tõde!<hr />';
			}
			
			
			/*	------------------  *
			 *  Tertiary operators  *
			 *	------------------  */
			
			// Lühendatud tingimuslause:
			echo 'a ja b väärtused ' . ($a == $b ? 'on' : 'ei ole') . ' võrdsed.' 
		?>	
	</body>
</html>