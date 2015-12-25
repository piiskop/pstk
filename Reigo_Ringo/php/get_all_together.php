<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
	<?php
		require_once 'includeheader.html';
		require_once 'get_array.php';	
		if ($_GET['index'] > -1)
		{
			require_once 'get_single_creature.php';
		}
		else
		{
			require_once 'get_div.php';
		}
	
		require_once 'includefooter.html';
	?>
	</body>
</html>