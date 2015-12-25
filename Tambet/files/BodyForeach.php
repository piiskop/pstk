<?php  require_once 'configuration.php';?>
<?php

$row = 0;
function makeOddEven($row) {
	$row ++;
	return $row % 2;
}
$row;
?>
<p>INIMESTE NIMEKIRI</p>
<!--GET. Kutsun harjutus_get sisu -->
<?php require_once 'harjutus_get.php';?>
<table style="width: 30%">
	<tr>
		<td>NR</td>
		<td>Eesnimi</td>
		<td>Perenimi</td>
		<td>Telefon</td>
		<td>Email</td>
	</tr>
	<?php 
	foreach ($inimesed as $inimene){
		$i = $inimene['NR'];
		echo "<tr> <td><a href = html.php?</a>".$inimene['NR']."</td>". 
				"<td>".$inimene['eesnimi']."</td>".
				"<td>".$inimene['perenimi']."</td>".
				"<td>".$inimene['telefon']."</td>".
				"<td>".$inimene['email']."</td></tr>";		
	}
	?>
	</table>
	<br>
	
<a href="lisa_inimene.php">LISA INIMENE  </a>
<br>

