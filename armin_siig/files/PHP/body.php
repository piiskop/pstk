<?php
$row = 0; // odd
function makeOddEven($row) {
	$row ++;
	return $row % 2;
}
$actual_row = 0;
require_once "pupil_data.php";
?>

<div id="body">
	<table>
		<thead>
			<tr>
				<th>Eesnimi</th>
				<th>Perenimi</th>
			</tr>
		</thead>
		<tbody>
		<?php $row= makeOddEven($row);?>
			<tr class="row<?php echo $row; ?>">
				<td><a href="require_once.php?index=<?php echo $actual_row;?>"> <?php echo $sportlased [$actual_row]['eesnimi'];?></a></td>
				<td><?php echo $sportlased [$actual_row]['perenimi'];$actual_row++;?></td>
			</tr>
					<?php $row= makeOddEven($row);?>
			<tr class="row<?php echo $row; ?>">
				<td><a href="require_once.php?index=<?php echo $actual_row;?>"> <?php echo $sportlased [$actual_row]['eesnimi'];?></a></td>
				<td><?php echo $sportlased [$actual_row]['perenimi'];$actual_row++;?></td>
			</tr>
					<?php $row= makeOddEven($row);?>
			<tr class="row<?php echo $row; ?>">
				<td><a href="require_once.php?index=<?php echo $actual_row;?>"> <?php echo $sportlased [$actual_row]['eesnimi'];?></a></td>
				<td><?php echo $sportlased [$actual_row]['perenimi'];$actual_row++;?></td>
			</tr>
					<?php $row= makeOddEven($row);?>
			<tr class="row<?php echo $row; ?>">
				<td><a href="require_once.php?index=<?php echo $actual_row;?>"> <?php echo $sportlased [$actual_row]['eesnimi'];?></a></td>
				<td><?php echo $sportlased [$actual_row]['perenimi'];$actual_row++;?></td>
			</tr>
		</tbody>
	</table>
</div>