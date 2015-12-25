<?php  require_once 'configuration.php';?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Html fail mida phps-se transportida</title>
<link rel="stylesheet" href="css.css" type="text/css" media="all" />
</head>
<body>
<?php  require_once 'headerview.php';exit;?>

<br>
<?php
if ($_GET ["index"] > - 1) {
	require_once 'inimene.php';
} else {
	require_once 'Body.php';
}
?>

<br>
<?php  require_once 'Footer.html';?>

<br>
	<br>
	<!-- Siin all on muud ül-ed -->

<?php
// require_once 'reastus.php';
?>

<br>
<?php
// require_once 'liidareastus.php';
?>

</body>
</html>
