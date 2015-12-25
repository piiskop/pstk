<?php
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
define('BEGINNING_OF_URL', 'http://localhost/pstk/erika/particle/');
define('BASE_FOLDER', 'C:/Users/amanda/Desktop/');
define('ROOT_FOLDER', BASE_FOLDER . 'pstk/erika/particle/');
define('LOGOS_FOLDER', ROOT_FOLDER . 'images/logos/');
define('DEFAULT_LOCALE', 'et_EE');
define('MENU_COMMON', 1);
define('MENU_SIDE', 2);
require_once dirname(__FILE__) . '/String.php';

ini_set('include_path', sprintf(
		'%1$s%2$s%3$s',
		ini_get('include_path'),        // 1
		PATH_SEPARATOR,                 // 2
		'C:/xampp/php/pear' // 3
));