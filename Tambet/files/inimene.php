<?php require_once 'harjutus_get.php';?>
<?php  require_once 'configuration.php';?>
<?php

$row = 0;
function makeOddEven($row) {
	$row ++;
	return $row % 2;
}
$row;
?>
<p>INIMESE ANDMED</p>
<table style="width: 40%">
	<thead>
		<tr>
			<th>Tunnus</th>
			<th>Väärtus</th>
		</tr>
	</thead>
	<br>
	<tbody>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; ?>">
			<td>NR :</td>
			<td><?php echo $inimesed[$_GET['index']]['NR'];?></td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; ?>">
			<td>Eesnimi :</td>
			<td><?php echo $inimesed[$_GET['index']]['eesnimi'];?></td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; ?>">
			<td>Perenimi:</td>
			<td><?php echo $inimesed[$_GET['index']]['perenimi'];?></td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; ?>">
			<td>Telefon :</td>
			<td><?php echo $inimesed[$_GET['index']]['telefon'];?></td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; ?>">
			<td>Email :</td>
			<td><?php echo $inimesed[$_GET['index']]['email'];?></td>
		</tr>
	</tbody>
</table>
<br>
<a href="html.php">INIMESTE NIMEKIRJALE </a>
<br>
