<!DOCTYPE html>
<html>
	<head>
		<title>PHP andmetüübid</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php
			$someDecimal = 26.5;
			
			// is_array: tõene, kui muutuja on massiiv
			echo $someDecimal . ' ' . (is_array($someDecimal) ? 'on' : 'pole') . ' massiiv.<br/>';
			
			// is_int: tõene, kui muutuja on täisarv
			echo $someDecimal . ' ' . (is_int($someDecimal) ? 'on' : 'pole') . ' täisarv.<br />';
			
			// gettype: tagastab muutuja tüübi
			echo $someDecimal . ' on "' . gettype($someDecimal) . '".';
		?>
	</body>
</html>
