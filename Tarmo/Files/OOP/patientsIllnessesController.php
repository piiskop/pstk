<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<link type="text/css" rel="stylesheet" href="style.css"/>
<title>PHP Classes</title>
</head>
<body>
<?php 
require_once 'patientsClass.php';
require_once 'illnessesClass.php';
echo '<table border="1px" cellspacing="0px">
	 	<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Age</th>
			<th>Gender</th>
			<th>Illness</th>
			<th>Curable</th>
		</tr>
		<tr>
			<td>'.$person1->getPersonId().'</td>
			<td>'.$person1->getPersonName().'</td>
			<td>'.$person1->getPersonAge().'</td>
			<td>'.$person1->getPersonGender().'</td>
			<td>'.$illnessDesc1->getIllnessName().'</td>
			<td>'.$illnessDesc1->getIsCurable().'</td>
		</tr>
		<tr>
			<td>'.$person2->getPersonId().'</td>
			<td>'.$person2->getPersonName().'</td>
			<td>'.$person2->getPersonAge().'</td>
			<td>'.$person2->getPersonGender().'</td>
			<td>'.$illnessDesc1->getIllnessName().'</td>
			<td>'.$illnessDesc1->getIsCurable().'</td>
		</tr>
		<tr>
			<td>'.$person2->getPersonId().'</td>
			<td>'.$person2->getPersonName().'</td>
			<td>'.$person2->getPersonAge().'</td>
			<td>'.$person2->getPersonGender().'</td>
			<td>'.$illnessDesc2->getIllnessName().'</td>
			<td>'.$illnessDesc2->getIsCurable().'</td>
		</tr>																																	
	 </table>'
?>
</body>
</html>