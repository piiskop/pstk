<!DOCTYPE html>


<?php  require_once 'configuration.php'; ?>

<html>
<head>
<meta charset="UTF-8">
<title>Traktoid</title>
<link rel="stylesheet" href="tractors.css">
</head>
<body>
<?php
require_once 'data.php';
require 'header.html';
if ($_GET ["index"] > -1) {
	require 'tractor.php';
} else {
	require 'body.php';
}
require 'footer.html';
?>
</body>
</html>