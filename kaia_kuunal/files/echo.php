<?php 
/**
 * 
 * Outputting text
 * 
 */
?>

<!DOCTYPE html>
<html>
	<head>
		<title>echo</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<ol>
			<!-- HTML -->
			<li>Kas Teil on ühiseid "alaealisi" lapsi?</li>
			<li><?php echo "Kas Teil on ühiseid \"alaealisi\" lapsi?"; ?></li>
			<li><?php echo 'Kas Teil on ühiseid "alaealisi" lapsi?'; ?></li>
			<?php $sentence = 'Kas Teil on ühiseid "alaealisi" lapsi?'; ?>
			<li><?php echo $sentence; ?></li>
		</ol>
	</body>
</html>