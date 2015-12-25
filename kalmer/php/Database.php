<?php
$mysqli = new mysqli("localhost", "world", "7eb6f163f54b52c3", "world");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " .
		 $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

if (! $mysqli->query("DROP TABLE IF EXISTS test") ||
	 ! $mysqli->query("CREATE TABLE test(id INT)") ||
	 ! $mysqli->query("INSERT INTO test(id) VALUES (1), (2), (3)")) {
	echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$res = $mysqli->query("SELECT id FROM test ORDER BY id ASC");

echo "Reverse order...\n";
for ($row_no = $res->num_rows - 1; $row_no >= 0; $row_no --) {
	$res->data_seek($row_no);
	$row = $res->fetch_assoc();
	echo " id = " . $row['id'] . "\n";
}

echo "Result set order...\n";
$res->data_seek(1);
while ($row = $res->fetch_assoc()) {
	echo " id = " . $row['id'] . "\n";
}
$mysqli->real_query("SELECT id FROM test ORDER BY id ASC");
$res = $mysqli->use_result();

echo "Result set order...\n";
while ($row = $res->fetch_assoc()) {
	echo " id = " . $row['id'] . "\n";
}

if (! $mysqli->query("DROP TABLE IF EXISTS test") ||
	 ! $mysqli->query("CREATE TABLE test(id INT, label CHAR(1))") ||
	 ! $mysqli->query("INSERT INTO test(id, label) VALUES (1, 'a')")) {
	echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$res = $mysqli->query("SELECT id, label FROM test WHERE id = 1");
$row = $res->fetch_assoc();

printf("id = %s (%s)\n", $row['id'], gettype($row['id']));
printf("label = %s (%s)\n", $row['label'], gettype($row['label']));

/* Prepared statement, stage 1: prepare */
if (! ($stmt = $mysqli->prepare("INSERT INTO test(id) VALUES (?)"))) {
	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
/* Prepared statement, stage 2: bind and execute */
$id = 1;
if (! $stmt->bind_param("i", $id)) {
	echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (! $stmt->execute()) {
	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

/*
 * Prepared statement: repeated execution, only data transferred from client to
 * server
 */
for ($id = 2; $id < 5; $id ++) {
	if (! $stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
}

/* explicit close recommended */
$stmt->close();

/* Non-prepared statement */
$res = $mysqli->query("SELECT id FROM test");
var_dump($res->fetch_assoc());
if (! $mysqli->query("INSERT INTO test(id) VALUES (1), (2), (3), (4)")) {
	echo "Multi-INSERT failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (! $mysqli->query("INSERT INTO test(id, label) VALUES (1, '1')")) {
	echo "Multi-INSERT failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (! ($stmt = $mysqli->prepare("SELECT id, label FROM test"))) {
	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (! $stmt->execute()) {
	echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$out_id = NULL;
$out_label = NULL;
if (! $stmt->bind_result($out_id, $out_label)) {
	echo "Binding output parameters failed: (" . $stmt->errno . ") " .
		 $stmt->error;
}

while ($stmt->fetch()) {
	printf("id = %s (%s), label = %s (%s)\n", $out_id, gettype($out_id), 
		$out_label, gettype($out_label));
}

if (! $mysqli->query("DROP PROCEDURE IF EXISTS p") ||
	 ! $mysqli->query(
		"CREATE PROCEDURE p(IN id_val INT) BEGIN INSERT INTO test(id) VALUES(id_val); END;")) {
	echo "Stored procedure creation failed: (" . $mysqli->errno . ") " .
	 $mysqli->error;
}

if (! $mysqli->query("CALL p(1)")) {
	echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (! ($res = $mysqli->query("SELECT id FROM test"))) {
	echo "SELECT failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

var_dump($res->fetch_assoc());

if (! $mysqli->query("DROP PROCEDURE IF EXISTS p") ||
	 ! $mysqli->query(
		'CREATE PROCEDURE p(OUT msg VARCHAR(50)) BEGIN SELECT "Hi!" INTO msg; END;')) {
	echo "Stored procedure creation failed: (" . $mysqli->errno . ") " .
	 $mysqli->error;
}

if (! $mysqli->query("SET @msg = ''") || ! $mysqli->query("CALL p(@msg)")) {
	echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (! ($res = $mysqli->query("SELECT @msg as _p_out"))) {
	echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$row = $res->fetch_assoc();
echo $row['_p_out'];

if (! $mysqli->query("DROP PROCEDURE IF EXISTS p") ||
	 ! $mysqli->query(
		'CREATE PROCEDURE p() READS SQL DATA BEGIN SELECT id FROM test; SELECT id + 1 FROM test; END;')) {
	echo "Stored procedure creation failed: (" . $mysqli->errno . ") " .
	 $mysqli->error;
}

if (! ($stmt = $mysqli->prepare("CALL p()"))) {
	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (! $stmt->execute()) {
	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

do {
	if ($res = $stmt->get_result()) {
		printf("---\n");
		var_dump(mysqli_fetch_all($res));
		mysqli_free_result($res);
	}
	else {
		if ($stmt->errno) {
			echo "Store failed: (" . $stmt->errno . ") " . $stmt->error;
		}
	}
}
while ($stmt->more_results() && $stmt->next_result());
