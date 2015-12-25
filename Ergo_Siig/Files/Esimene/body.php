<?php
$row = 0;

function muudacolorit($row)
{
	if($row == 0)
	{
		$row = 1;
		return ($row);
	}
	if($row == 1)
	{
		$row = 0;
		return ($row);
	}
}
?>

<body>

<div id="tabel">
<table>
	<thead>
		<tr class= "Row<?php $row = muudacolorit($row); echo $row ?>">
			<th>Eesnimi</th>
			<th>Perenimi</th>
			<th>Adress</th>
			<th>Mail</th>
		</tr>
	</thead>
	<tbody>
		<tr class= "Row<?php $row = muudacolorit($row); echo $row ?>">
			<td>Juhan</th>
			<td>Junn</th>
			<td>Kapakohila 9</th>
			<td>juhan.junn@julla.ee</th>
		</tr>
			<tr class= "Row<?php $row = muudacolorit($row); echo $row ?>">
			<td>Juhan</th>
			<td>Junn</th>
			<td>Kapakohila 9</th>
			<td>juhan.junn@julla.ee</th>
		</tr>
			<tr class= "Row<?php $row = muudacolorit($row); echo $row ?>">
			<td>Juhan</th>
			<td>Junn</th>
			<td>Kapakohila 9</th>
			<td>juhan.junn@julla.ee</th>
		</tr>
			<tr class= "Row<?php $row = muudacolorit($row); echo $row ?>">
			<td>Juhan</th>
			<td>Junn</th>
			<td>Kapakohila 9</th>
			<td>juhan.junn@julla.ee</th>
		</tr>
			<tr class= "Row<?php $row = muudacolorit($row); echo $row ?>">
			<td>Juhan</th>
			<td>Junn</th>
			<td>Kapakohila 9</th>
			<td>juhan.junn@julla.ee</th>
		</tr>
			<tr class= "Row<?php $row = muudacolorit($row); echo $row ?>">
			<td>Juhan</th>
			<td>Junn</th>
			<td>Kapakohila 9</th>
			<td>juhan.junn@julla.ee</th>
		</tr>
			<tr class= "Row<?php $row = muudacolorit($row); echo $row ?>">
			<td>Juhan</th>
			<td>Junn</th>
			<td>Kapakohila 9</th>
			<td>juhan.junn@julla.ee</th>
		</tr>
			<tr class= "Row<?php $row = muudacolorit($row); echo $row ?>">
			<td>Juhan</th>
			<td>Junn</th>
			<td>Kapakohila 9</th>
			<td>juhan.junn@julla.ee</th>
		</tr>
	</tbody>
</table>
</div>	
</body>