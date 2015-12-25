<?php
$pere = array (
		array (
				"ID" => 1,
				"firstName" => "Tambet",
				"lastName" => "Song",
				"phone" => "3431484",
				"adress" => " Pääsu tee",
				"pascode" => "63535" 
		),
		array (
				"ID" => 2,
				"firstName" => "Elo",
				"lastName" => "Tenusaar",
				"phone" => "544323",
				"adress" => " Pääsu tee",
				"pascode" => "00000" 
		) 
)?>

<table style="width: 30%">
	<tr>
		<td>Id</td>
		<td>Eesnimi</td>
		<td>Perenimi</td>
		<td>Telefon</td>
		<td>Kontakt</td>
		<td>Parool</td>
	</tr>
	<tr>
		<td> <?php echo $pere[0] ["ID"]?></td>
		<td> <?php echo $pere[0] ["firstName"]?></td>
		<td> <?php echo $pere[0] ["lastName"]?></td>
		<td> <?php echo $pere[0] ["phone"]?></td>
		<td> <?php echo $pere[0] ["adress"]?></td>
		<td> <?php echo $pere[0] ["pascode"]?></td>
	</tr>
	<td> <?php echo $pere[1] ["ID"]?></td>
	<td> <?php echo $pere[1] ["firstName"]?></td>
	<td> <?php echo $pere[1] ["lastName"]?></td>
	<td> <?php echo $pere[1] ["phone"]?></td>
	<td> <?php echo $pere[1] ["adress"]?></td>
	<td> <?php echo $pere[1] ["pascode"]?></td>
	</tr>


</table>

