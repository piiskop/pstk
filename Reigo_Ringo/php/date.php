<!--
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php
			date_default_timezone_set('Europe/Tallinn');
			echo date('d.m.Y H:i:s') . '<br />';			
			echo date('Ymd') . '<br />';				
			echo date('m') . '<br />';				
			echo date('d') . '<br />';				
			echo date('H:i') . '<br />';					
		?>
		<ol>
			<li><p>Kas teil on ühiseid "alaealisi" lapsi</p></li>
			<li><?php echo 'Kas teil on ühiseid "alaealisi" lapsi'; ?></li>
			<li><?php echo "Kas teil on ühiseid \"alaealisi\" lapsi"; ?></li>
			<li><?php $uppercomma = '"';echo 'Kas teil on ühiseid ' . $uppercomma . 'alaealisi' . $uppercomma .  ' lapsi'; ?></li>		
		</ol>
		
		
	</body>
</html>
-->

<?php

if (isset($_POST["submit"])) {
	$start = strtotime($_POST["start"]);
	$start_d = date("d", $start);
	$start_m = date("m", $start);	
	$start_y = date("Y", $start);	
	$start_h = date("h", $start);
	$start_i = date("i", $start);
		
	$end = strtotime($_POST["end"]);
	$end_d = date("d", $end);
	$end_m = date("m", $end);
	$end_y = date("Y", $end);
	$end_h = date("h", $end);
	$end_i = date("i", $end);

	$tulemus = "Aja periood: ";
	if ($start_d != $end_d) {
		$tulemus = $tulemus . $start_d . "-" . $end_d . ".";
	}
	else{
		$tulemus = $tulemus . $start_d . ".";
	}
	if ($start_m != $end_m) {
		$tulemus = $tulemus . $start_m . "-" . $end_m . ".";
	}
	else{
		$tulemus = $tulemus . $start_m . ".";
	}
	if ($start_y != $end_y) {
		$tulemus = $tulemus . $start_y . "-" . $end_y . " ";
	}
	else{
		$tulemus = $tulemus . $start_y . " ";
	}
	if ($start_h != $end_h) {
		$tulemus = $tulemus . $start_h . ":" . $end_h . "-";
	}
	else{
		$tulemus = $tulemus . $start_h . "-";
	}	
	if ($start_i != $end_i) {
		$tulemus = $tulemus . $start_i . ":" . $end_i;
	}
	else{
		$tulemus = $tulemus . $start_i;
	}	

	echo $tulemus  . "<br >";	
	


$info = array(
		"1" => "esmaspäev",
		"2" => "teisipäev",
		"3" => "kolmapäev",
		"4" => "neljapäev",
		"5" => "reede",
		"6" => "laupäev",
		"7" => "pühapäev"					
);

$what_day1 = $info[$_POST["1_day"]];
$what_day2 = $info[$_POST["2_day"]];
$what_day3 = $info[$_POST["3_day"]];

echo $what_day1 . "<br >" . $what_day2 . "<br >" . $what_day3;
}



?>
<meta charset="UTF-8">
<body>
	<div>2005-02-26 07:30:00</div>
	<form method="post">
		<div>
			<label for="start">Alates:</label>
			<input type="text" name="start">
		</div>
		<div>
			<label for="end">Kuni:</label>
			<input type="text" name="end">
		</div>
		
		<select name="1_day">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>		  		  
		</select>	
		
		<select name="2_day">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>		  		  
		</select>		

		<select name="3_day">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>		  		  
		</select>
				
		<input type="submit" name="submit">
	</form>
</body>