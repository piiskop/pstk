<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="tehe.css" />
<meta charset="UTF-8">
<title>Õpilaste nimenkiri</title>
</head>
<body>
	<?php
	
require_once 'header.php';
if ($_GET ['index']>-1){
	require_once "pupil.php";
}
else {
	require_once 'body.php';
}
	
	require_once 'footer.php';
	?>ˇ
</body>
</html>