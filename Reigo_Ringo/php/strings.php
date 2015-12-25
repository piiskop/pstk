
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php
		
		$string1 = 'karule';
		$string2 = 'meeldib mesi';
		
		echo 'esimene muutuja on ' . strlen($string1) . ' tähte pikk <br />';
		
		echo 'teises muutujas on ' . str_word_count($string2) . ' sõna <br />';		
		
		// alustab positsiooni lugemist nullist
		echo 'täht a on esimeses muutujas on ' . strpos($string1, 'a') . ' kohal <br />';		

		// asendab märgid teistega
		echo str_replace("mesi", "kala", $string2) . '<br />';	

		// strstr annab stringi kuni etteantud märgini või pärast
		
		// kuvab kõik pärast tühikut
		echo strstr($string2, ' ') . '<br />';	
		
		// kuvab kõik enne tühikut
		echo strstr($string2, ' ', true) . '<br />';			
		
		// chr annab märgi ascii alusel
		echo chr(69);				
		
		?>
	</body>
</html>