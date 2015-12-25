<?php
$row = 0;
function muuda_rida($row)
{
	$row++;
	return $row % 2;
}
?>
<?php 
require_once 'array.php';
?>

<div class="kere">
	<table class="tabel">
		<tr class="r<?php $row = muuda_rida($row); echo $row; $i=0;?>">
			<th><a href="inimene.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
			<th><?php echo $inimesed[$i]['perenimi'];?></th>
			<th><?php echo $inimesed[$i]['telefon'];?></th>
			<th><?php echo $inimesed[$i]['email'];?></th>
		</tr>
		<tr class="r<?php $row = muuda_rida($row); echo $row; $i++;?>">
			<th><a href="inimene.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
			<th><?php echo $inimesed[$i]['perenimi'];?></th>
			<th><?php echo $inimesed[$i]['telefon'];?></th>
			<th><?php echo $inimesed[$i]['email'];?></th>
		</tr>
		<tr class="r<?php $row = muuda_rida($row); echo $row; $i++?>">
			<th><a href="inimene.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
			<th><?php echo $inimesed[$i]['perenimi'];?></th>
			<th><?php echo $inimesed[$i]['telefon'];?></th>
			<th><?php echo $inimesed[$i]['email'];?></th>
		</tr>
		<tr class="r<?php $row = muuda_rida($row); echo $row; $i++?>">
			<th><a href="inimene.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
			<th><?php echo $inimesed[$i]['perenimi'];?></th>
			<th><?php echo $inimesed[$i]['telefon'];?></th>
			<th><?php echo $inimesed[$i]['email'];?></th>
		</tr>
		<tr class="r<?php $row = muuda_rida($row); echo $row; $i++?>">
			<th><a href="inimene.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
			<th><?php echo $inimesed[$i]['perenimi'];?></th>
			<th><?php echo $inimesed[$i]['telefon'];?></th>
			<th><?php echo $inimesed[$i]['email'];?></th>
		</tr>
		<tr class="r<?php $row = muuda_rida($row); echo $row; $i++?>">
			<th><a href="inimene.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
			<th><?php echo $inimesed[$i]['perenimi'];?></th>
			<th><?php echo $inimesed[$i]['telefon'];?></th>
			<th><?php echo $inimesed[$i]['email'];?></th>
		</tr>
		<tr class="r<?php $row = muuda_rida($row); echo $row; $i++?>">
			<th><a href="inimene.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
			<th><?php echo $inimesed[$i]['perenimi'];?></th>
			<th><?php echo $inimesed[$i]['telefon'];?></th>
			<th><?php echo $inimesed[$i]['email'];?></th>
		</tr>
		<tr class="r<?php $row = muuda_rida($row); echo $row; $i++?>">
			<th><a href="inimene.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
			<th><?php echo $inimesed[$i]['perenimi'];?></th>
			<th><?php echo $inimesed[$i]['telefon'];?></th>
			<th><?php echo $inimesed[$i]['email'];?></th>
		</tr>
		<tr class="r<?php $row = muuda_rida($row); echo $row; $i++?>">
			<th><a href="inimene.php?index=<?php echo $i;?>"><?php echo $inimesed[$i]['eesnimi'];?></a></th>
			<th><?php echo $inimesed[$i]['perenimi'];?></th>
			<th><?php echo $inimesed[$i]['telefon'];?></th>
			<th><?php echo $inimesed[$i]['email'];?></th>
		</tr>
		
		
	</table>
	<?php
	/*
	var_dump ($inimesed[0]);
	echo $inimesed[0]['eesnimi'];
	*/
	?>
</div>