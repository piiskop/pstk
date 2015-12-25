<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Digitaalne tööleht</title>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="calendar.css">
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div id="main_div">
	<p class="fa fa-user">Ants Juhansson</p>
	<div class="calendar">
		<?php
		  date_default_timezone_set('UTC');
		  $find = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		  $lang = substr($find,0,2);
		  if ($lang == "it") {
		    include("calendar_it.php");
		  } else {
		    include("calendar_en.php");
		  }
		?>
	</div>
		<table class="logos" cellspacing="0">	
			<tr>	
				<td id="1"><a href="save.php" class="fa fa-file-pdf-o"></a></td>
				<td id="2"><a href="settings.php" class="fa fa-cogs"></a></td>
				<td id="3"><a href="logout.php" class="fa fa-sign-out"></a></td>
			</tr>
		</table>
			
	</div>
</body>
</html>