<?php

/**
 * This file ask us if we really want to delete a data from database.
 * 
 *	Gets $id from confirmdelete.php.
 *	Finds matching id in database and deletes.
 *	Shows comfirmation that record has been deleted.
 *
 * @author Ingmar Juurik
 * @author email <ingmar.juurik@gmail.com>
 */

// gets $id from confirmdelete.php
//finds matching id in database and deletes
//shows comfirmation that record has been deleted
include "dbinfo.php";

$id = $_POST['id'];
$res = $dbcon->query("SELECT * FROM kontaktid WHERE kontaktID = '$id'");
while ($row = $res->fetch_assoc()) {
		$id = $row['kontaktID'];
		$eesnimi = $row['eesnimi'];
		$perenimi = $row['perenimi'];
		$aadress = $row['aadress'];
		$isikukood = $row['isikukood'];
		$telefon = $row['telefon'];

include "header.php";

}

$dbcon->query("DELETE FROM kontaktid WHERE kontaktID= '$id'") or die ('ebaõnnestus');

print "<p><h2>Kontakt andmetega: </h2><br />
<strong> ID: </strong> $id<br />
<strong> Eesnimi: </strong> $eesnimi<br />
<strong> Perenimi: </strong> $perenimi<br />
<strong> Aadress: </strong> $aadress<br />
<strong> Isikukood: </strong> $isikukood<br />
<strong> Telefon: </strong> $telefon<br /> <br />

<h3>on lõplikult andmebaasist kustutatud. <h/3></p>";

?>