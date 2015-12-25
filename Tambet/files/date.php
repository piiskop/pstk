<?php  require_once 'configuration.php';?>
<!doctype html>
<html>
<?php

/**
 * 1.1 Sisendid
 * *Kujul “yyyy-mm-dd hh:mm:ss”:
 * *1.1.1: algushetk (nt “2005-02-26 07:30:00”),
 * *1.1.2: lõpuhetk (nt “2005-02-27 22:37:25”)
 */
?>

<head>
<meta charset="utf-8">
<title>Alates-Kuni</title>
</head>
<body>
	<form action="vastus.php" method="post">
		Alates : <input type="text" name="from"
			value="2015-02-27 22:37:00"> 
		Kuni : <input type="text" name="to" 
			value="2018-02-26 07:30:25"><br> <br> 
		<input type="submit">
		<br>
	</form>
	<br>
<?php $nadal=array(1=>"E",
		2=>"Teisipäev",
		3=>"Kolmapäev",
		4=>"Nelajapäe",
		5=>"Reede",
		6=>"Laupäev",
		7=>"P"
)
?>
	<table>
		<tbody>
<form action="vastus.php" method="post">
<input type="radio"name="paev" value="E">Esmaspäev <br>
<input type="radio" name="paev" value="T">Teisipäev<br>
<input type="radio" name="paev" value="K">Kolmapäev<br>
<input type="radio" name="paev" value="N">Neljapäev<br>
<input type="radio" name="paev" value="R">Reede<br>
<input type="radio" name="paev" value="L">Laupäev<br>
<input type="radio" name="paev" value="P">Pühapäev<br>
<input type="submit"><br>
</form>
</body>
<br>

</html>
