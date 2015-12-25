<!DOCTYPE html>
<html>
<body>

<form method="post" action="vorm_shows_info.php">
	<label for="esimene">kakuke</label>
	<input type="text" name="esimene" ><br />
	
	<select name="valib">
		<option>vesi</option>
		<option>coca-cola</option>
	</select><br />	
	
	<textarea name="tekst" rows="1" cols="10"></textarea><br />	
	
	<input type="checkbox" name="yes_no" value="agree" >I agree<br />
	
	<label for="date_from_user">kuupaev siia</label>
	<input type="date" name="date_from_user"><br />
	
	<input type="submit" value="Submit"><br />
</form>

<br />

<form method="get" action="">
	<label for="nimi">kukkus</label>
	<input type="text" name="nimi" >
	<input type="submit" value="Submit">
</form>

<?php
echo $_GET["nimi"] . '<br />';
?>
</body>
</html>
