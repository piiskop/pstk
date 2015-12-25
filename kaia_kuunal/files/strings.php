<!DOCTYPE html>
<html>
	<head>
		<title>PHP sõned</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php
			// strlen: tagastab sõne pikkuse
			$firstName = 'Kaia';
			$lastName = 'Küünal';
			
			echo $firstName . ' eesnimes on ' . strlen(utf8_decode($firstName)) . ' tähemärki, 
					perekonnanimes ' . $lastName . ' ' . strlen(utf8_decode($lastName)) . '.<hr />';
			
			
			// strstr: tagastab sõne osa enne/pärast täpsustatud sõnet
			$email = 'kaiakuunal@gmail.com';
			
			// Tähemärgid enne @ märki
			echo strstr($email, '@', true) . '<br />';

			// Alates @-märgist (k.a)
			echo strstr($email, '@') . '<br />';
			
			// Ainult eesnimi
			echo strstr($firstName . ' ' . $lastName, 'Küünal', true) . '<br />';
			
			// Ainult perekonnanimi
			echo strstr($firstName . ' ' . $lastName, 'Küünal') . '<hr />';
			
			
			// strpos: täpsustatud tähemärkide esimesena leitav asukoht sõnes
			// Tagastatakse 2, kuna 1. tähemärgi indeks on 0:
			echo 'a) ' . strpos($firstName, 'i') . '<br />';
			
			// Väikest k-d eesnimes ei ole (tõstutundlik):
			echo 'b) ' . strpos($firstName, 'k') . '<br />';
			
			// K-d ei leita, kuna alustame lugemist 2. tähemärgist:
			echo 'c) ' . strpos($lastName, 'K', 1) . '<hr />'; 
			

			// chr: tagastab tähemärgi ascii koodi alusel
			echo chr(75) . chr(97) . chr(105) . chr(97);
			
			echo '<hr />';

			echo 'Tekst
				mitmel
				real';
			
			echo '<br />';
			
			echo 'Tekst' . "\n" .
				'\'mitmel\'' . "\n" .
				'real';
			
			echo '<br />';
			
			// Heredoc
			echo <<<END_TEXT
				Tekst,
					mis on kirjutatud
				mitmele
					reale
END_TEXT;
		?>
	</body>
</html>
