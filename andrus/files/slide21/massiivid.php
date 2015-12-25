<!--tabeli funktsionaalsus-->
<?php
	$row = 0;
	function makeOddEven($row){
		$row++;
		return $row % 2;
	}
	$row 
?>
<!-- Massivid Array - punkt 1 -->
<?php 
 $inimesed = array(
			 		
					array (
							'eesnimi' => 'Andrus',
							'perenimi' => 'Kull',
							'vanus' => '35'
					),
					array(
							'eesnimi' => 'Mailo',
							'perenimi' => 'Kallus',
							'vanus' => '36'
					),
					array(
							'eesnimi' => 'Tambet',
							'perenimi' => 'Song',
							'vanus' => '37'
					),
					array(
							'eesnimi' => 'Ergo',
							'perenimi' => 'Siig',
							'vanus' => '34'
					)
			);

 
?>
<div class="body">
	<h1>Tehe ning lisaks massiivid</h1>
	<table >
		<tr class="Row<?php $row = makeOddEven($row); echo $row;?>">
			<td>Eesnimi</td>
			<td>Perekonnanimi</td>
			<td>Vanus</td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row;?>">
			<td><?php echo $inimesed[0]['eesnimi'];?></td>
			<td><?php echo $inimesed[0]['perenimi'];?></td>
			<td><?php echo $inimesed[0]['vanus'];?></td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row;?>">
			<td><?php echo $inimesed[1]['eesnimi'];?></td>
			<td><?php echo $inimesed[1]['perenimi'];?></td>
			<td><?php echo $inimesed[1]['vanus'];?></td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row;?>">
			<td><?php echo $inimesed[2]['eesnimi'];?></td>
			<td><?php echo $inimesed[2]['perenimi'];?></td>
			<td><?php echo $inimesed[2]['vanus'];?></td>
		</tr>
		<tr class="Row<?php $row = makeOddEven($row); echo $row;?>">
			<td><?php echo $inimesed[3]['eesnimi'];?></td>
			<td><?php echo $inimesed[3]['perenimi'];?></td>
			<td><?php echo $inimesed[3]['vanus'];?></td>
		</tr>
	</table>
</div>
