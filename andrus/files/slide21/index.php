<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Slaid 21 harjutus</title>
<link rel="stylesheet" href="style/style1.css" type="text/css" media="all"/>
</head>
<body>
	<div>
		<?php include 'header.html';
			if ($_GET['index']>-1) {
				include 'body2.php';
			}
			else{
				include 'body.php';
			}
			include 'footer.html';?>
	</div>
</body>
<footer>
</footer>
</html>