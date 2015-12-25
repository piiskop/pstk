<?php
require_once "pupil_data.php";
?>
<table>
	<tbody>
		<tr>
			<th>eesnimi</th>
			<td><?php echo $sportlased [$_GET['index']]['eesnimi'];?></td>
		</tr>
		<tr>
			<th>Perenimi</th>
			<td><?php echo $sportlased [$_GET['index']]['perenimi'];?></td>
		</tr>
		<tr>
			<th>Aasta</th>
			<td><?php echo $sportlased [$_GET['index']]['aasta'];?></td>
		</tr>
		<tr>
			<th>Tulemus</th>
			<td><?php echo $sportlased [$_GET['index']]['tulemus'];?></td>
		</tr>
	</tbody>
</table>
<a href ="require_once.php">Õpilaste nimekiri</a>