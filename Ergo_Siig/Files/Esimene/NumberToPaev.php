<!--Sisestamise vorm-->
<html>
	<meta charset="UTF-8">
	<body>
	<h2>Sisesta palun nr:</h2>
		<form action="<?php $_PHP_SELF ?>" method="GET">
			Number: <input type="text" name="number" />
			<input type="submit" />
		</form>
	</body>
</html>
<?php
/** see näitab vigu, requier see igasse php-se.**/
ini_set("display_errors", 1); 
if (defined ("E_DEPRECATED"))
{
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
else 
{
	error_reporting(E_ALL & ~E_STRICT);
}
//Teisendamine
function numberPaevax($number)
{
	switch ($number) 
	{
		case 1:
			$paev = "Esmaspäev";
			return ($paev);
		case 2:
			$paev = "Tesipäev";
			return ($paev);
		case 3:
			$paev = "Kolmapäev";
			return ($paev);
		case 4:
			$paev = "Neljapäev";
			return ($paev);
		case 5:
			$paev = "Reede";
			return ($paev);
		case 6:
			$paev = "Laupäev";
			return ($paev);
		case 7:
			$paev = "Pühapäev";
			return ($paev);
		default:
			echo "Ahhaaa, sellist päeva pole olemas!";
	}
}
//Väljakutsumine
if(isset ($_GET) && isset ($_GET['number']))
{
	echo numberPaevax($_GET['number']);
}
?>
</br>
<a href="NumberToPaev.php">Reset</a>
