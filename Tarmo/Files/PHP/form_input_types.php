<!DOCTYPE html>
<html lang="EN">
	
	<head>
		<meta charset="UTF-8"/>
		<title>Input types</title>
		<link rel="stylesheet" type="text/css" href="form_input_types.css"/>
	</head>
	<body>
		<fieldset>
		<form method ="POST" name="Post" action="">
			<label for="name">Nimi:</label><br/>
			<input type="text" name="name" id="name"/><br/>
			<label for="password">Parool:</label><br/>
			<input type="password" name="password" id="password"/><br/>
			<label for="age">Vanus:</label><br/>
			<input type="number" name="age" id="age" min="1" max="130"/><br/>
			<label for="gender">Sugu:</label><br/>
			<input type="radio" name="gender" id="gender" value="Male">Mees<br/>
			<input type="radio" name="gender" id="gender" value="Female">Naine<br/>
			<label>Hobid:</label><br/>
			<input type="checkbox" name="hobbie" id="football" value="football"/>Jalgpall<br/>
			<input type="checkbox" name="hobbie" id="basketball" value="basketball"/>Korvpall<br/>
			<input type="checkbox" name="hobbie" id="singing" value="singing"/>Laulmine<br/>
			<input type="checkbox" name="hobbie" id="reading" value="reading"/>Lugemine<br/>
			<input type="range" name="range" id="range" min="0" max="2"/><br/>
			<table cellpadding="5">
				<tr><td>Low</td><td>Med</td><td>High</td></tr>
			</table>
			<input type="button" onclick="alert('Hello World!')" value="Vajuta mind!">
			<input type="submit" name="submit" id="submit" value="Saada andmed!"/>
		</form>
		</fieldset>
	</body>


</html>