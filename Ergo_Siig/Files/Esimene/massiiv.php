<html>
<head>
<meta charset="UTF-8">
<title>Esimene</title>
<link type="text/css" rel="stylesheet" href="massiiv.css" />
</head>
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
$Kalad = array(
array (
		"nimetus"  => "Siig",
		"sugukond" => "Silmulised",
		"klass"    => "Thelodonti"		
),
array(
		"nimetus"  => "Ahven",
		"sugukond" => "Tuuralised",
		"klass"    => "Anaspida"		
),
array(
		"nimetus"  => "Haug",
		"sugukond" => "Heeringalised",
		"klass"    => "Galeaspida"		
),array(
		"nimetus"  => "Räim",
		"sugukond" => "Tuuralised",
		"klass"    => "Pituriaspida"		
),
array(
		"nimetus"  => "Lõhe",
		"sugukond" => "Lõhelised",
		"klass"    => "Osteostraci"
)
);
?>
<table>
	<thead>
		<th>NIMETUS</th> 
		<th>SUGUKOND</th>
		<th>KLASS</th>
	</thead>
	<tbody>
		<?php for ($nr = 0; $nr <= 4; $nr++)
		{?>
			<tr class= "Row<?php $row = muudacolorit($row); echo $row ?>">
			<td><?php echo $Kalad[$nr]["nimetus"];?></td>
			<td><?php echo $Kalad[$nr]["sugukond"];?></td>
			<td><?php echo $Kalad[$nr]["klass"];?></td>
			</tr>
  <?php }?>
 	</tbody>
</table>
