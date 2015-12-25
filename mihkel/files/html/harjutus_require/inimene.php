<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Insert title here</title>
		<LINK href="CSS/harjutus_3.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?php require_once 'pais.html'; ?>
		<div class="kere">
			<?php
			require_once 'array.php';
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
					<tr>
						<td>Telefon:</td>
						<td><?php echo $inimesed[$_GET['index']]['telefon'];?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?php echo $inimesed[$_GET['index']]['email'];?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php require_once 'jalus.html'; ?>
	</body>
</html>