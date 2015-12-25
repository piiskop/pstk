<?php 
/**
 * 
 * Examples of array functions
 *
 */
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP massiivid</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php
			$colors = array('red', 'green', 'blue', 'green');
			
			// count: elementide arv massiivis
			echo 'Massiivis on ' . count($colors) . ' elementi.<hr />';
			
			// array_count_values: mitu korda iga element massiivis esineb
			$valueCounts = array_count_values($colors);
			
			// print_r: kuvab väärtuse (nt massiivi) inimloetaval kujul			
			echo '<pre>';
				print_r($valueCounts);
			echo '</pre>';
			
			echo 'Rohelist on ' . $valueCounts['green'] . ' korda!<hr />';
			
			// array_flip: vahetab massiivis võtmed ja väärtused
			$coloredFlowers = array(
				'daisy' => 'yellow',
				'rose' => 'red',
				'lily' => 'white',
				'something else that\'s white' => 'white'
			);
			
			echo '<pre>';
				echo 'Enne flippi:<br />';
				print_r($coloredFlowers);
				
				echo 'Pärast flippi:<br />';
				print_r(array_flip($coloredFlowers));
			echo '</pre>';
			
			echo '<hr />';
			
			// sort: sorteerib massiivi elemendid (madalamast kõrgemani)
			$numbers = array(554, 12, 123, 58);
			echo '<pre>';
				echo 'Sorteerimata:<br />';
				print_r($numbers);
				
				sort($numbers);

				echo 'Numbritena sorteeritud:<br />';
				print_r($numbers);
				
				sort($numbers, SORT_STRING);
				
				echo 'Sõnedena sorteeritud:<br />';
				print_r($numbers);
				
				echo '<hr />';
			
				/* 
					asort: sorteerib massiivi väärtuste järgi,
					säilitades võti => väärtus seosed
				*/
				
				echo 'Enne asorti:<br />';
				print_r($coloredFlowers);
				
				asort($coloredFlowers);
				
				echo 'Pärast asorti:<br />';
				print_r($coloredFlowers);				
				
			echo '</pre>';
			?>
	</body>
</html>
