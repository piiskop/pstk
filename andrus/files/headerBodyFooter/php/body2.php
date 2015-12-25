<?php 
require_once '../conf.php';
echo 2,isset($inimesed);
require_once 'array_to_body.php';
?>
<table>
	<thead>
		<tr>
			<th>Tunnus</th>
			<th>Väärtus</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Eesnimi:</td>
			<td><?php echo $inimesed[$_GET['index']]['eesnimi'];?></td>
		</tr>
		<tr>
			<td>Perenimi:</td>
			<td><?php echo $inimesed[$_GET['index']]['perenimi'];?></td>
		</tr>
	</tbody>
</table>
<a href="index.php">Home</a>
<!-- pildi kuvamine, kui pilti pole, siis on default pilt -->
<?php 
/* if (file_exists('images/yes.jpg')){
					echo '<td><img src="../img/yes.jpg" alt="Yes" /></td></tr>';
				}
				else {
					echo '<td><img src="../img/no.jpg" alt="No" /></td></tr>';
				}	 */
?>