<?php
$aaa = 'Kas Teil on �hiseid "alaealisi" lapsi?';

?>


<ol>

	<li>echo date('G:i');</li>

	<li>Kas Teil on �hiseid "alaealisi" lapsi?;</li>

	<li><?php echo "Kas Teil on �hiseid \"alaealisi\" lapsi?"?></li>

	<li><?php echo 'Kas Teil on �hiseid "alaealisi" lapsi?'?></li>

	<li><?php  echo $aaa ?></li>


</ol>

<table id="tr_steve">

	<tr>
		<td>Name:</td>
		<td>Steve</td>
	</tr>
	<tr>
		<td>Color:</td>
		<td>Red</td>
	</tr>
	<tr>
		<td>Horsepower:</td>
		<td>185</td>
	</tr>
	<tr>
		<td>Weight:</td>
		<td>6486</td>
	</tr>
</table>

<html>

<body>

	<div id="steveimg">
		<img
			src="http://t2.gstatic.com/images?q=tbn:ANd9GcR8bP9waPL_vhlE1to1ZuK0mobCevWRVjzSTkdP1Aq4P4c6roQakw">
	</div>


</body>

</html>

<html>

<h1>List of tractors</h1>

<body>

	<table id="tr_table" border="1">
		<thread>
		<tr>
			<th>Name</th>
			<th>Color</th>
			<th>Horsepower</th>
			<th>Weight Kg</th>
		</tr>
		</thread>

		<tbody>
			<tr id="row1">
				<td><a href="data.php">Steve</a></td>
				<td>Red</td>
				<td>185</td>
				<td>6486</td>
			</tr>

			<tr>
				<td>Big Betty</td>
				<td>Blue</td>
				<td>150</td>
				<td>8589</td>
			</tr>

			<tr id="row1">
				<td>Beast</td>
				<td>Black</td>
				<td>340</td>
				<td>10800</td>
			</tr>
		</tbody>
	</table>
</body>

</html>


<?php

$muutuja=1;
$muutuja=2;
$muutuja=3;

if ($muutuja == 1 && ($muutuja2 == 2 || $muutuja3 == 5))
{
	echo '15:', $muutuja1, "\n";
}



$muutuja = 0;
while ( $muutuja < 2 ) {
	
	echo '13', $muutuja, "\n";
	
	$muutuja ++;
}
$muutuja=0;

do{
echo '19', $muutuja, "\n";
	$muutuja++;
}
while($muutuja < 2);


for ($muutuja = 0; $muutuja < 2; $muutuja++) {
	echo '24:', $muutuja, "\n";
}

$numbers = array(
	0,
1	
);
foreach ($numbers as $number)
{
	echo '33:', $number, "\n";
}
?>

<?php 

$variable1  = '2';
echo '3:' , ctype_digit($varable1);







?>


