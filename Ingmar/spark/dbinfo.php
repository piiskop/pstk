<?php

/**
 *This php files allows us to connect to the database.
 *
 * @author Ingmar Juurik
 * @author email <ingmar.juurik@gmail.com>
 */

$dbHost = "127.0.0.1";
$dbUser = "root";
$dbPswd = "password";
$dbName = "spark";

$dbcon = mysqli_connect($dbHost, $dbUser, $dbPswd, $dbName);

if (!$dbcon) {
	die('Ei sanud andmeaasiga ühendust');
	}
//echo 'you have connected succsessfully';

$db_select = mysqli_select_db($dbcon, 'spark');
if (!$db_select) {
    die("Andmebasi valik eaõnnestus: " . mysqli_error());
}

?>