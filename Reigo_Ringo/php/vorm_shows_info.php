<?php

if (isset($_POST["esimene"])){
	$muutuja = $_POST["esimene"];
	echo $muutuja . '<br />';
	
}

echo $_POST["valib"] . '<br />';
echo $_POST["tekst"] . '<br />';
echo $_POST["yes_no"] . '<br />';
echo $_POST["date_from_user"] . '<br />';

echo '<pre>';
print_r($_POST);
echo '</pre>';
