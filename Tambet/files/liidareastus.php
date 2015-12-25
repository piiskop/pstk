<?php
$a1 = array (2,4,6,8,10);
$a2 = array (3,5,7,9,11);

$read = array (
		array (
				"1" => 2,
				"2" => 4,
				"3" => 6,
				"4" => 8,
				"5" => 10 
		),
		array (
				"1" => 3,
				"2" => 5,
				"3" => 7,
				"4" => 9,
				"5" => 11 
		) 
);
?>
<?php echo $a1 [0]+ $a2 [0]?><br>
<?php echo $a1 [1]+ $a2 [1]?><br>
<?php echo $a1 [2]+ $a2 [2]?><br>
<?php echo $a1 [3]+ $a2 [3]?><br>
<?php echo $a1 [4]+ $a2 [4]?><br>
<br>
<?php echo $read[0] ["1"] + $read[1] ["1"]?><br>
<?php echo $read[0] ["2"] + $read[1] ["2"]?><br>
<?php echo $read[0] ["3"] + $read[1] ["3"]?><br>
<?php echo $read[0] ["4"] + $read[1] ["4"]?><br>
<?php echo $read[0] ["5"] + $read[1] ["5"]?><br>