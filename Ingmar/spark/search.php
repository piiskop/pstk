<?php

/**
 * This search file searchs data from database.
 *
 * @author Ingmar Juurik
 * @author email <ingmar.juurik@gmail.com>
 */

//database connection info
include "dbinfo.php";
$search=$_POST['Otsi'];

//sql statement to select what to search

$res = $dbcon->query ("SELECT * FROM kontaktid
	WHERE eesnimi like '%$search%' OR
	perenimi like '%$search%' OR
	aadress like '%$search%' OR
	isikukood like '%$search%' OR
	telefon like '%$search%'
	ORDER BY perenimi ASC");

//find out how many matches
$pageTitle="Otsingu tulemused";
include "header.php";
?>

<table cellpading="15">

<?php
$muutuja = 0;
while ($row = $res->fetch_assoc())  {
	$id = $row['kontaktID'];
	$eesnimi = $row['eesnimi'];
	$perenimi = $row['perenimi'];
	$aadress = $row['aadress'];
	$isikukood = $row['isikukood'];
	$telefon = $row['telefon'];
	$muutuja = $muutuja + 1;
	?>



<tr>
<td>
	<form method="post" action="confirmdelete.php">
	<input type="hidden" name="sel_record" value="<?php echo $id?>">
	<input type="submit" name="delete" value="	Kustuta	"></form>

	<form method="post" action="updateform.php">
	<input type="hidden" name="sel_record" value="<?php echo $id?>">
	<input type="submit" name="update" value="	Uuenda	"></form>

</td>

 <td>
	<br />
	<strong> <?php echo $eesnimi;?> <?php echo $perenimi;?></strong><br />
	Aadress:<?php echo $aadress;?><br />
	Iskukood:<?php echo $isikukood;?><br />
	Telefon:<?php echo $telefon;?> <br /> 
 </td>
</tr>	
	
	<?php	
}

print <<<HERE
	<h2>Otsingu tulemused</h2>
	<h3>$muutuja tulemus(t) leitud otsingule "$search"</h3>

HERE;

print "</table></body></html>";

?>