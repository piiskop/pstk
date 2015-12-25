<?php

/**
 *This php file allows us to update data from database.
 *
 * @author Ingmar Juurik
 * @author email <ingmar.juurik@gmail.com>
 */

require "dbinfo.php";
$sel_record = $_POST['sel_record'];

//SQL statement to select information
$res = $dbcon->query("SELECT * FROM kontaktid WHERE kontaktID = '$sel_record'");

//execute SQL query and get result
	
		//loop through record and get values
	while ($row = $res->fetch_assoc()) {
		$id = $row['kontaktID'];
		$eesnimi = $row['eesnimi'];
		$perenimi = $row['perenimi'];
		$aadress = $row['aadress'];
		$isikukood = $row['isikukood'];
		$telefon = $row['telefon'];
			
		
	}	//end of while loop
	
$pageTitle = "Uuenda kontakte";
include "header.php";
Print <<<HERE
		<h2>Uuenda kontakti</h2>
		<p>Muuda vajalikke andmeid ning seejärel kliki "Uuenda kontakti".</p>
		
		<form id = "myForm" method ="POST" action = "update.php">
		<input type ="hidden" name="id" value="$id">
		
		<div>
			<lable for="eesnimi">Eesnimi*:</lable>
			<input type = "text" name="eesnimi" id="eesnimi" value="$eesnimi">
		</div>	
		
		<div>
			<lable for="perenimi">Perenimi*:</lable>
			<input type = "text" name="perenimi" id="perenimi" value="$perenimi">
		</div>	
		
		<div>
			<lable for="aadress">Aadress:</lable>
			<input type = "text" name="aadress" id="aadress" value="$aadress">
		</div>	
		
		<div>
			<lable for="isikukood">Isikukood*:</lable>
			<input type = "text" name="isikukood" id="isikukood" value="$isikukood">
		</div>	
		
		<div>
			<lable for="telefon">Telefon*:</lable>
			<input type = "text" name="telefon" id="telefon" value="$telefon">
		</div>	
		
		<div id="mySubmit">
			<input type = "submit" name="submit" value="Uuenda kontakti">
		</div>
		</form>			
		
HERE;


?>