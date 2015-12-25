<?php

/**
 *This php file contains a html code and this file creats us a visible page.
 *
 * @author Ingmar Juurik
 * @author email <ingmar.juurik@gmail.com>
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
	<title><?php echo $pageTitle; ?></title>
<link type="text/css" rel="stylesheet" media="screen" href="layout.css" />
</head>
<body>

<table id="nav">
<tr>
<td><a href="index.php">Pealeht</a></td>
<td><a href="addbyForm.php">Lisa kontakte</a></td>
<td>
		<form method="post" action="search.php">
		<input type="text" name="Otsi" />
		<input type="submit" value=" Otsi ">
		</form>
</td>
</tr>		
</table>

