<?php //require_once '../../conf.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Slaid 21 harjutus</title>
<link rel="stylesheet" href="style/style1.css" type="text/css" media="all"/>
</head>
<body>
	<div>
		<?php include 'php/headerView.php';
			if ($_GET['index']>-1) {
				include 'php/body2.php';
			}
			else{
				include 'php/body.php';
			}
			include 'html/footer.html';?>
	</div>
</body>
<footer>
</footer>
</html>