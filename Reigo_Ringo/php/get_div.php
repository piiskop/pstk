<?php
$row = 0;
function makeOddEven($row) {
	$row ++;
	return $row % 2;
}
require_once 'get_array.php';
?>

<div>
	<table>
		<thead>
			<tr>
				<th>Who</th>
				<th>Where</th>
				<th>Doing</th>
			</tr>
		</thead>
		<tbody>
			<tr class="row<?php $row = makeOddEven($row); echo $row; 
			/* uus asi=> */$i=0;?>">
				<td><a href="get_all_together.php?index=<?php echo $i; ?>"><?php echo $massiiv[$i]['who'];?></a></td>
				<td><?php echo $massiiv[$i]['where']; ?></td>				
				<td><?php echo $massiiv[$i]['doing']; $i++;?></td>
			</tr>
			<tr class="row<?php $row = makeOddEven($row); echo $row;?>">
				<td><a href="get_all_together.php?index=<?php echo $i; ?>"><?php echo $massiiv[$i]['who'];?></a></td>
				<td><?php echo $massiiv[$i]['where']; ?></td>
				<td><?php echo $massiiv[$i]['doing']; $i++; ?></td>
			</tr>
			<tr class="row<?php $row = makeOddEven($row); echo $row;?>">
				<td><a href="get_all_together.php?index=<?php echo $i; ?>"><?php echo $massiiv[$i]['who'];?></a></td>
				<td><?php echo $massiiv[$i]['where']; ?></td>
				<td><?php echo $massiiv[$i]['doing']; $i++; ?></td>
			</tr>
			<tr class="row<?php $row = makeOddEven($row); echo $row;?>">
				<td><a href="get_all_together.php?index=<?php echo $i; ?>"><?php echo $massiiv[$i]['who'];?></a></td>
				<td><?php echo $massiiv[$i]['where']; ?></td>
				<td><?php echo $massiiv[$i]['doing']; ?></td>
			</tr>
		</tbody>
	</table>
</div>
