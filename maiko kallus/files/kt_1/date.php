<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css.css">
<meta charset="UTF-8"/>
</head>
<?php 
$start = $_GET['start'];
$stop = $_GET['stop'];



/*if($_GET['start'] || $_GET['stop']){
	$pieces = explode(' ', $start);
	$start2 = explode('-', $stop[0])
	$end = explode(' ', $stop);
	$end2 = explode('-', $end[0]);

	if($start[1]>10)
	{
		$show = $start2[2].'-'.$end2[2].'.'.$end2[1].'.'.$end2[0];
	}
}*/

if($_GET['start'] || $_GET['stop']){
	$start_short = strtotime($start);
	$stop_short = strtotime($stop);

	//$show = date('j.n',$start_short).'-'.date('j.n.Y', $stop_short);
	if (date('y',$start_short) == date('y',$stop_short)) 
	{
		if(date('m',$start_short) == date('m',$stop_short))
		{
			if (date('d',$start_short) == date('d',$stop_short)) 
			{
				$show = date('j.n.Y',$stop_short);
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
			}
		}
	}
	else //(date('y',$start_short) != date('y',$stop_short)) 
	{
				$show = date('j.n.Y', $start_short).'-'.date('j.n.Y',$stop_short);
	//		}
	//	}
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
<h1><?php echo $show; ?></h1>

</body>
</html>