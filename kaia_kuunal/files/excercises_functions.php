<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Harjutused: funktsioonid</title>
	</head>
	<body>
		<?php
		
			// Suvaline funktsioon
			function multiply($a, $b) {
				return $a * $b;
			}
			
			echo multiply(5, 2) . '<hr />';
			
			
			// 1. Kui pikk on sõne "Süütuse eeldamine."?
			$str = 'Süütuse eeldamine.';
			echo 'Lauses "' . $str . '" on ' . mb_strlen($str, 'UTF-8')
				. ' tähemärki.<hr />';
			
			
			/* 
			 * 2. Teen sõne
			 * "mysql databases -h localhost -u databases -p < [faili nimi].sql"
			 * brauserile söödavaks kui "HTML 5" sõne.
			 */
			$str = 'mysql databases -h localhost -u databases -p < [faili nimi].sql';
			echo htmlspecialchars($str, ENT_HTML5) . '<hr />';

			 
			/* 
			 * 3. Välja nimi on "phoneNumber".
			 * Tahan selleks võtmistalitlust "getPhoneNumber".
			 * Kuidas teisaldan?
			 */
			$fieldName = 'phoneNumber';
			echo 'get' . ucfirst($fieldName);
			echo '<hr />';
			 
			
			/* 
			 * 4. Annan veidi oma õigusi ära ja teisendan
			 * oma väikeste algustähtedega ees- ja perenime
			 * suurte algustähtedega nimeks.
			 */
			$name = 'kaia küünal';
			echo ucwords($name) . '<hr />';
			
			
			/*
			 * 5. Teen nii, et sõne ("In Transition 2.0") kuvataks
			 * ilma ümbritsevate sulgude ja jutumärkideta. 
			 */
			$str = '("In Transition 2.0")';
			echo trim($str, '()"') . '<hr />';
			
			
			/*
			 * 6. Teen nii, et sõnes ("In Transition 2.0")
			 * oleksid ainult väiketähed.
			 */
			echo mb_strtolower($str, 'UTF-8') . '<hr />';
			
			
			/*
			 * 7. Teen nii, et sõnes ("In Transition 2.0")
			 * oleksid ainult suurtähed.
			 */
			echo mb_strtoupper($str, 'UTF-8') . '<hr />';
			
			
			/*
			 * 8. Teen arvu 2015,16 kujule 2 015.2
			 */
			echo number_format(2015.16, 1, '.', ' ');
		
		?>
	</body>
</html>