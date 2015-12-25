<?php

/**
 * This php file allows us to add data to database
 *
 * @author Ingmar Juurik
 * @author email <ingmar.juurik@gmail.com>
 */

if ( isset( $_POST['submit'] ) ) 
	{
		$eesnimi = cleanData($_POST['eesnimi']);
		$perenimi = cleanData($_POST['perenimi']);
		$aadress = cleanData($_POST['aadress']);
		$isikukood = cleanData($_POST['isikukood']);
		$telefon = cleanData($_POST['telefon']);		
//		print "Data cleaned";				
		addData($eesnimi, $perenimi, $aadress, $isikukood, $telefon);
	}
	else 
	{
	printForm();
	}

function cleanData ($data)
{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = strip_tags($data);
		return $data;
}
function addData($eesnimi, $perenimi, $aadress, $isikukood, $telefon)
{
//	print "ready to add data";
	include("dbinfo.php");
	$dbcon->query("INSERT INTO kontaktid VALUES(null, '$eesnimi', '$perenimi', '$aadress', '$isikukood', '$telefon')");
	include("header.php");
	print <<<HERE
	<h1>Järgnev info on lisatud andmebaasi:</h1>
	<ul>
	<li>Eesnimi: $eesnimi</li>
	<li>Perenimi: $perenimi</li>
	<li>Aadress: $aadress</li>
	<li>Isikukood: $isikukood</li>
	<li>Telefon: $telefon</li>
	</ul>
HERE;
	
}
function printForm(){
	//displays the html form
	$pageTitle = "Lisa kontakt";
	include("header.php");
	print <<<HERE
		<h2>Lisa kontakt </h2>
		<form id = "myForm" method="POST">
		<div>
			<label for="eesnimi">Eesnimi*:</label>
			<input type="text" name="eesnimi" id="eesnimi" required="required">
		</div>
		
		<div>
			<label for="perenimi">Perenimi*:</label>
			<input type="text" name="perenimi" id="perenimi" required="required">
		</div>
		
		<div>
			<label for="aadress">Aadress:</label>
			<input type="text" name="aadress" id="aadress">
		</div>
		
		<div>
			<label for="isikukood">Isikukood*:</label>
			<input type="text" name="isikukood" id="isikukood" required="required">
		</div>
		
		<div>
			<label for="telefon">Telefon*:</label>
			<input type="text" name="telefon" id="telefon" required="required">
		</div>
		
		<div id="mySubmit">
			<input type="submit" name="submit" value="Lisa">
		</div>
		</form>
HERE;
}

?>