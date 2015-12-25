<?php
//Display UTF-8 characters
header ( 'Content-type: text/html; charset=utf-8' );

//Display errors
ini_set('display_errors', 1);
if (defined('E_DEPRECATED')) {
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
else {
	error_reporting(E_ALL & ~E_STRICT);
}

//Set default timezone
date_default_timezone_set('Europe/Tallinn');

//Pear path
ini_set('include_path', sprintf(
'%1$s%2$s%3$s',
ini_get('include_path'),        // 1
PATH_SEPARATOR,                 // 2
'.:..:../..;C:\wamp\bin\php\php5.4.12\pear' // 3
));
?>