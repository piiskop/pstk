<?php
header('Content-type: text/html; charset=utf-8');

require "dbinfo.php";

$res = $dbcon->query("SELECT * FROM kontaktid ORDER BY perenimi ASC");

$pageTitle = "Minu Kontaktide Andmebaas";
include "header.php";
?>

<h2>Minu Kontaktid</h2>
<strong> Uuenda, kustuta </strong> või <strong><a href="addbyform.php">lisa kontakte </strong> </a>
<table id="home">

<?php

/**
 *This file shows us all data what we have in database.
 *
 * @author Ingmar Juurik
 * @author email <ingmar.juurik@gmail.com>
 */

while ($row = $res->fetch_assoc()) {
    $id = $row['kontaktID'];
	$eesnimi = $row['eesnimi'];
	$perenimi = $row['perenimi'];
	$aadress = $row['aadress'];
	$isikukood = $row['isikukood'];
	$telefon = $row['telefon'];



print <<<HERE
<tr>
<td>
<form method="post" action="confirmdelete.php">
<input type="hidden" name="sel_record" value="$id">
<input type="submit" name="kusuta" value="Kustuta "></form>

<form method="post" action="updateform.php">
<input type="hidden" name="sel_record" value="$id">
<input type="submit" name="uuenda" value="Uuenda "></form>
		
</td>
<td><strong>$eesnimi $perenimi</strong></br>
Aadress: $aadress<br />
Isikukood: $isikukood<br />
Telefon: $telefon<br />	<br />
</td>
	
</tr>

HERE;
}
print "</tr></table></body></html>";

?>