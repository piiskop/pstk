<!DOCTYPE html>
<html lang="EN">
	<head>
		<meta charset="UTF-8"/>
		<title>Kuupäeva funktsioon</title>	
	
	</head>
	<body>
		<?php 
			date_default_timezone_set('Europe/Tallinn');
			function dateRange($start, $end){
				$range;
				if ((date("Y", $start) == date("Y", $end)) &&
						(date("m", $start) == date("m", $end)) &&
						(date("d", $start) == date("d", $end)) &&
						(date("i", $start) != date("i", $end))){
					$range = date("d.m.Y", strtotime($start)).' '
							.date("H", strtotime($start)).':'.date("i", strtotime($start)).'-'
									.date("H", strtotime($end).':'.date("i", strtotime($end)));
					echo 'minutid erinevad';
				}
				
				
				else if (date("Y", $start) == date("Y", $end) &&
					date("m", $start) == date("m", $end) &&
					date("d", $start) == date("d", $end) &&
					date("i", $start) == date("i", $end)){
						$range = date("d.m.Y", strtotime($start)).' '.date("H", strtotime($start)).'-'.date("H", strtotime($end));
						echo 'minutid samad';
				}
				
				
				
				
				return $range;
			}
			
			echo dateRange("2014-03-03 22:10:00", "2015-03-03 23:00:00").'<br/>';
			echo dateRange("2015-02-02 12:00:00", "2015-03-03 23:50:00");
			
		?>
		
	
		
		