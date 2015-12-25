<?php
header("Content-Type: text/html; charset=utf-8");
// for session variables
if (! isset($_SESSION)) {
	session_start();
}

// for localization
setlocale(LC_TIME, 'et_EE.UTF-8');
date_default_timezone_set('Europe/Tallinn');

// for seeing errors
ini_set('display_errors', 1);

if (defined('E_DEPRECATED')) {
	error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_STRICT);
} else {
	error_reporting(E_ALL & ~ E_STRICT);
}

// header
header('Content-type: text/html; charset=utf-8');

// Constants
define('BEGINNING_OF_URL', 'http://localhost/pstk/shiporder');
define('BASE_FOLDER', 'C:/stuff/eclipse/workspace/');
define('ROOT_FOLDER', BASE_FOLDER . 'pstk/ingmar/shiporder/');

ini_set('include_path', sprintf(
		'%1$s%2$s%3$s',
		ini_get('include_path'),        // 1
		PATH_SEPARATOR,                 // 2
		'C:/xampp/php/pear' // 3
));