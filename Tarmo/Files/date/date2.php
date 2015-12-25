<!DOCTYPE html>
<html lang="EN">
	<head>
		<meta charset="UTF-8"/>
		<title>Kuupäeva funktsioon</title>	
	
	</head>
	<body>
		<form action="" method="POST" name="date">
			<label for="date">Nädalapäeva number:</label>
			<input type="text" id="date" name="date" title="Lubatud väärtused 1-7"/><br/>
			<input type="submit" value="Konverteeri!"/><br/>
		</form>
			<?php
			
			function date_number_to_string($date_number){
				$date_string;
				switch($date_number){
					case 1:
						$date_string = 'Esmaspäev';
						break;
					case 2:
						$date_string = 'Teisipäev';
						break;
					case 3:
						$date_string = 'Kolmapäev';
						break;
					case 4:
						$date_string = 'Neljapäev';
						break;
					case 5:
						$date_string = 'Reede';
						break;
					case 6:
						$date_string = 'Laupäev';
						break;					
					case 7:
						$date_string = 'Pühapäev';
						break;
					default:
						echo 'Nädalapäeva number peab olema vahemikus 1 kuni 7';
						break;						
				}
				return $date_string;	
			}
			$date_number = $_POST["date"];
			if (isset($date_number) && $date_number < 7 && $date_number >1){
				echo 'Nädalapäev on: '.date_number_to_string($date_number).'<br/>';
			}
			else if (isset($date_number) && ($date_number < 1 || $date_number >7)){
				echo date_number_to_string($date_number);}
			?>

</body>
</html>