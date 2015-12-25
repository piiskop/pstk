<?php
$mysqli = new mysqli("localhost", "world", "raiko", "world");
if($mysqli->connect_errno){
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " ;
}
echo $mysqli ->host_info . "\n";

	if (!$mysqli->query("DROP TABLE IF EXISTS test") ||
		!$mysqli->query("CREATE TABLE test(id INT)") ||
		!$mysqli->query("INSERT INTO test(id) VALUES (1)")) {
			echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}