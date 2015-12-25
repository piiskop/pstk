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
<table style="width: 40%">
	<tr>
		<td>NR</td>
		<td>Eesnimi</td>
		<td>Perenimi</td>
		<td>Telefon</td>
		<td>Email</td>
	</tr>
	<tr class="Row<?php $row = makeOddEven($row); echo $row; $i=0; $j=0;?>">
		<th><?php echo $inimesed[$j]['NR'];?></th>
		<th><a href="html.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
		<th><?php echo $inimesed[0]['perenimi'];?></th>
		<th><?php echo $inimesed[0]['telefon'];?></th>
		<th><?php echo $inimesed[0]['email'];?></th>
	</tr>
	</tr>
	<tr class="Row<?php $row = makeOddEven($row); echo $row; $i++; $j++?>">
	<th><?php echo $inimesed[$j]['NR'];?></th>
		<th><a href="html.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
		<th><?php echo $inimesed[$i]['perenimi'];?></th>
		<th><?php echo $inimesed[$i]['telefon'];?></th>
		<th><?php echo $inimesed[$i]['email'];?></th>
	</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; $i++; $j++?>">
	<th><?php echo $inimesed[$j]['NR'];?></th>
		<th><a href="html.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
		<th><?php echo $inimesed[$i]['perenimi'];?></th>
		<th><?php echo $inimesed[$i]['telefon'];?></th>
		<th><?php echo $inimesed[$i]['email'];?></th>
	</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; $i++; $j++?>">
	<th><?php echo $inimesed[$j]['NR'];?></th>
		<th><a href="html.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
		<th><?php echo $inimesed[$i]['perenimi'];?></th>
		<th><?php echo $inimesed[$i]['telefon'];?></th>
		<th><?php echo $inimesed[$i]['email'];?></th>
	</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; $i++; $j++?>">
	<th><?php echo $inimesed[$j]['NR'];?></th>
		<th><a href="html.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
		<th><?php echo $inimesed[$i]['perenimi'];?></th>
		<th><?php echo $inimesed[$i]['telefon'];?></th>
		<th><?php echo $inimesed[$i]['email'];?></th>
	</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; $i++; $j++?>">
	<th><?php echo $inimesed[$j]['NR'];?></th>
		<th><a href="html.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
		<th><?php echo $inimesed[$i]['perenimi'];?></th>
		<th><?php echo $inimesed[$i]['telefon'];?></th>
		<th><?php echo $inimesed[$i]['email'];?></th>
	</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; $i++; $j++?>">
	<th><?php echo $inimesed[$j]['NR'];?></th>
		<th><a href="html.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
		<th><?php echo $inimesed[$i]['perenimi'];?></th>
		<th><?php echo $inimesed[$i]['telefon'];?></th>
		<th><?php echo $inimesed[$i]['email'];?></th>
	</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; $i++; $j++?>">
	<th><?php echo $inimesed[$j]['NR'];?></th>
		<th><a href="html.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
		<th><?php echo $inimesed[$i]['perenimi'];?></th>
		<th><?php echo $inimesed[$i]['telefon'];?></th>
		<th><?php echo $inimesed[$i]['email'];?></th>
	</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; $i++; $j++?>">
	<th><?php echo $inimesed[$j]['NR'];?></th>
		<th><a href="html.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
		<th><?php echo $inimesed[$i]['perenimi'];?></th>
		<th><?php echo $inimesed[$i]['telefon'];?></th>
		<th><?php echo $inimesed[$i]['email'];?></th>
	</tr>
	</table>
	<br>
	
<a href="lisa_inimene.php">LISA INIMENE  </a>
<br>

