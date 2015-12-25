<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset ="UTF-8">
        <title>Muuda andmeid</title>
        <link rel="stylesheet" href="settings.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	</head>
	<body>
		<?php
		date_default_timezone_set('UTC');
		$kuud = array ( 1 => 'jaanuar', 'veebruar', 'märts',  'aprill', 'mai', 'juuni', 'juuli', 'august', 'september', 'oktoober', 'november', 'detsember' );
		?>
		<div id="main">
			<a href="main.php">Logo</a>
			<table cellspacing="0">
				<tr>
					<td id="1"><?php echo $kuud[date("n")];?></td>
					<td id="2"><?php echo date("Y"); ?></td>
					<td id="3"> </td>
					<td id="4"></td>
					<td id="5"><a href="save.php" id="1" class="fa fa-file-pdf-o"></a></i> </td>
					<td id="6"><a href="settings.php"  id="2" class="fa fa-cogs"></a></td>
					<td id="7"><a href="llogout.php" id="3" class="fa fa-sign-out"></a></td>
				</tr>	
			</table>
			<form action="" method="post" name="change_data">
				<input type="email" id="mail"/>
				<label for="mail">E-posti aadress</label><br />
				<input type="tel" id="tel"/>
				<label for="tel">Telefoni nr.</label><br/>		
				<input type="password" id="pwd"/>
				<label for="pwd">Vana parool</label><br/>	
				<input type"password" id="newpwd"/>
				<label for="newpwd">Uus parool</label><br/>			
				<input type="password" id="newpwdagain">
				<label for="newpwdagain">Uus parool uuesti</label><br/>
				<input type="submit" id="change" value="Muuda"/>
			</form>
			<hr>
			<p align="right">Digitaalne tööleht 2014</p>
		</div>
		
    </body>
</html>

