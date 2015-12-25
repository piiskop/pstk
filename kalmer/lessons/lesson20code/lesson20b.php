<?php
$connection = @new mysqli('localhost', 'php24sql', 'hJQV8RTe5t');
if ($connection->connect_error) {
  die('Connect Error: ' . $connection->connect_error);
} else {
  echo 'Successful connection to MySQL';
}
