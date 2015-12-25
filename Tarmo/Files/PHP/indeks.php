<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset ="UTF-8">
        <title>Example</title>
        <link rel="stylesheet" type="text/css" href="index.css"/>
        
	</head>
	<body>
		<fieldset class="fieldset">
		<form action="" method="POST" name="calculator">
			<label for="first">Eesnimi:</label>
			<input type="text" id="first" name="first" value = "<?php echo $_POST['first'] ?>"/><br/>
			<label for="second">Perenimi:</label>
			<input type="text" id="second" name="last" value = "<?php echo $_POST['last']?>"/><br/>
			<input type="radio" name="choice" value="liida" <?php if ($_POST['choice']== 'liida') {print ' checked="checked"';} ?>/>Liida<br/>
			<input type="radio" name="choice" value="lahuta" <?php if ($_POST['choice']== 'lahuta') {print ' checked="checked"';} ?>/>Lahuta<br/>
			<input type="radio" name="choice" value="korruta" <?php if ($_POST['choice']== 'korruta') {print ' checked="checked"';} ?>/>Korruta<br/>
			<input type="radio" name="choice" value="jaga" <?php if ($_POST['choice']== 'jaga') {print ' checked="checked"';} ?>/>Jaga<br/>
			<input type="submit" name="submit" value="Arvuta!"/>
		</form>
		<?php
		
		if ($_POST["submit"]){
			$first = strlen(trim($_POST["first"]));
			$second = strlen(trim($_POST["last"]));
			if($_POST["choice"] == "liida"){
				$result = $first + $second;
				echo ($first." + " .$second ." = ".$result);}
			else if($_POST["choice"] == "lahuta"){
				$result = $first - $second;
				echo ($first." - " .$second ." = ".$result);}
			else if($_POST["choice"] == "korruta"){
				$result = $first * $second;
				echo ($first." * " .$second ." = ".$result);}
			else if($_POST["choice"] == "jaga"){
				$result = $first / $second;
				echo ($first." : " .$second ." = ".$result);}
			echo $choice;	
		}
		?>
		</fieldset>
	</body>        
</html>
