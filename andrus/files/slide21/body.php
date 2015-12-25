<!--tabeli funktsionaalsus-->
<?php
	$row = 0;
	function makeOddEven($row){
		$row++;
		return $row % 2;
	}
	$row 
?>
<?php 
	include 'array_to_body.php';
?>
<div class="body">
	<h1>Tehe ning lisaks massiivid</h1>
	<table >
		<tr class="Row<?php $row = makeOddEven($row); echo $row;?>">
			<td>Eesnimi</td>
			<td>Perekonnanimi</td>
			<td>Vanus</td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; $i=0;?>">
			<td><a href="?index=<?php echo $i?>"><?php echo $inimesed[0]['eesnimi'];?></a></td>
			<td><?php echo $inimesed[0]['perenimi'];?></td>
			<td><?php echo $inimesed[0]['vanus'];?></td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; $i++;?>">
			<td><a href="?index=<?php echo $i?>"><?php echo $inimesed[$i]['eesnimi'];?></a></td>
			<td><?php echo $inimesed[$i]['perenimi'];?></td>
			<td><?php echo $inimesed[$i]['vanus'];?></td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; $i++;?>">
			<td><a href="?index=<?php echo $i?>"><?php echo $inimesed[$i]['eesnimi'];?></a></td>
			<td><?php echo $inimesed[$i]['perenimi'];?></td>
			<td><?php echo $inimesed[$i]['vanus'];?></td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row; $i++;?>">
			<td><a href="?index=<?php echo $i?>"><?php echo $inimesed[$i]['eesnimi'];?></a></td>
			<td><?php echo $inimesed[$i]['perenimi'];?></td>
			<td><?php echo $inimesed[$i]['vanus'];?></td>
		</tr>
	</table>
</div>
