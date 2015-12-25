<?php 
	include 'array_to_body.php';
?>
<table>
		<tr>
			<td>Eesnimi</td>
			<td>Perekonnanimi</td>
			<td>Vanus</td>
		</tr>
		<tr>
			<td><a href="?index=<?php echo $i?>"><?php echo $inimesed[0]['eesnimi'];?></a></td>
			<td><?php echo $inimesed[0]['perenimi'];?></td>
			<td><?php echo $inimesed[0]['vanus'];?></td>
		</tr>
		<tr>
			<td><a href="?index=<?php echo $i?>"><?php echo $inimesed[$i]['eesnimi'];?></a></td>
			<td><?php echo $inimesed[$i]['perenimi'];?></td>
			<td><?php echo $inimesed[$i]['vanus'];?></td>
		</tr>
		<tr>
			<td><a href="?index=<?php echo $i?>"><?php echo $inimesed[$i]['eesnimi'];?></a></td>
			<td><?php echo $inimesed[$i]['perenimi'];?></td>
			<td><?php echo $inimesed[$i]['vanus'];?></td>
		</tr>
		<tr>
			<td><a href="?index=<?php echo $i?>"><?php echo $inimesed[$i]['eesnimi'];?></a></td>
			<td><?php echo $inimesed[$i]['perenimi'];?></td>
			<td><?php echo $inimesed[$i]['vanus'];?></td>
		</tr>
	</table>
</div>
