<?php
?>
<div>
	<table>
		<thead>
			<tr>
				<th>Tunnus</th>
				<th>Väärtus</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Who:</td>
				<td><?php echo $massiiv[$_GET['index']]['who']; ?></td>
			</tr>
			<tr>
				<td>Where:</td>
				<td><?php echo $massiiv[$_GET['index']]['where']; ?></td>
			</tr>
			<tr>
				<td>Doing:</td>
				<td><?php echo $massiiv[$_GET['index']]['doing']; ?></td>
			</tr>
		</tbody>
	</table>
	<a href="get_all_together.php">elukad</a>
</div>