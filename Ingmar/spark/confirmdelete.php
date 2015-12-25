<?php

/**
 * This php file allows us to delete a data from database.
 *
 * @author Ingmar Juurik
 * @author email <ingmar.juurik@gmail.com>
 */

require "dbinfo.php";
$id = $_POST['sel_record'];

//SQL statement to select information
$res = $dbcon->query("SELECT * FROM kontaktid WHERE kontaktID = '$id'");

 {
	//loop through record and get values
	while ($row = $res->fetch_assoc()) {
		$id = $row['kontaktID'];
		$eesnimi = $row['eesnimi'];
		$perenimi = $row['perenimi'];
		$aadress = $row['aadress'];
		$isikukood = $row['isikukood'];
		$telefon = $row['telefon'];
			

	}	//end of while loop

	$pageTitle = "Delete a Contact";
	include "header.php";

print <<<HERE
<h2>Olete kindel, et soovite selle kontakti kustutada?<br />
Järgnev kontakt kustutakse jäädavalt: </h2>
<ul>
<li> <strong> kontaktID: </strong> $id</li>
<li> <strong> Eesnimi: </strong> $eesnimi</li>
<li> <strong> Perenimi: </strong> $perenimi</li>
<li> <strong> Aadress: </strong> $aadress</li>
<li> <strong> Isikukood: </strong> $isikukood</li>
<li> <strong> Telefon: </strong> $telefon</li>
</ul>
<p><br />

<form method="POST" action="reallydelete.php">
<input type="hidden" name="id" value="$id">
<input type="submit" name="reallydelete" value="Kustuta" />
<input type="button" name="cancel" value="Tühista"
onClick="location.href='index.php' " /></a>
</p></form>
HERE;
}

	?>