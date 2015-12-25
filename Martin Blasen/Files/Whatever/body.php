
<?php
require_once 'configuration.php';

$row = 0;

static $oddeven = "odd";
function makeOddEven() {
	static $oddeven;
	if ($oddeven == "odd") {
		$oddeven = "even";
	} else {
		$oddeven = "odd";
	}
	return $oddeven;
}

?>


<table id="tr_table" border="1">

	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>
	<tbody>
		<tr class="row_<?php  echo makeOddEven(); ?>">
			<td><a href="tractors.php?index=<?php echo $row; ?>"> <?php echo $tractordata [$row] ['Name']; $row++; ?></a></td>
		</tr>
		<tr class="row_<?php  echo makeOddEven(); ?>">
			<td><a href="tractors.php?index=<?php echo $row; ?>"> <?php echo $tractordata [$row] ['Name']; $row++; ?></a></td>
		</tr>
		<tr class="row_<?php  echo makeOddEven(); ?>">
			<td><a href="tractors.php?index=<?php echo $row; ?>"> <?php echo $tractordata [$row] ['Name']; $row++; ?></a></td>
		</tr>
	</tbody>
</table>