<?php
require_once 'data.php';
?>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Nimi</th>
		</tr>
	</thead>
	<tbody>
	<?php
	if (! empty ( $_GET ['id'] )) {
		$getId = $_GET ['id'] - 1;
		echo "<tr><td>" . $persons [$getId] ['ID'] . "</td>" . "<td>" . $persons [$getId] ['Name'] . "</td></tr>";
	} else {
		foreach ( $persons as $person ) {
			$i = $person ['ID'];
			echo "<tr><td><a href=\"require.php?id=$i\"</a>" . $person ['ID'] . "</td>" . "<td>" . $person ['Name'] . "</td></tr>";
		}
	}
	?>
	</tbody>
</table>

<a href= "require.php">Tagasi nimekirja</a>