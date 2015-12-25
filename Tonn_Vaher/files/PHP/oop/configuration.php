<?php
ini_set("display_errors", 1); 
if (defined ("E_DEPRECATED")) {
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
else {
	error_reporting(E_ALL & ~E_STRICT);
}

define ('BEGINING_OF_URL','http://localhost/pstk/PHP/oop/')

?>