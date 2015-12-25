<?php
function getFullName ($firstName, $lastName)
{
	echo $firstName;
	echo $lastName;
	$fullName = $firstName."".$lastName;
	return ($fullName);
}
echo getFullName();
//Parandus
function getFullNameParandus ($firstName, $lastName)
{
	echo $firstName;
	echo $lastName;
	$fullName = $firstName."".$lastName;
	return ($fullName);
}
echo getFullNameParandus("Kalle", "Kusta");