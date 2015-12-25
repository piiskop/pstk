<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css.css">
<meta charset="UTF-8"/>
</head>
<?php 
$start = $_GET['start'];
$stop = $_GET['stop'];

/* Funktsioon lühikese kuupäeva kuvamiseks. */
function shortDate($start, $stop){
	if($_GET['start'] || $_GET['stop']){
		$start_short = strtotime($start);
		$stop_short = strtotime($stop);
	
		if (date('y',$start_short) == date('y',$stop_short)) 
		{
			if(date('m',$start_short) == date('m',$stop_short))
			{
				if (date('d',$start_short) == date('d',$stop_short)) 
				{
					$show = date('j.n.Y',$stop_short);
					echo $show;
				}
			}
		}
		if (date('y',$start_short) == date('y',$stop_short)) 
		{
			if(date('m',$start_short) != date('m',$stop_short))
			{
				if (date('d',$start_short) != date('d',$stop_short)) 
				{
					$show = date('j.n', $start_short).'-'.date('j.n.Y',$stop_short);
					echo $show;
				}
			}
		}
		if (date('y',$start_short) == date('y',$stop_short)) 
		{
			if(date('m',$start_short) != date('m',$stop_short))
			{
				if (date('d',$start_short) == date('d',$stop_short)) 
				{
					$show = date('j.n', $start_short).'-'.date('j.n.Y',$stop_short);
					echo $show;
				}
			}
		}
		if (date('y',$start_short) == date('y',$stop_short)) 
		{
			if(date('m',$start_short) == date('m',$stop_short))
			{
				if (date('d',$start_short) != date('d',$stop_short)) 
				{
					$show = date('j', $start_short).'-'.date('j.n.Y',$stop_short);
					echo $show;
				}
			}
		}
		else 
		{
					$show = date('j.n.Y', $start_short).'-'.date('j.n.Y',$stop_short);
					echo $show;
		}
	}
}

?>

<body>
	<div id="container">
<form action="<?php $_PHP_SELF ?>" method="GET">
<label>Algus</label>
<br>
<input type="text" name="start">
<br>
<label>Lõpp</label>
<br>
<input type="text" name="stop">
<br>
<button type="submit">Saada</button>
</form>
<br>
<h1><?php shortDate($start, $stop) ?></h1>

</body>
</html>