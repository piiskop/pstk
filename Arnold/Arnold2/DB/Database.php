<?php
$mysqli = new mysqli("localhost", "world", "123", "world");//user-world dtabase-world
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";
