


<div>

	<table id="tr_steve">

		<tr>
			<th>Name:</th>
			<td><?php echo $tractordata[$_GET ["index"]]["Name"] ?></td>
		</tr>
		<tr>
			<th>Color:</th>
			<td><?php echo $tractordata[$_GET ["index"]]["Color"] ?></td>
		</tr>
		<tr>
			<th>Horsepower:</th>
			<td><?php echo $tractordata[$_GET ["index"]]["Horsepower"] ?></td>
		</tr>
		<tr>
			<th>Weight:</th>
			<td><?php echo $tractordata[$_GET ["index"]]["Weight"] ?></td>
		</tr>
	</table>

</div>

<div><a href="tractors.php">All tractors</a>
