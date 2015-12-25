<?php

/**
 *This php file shows us what we have updated from database.
 *
 * @author Ingmar Juurik
 * @author email <ingmar.juurik@gmail.com>
 */

include "dbinfo.php";

$id = $_POST['id'];
$eesnimi = $_POST['eesnimi'];
$perenimi = $_POST['perenimi'];
$aadress = $_POST['aadress'];
$isikukood = $_POST['isikukood'];
$telefon = $_POST['telefon'];

$sql="UPDATE kontaktid SET
eesnimi='$eesnimi',
perenimi='$perenimi',
aadress='$aadress',
isikukood='$isikukood',
telefon='$telefon'
where kontaktID='$id' ";

$result=$dbcon->query($sql) or die (mysql_error());

print "<html><head><title>Update Results</title></head><body>";
include "header.php";
print <<<HERE
<h1>Uuendatud kontakt näeb välja selline: </h1>
<p><strong>Eesnimi:</strong> $eesnimi</p>
<p><strong>Perenimi:</strong> $perenimi</p>
<p><strong>Aadress:</strong> $aadress</p>
<p><strong>Isikukood:</strong> $isikukood</p>
<p><strong>Telefon:</strong> $telefon</p>
HERE;

?>
