<?php
namespace kontrolltoo;
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
define('BEGINNING_OF_URL', 'http://localhost/pstk/Kristen/');
define('BASE_FOLDER', '/home/Kristen/workspace/');
define('ROOT_FOLDER', BASE_FOLDER . 'pstk/Kristen/kontrolltöö');
define('DEFAULT_LOCALE', 'et_EE');

require_once dirname(__FILE__) . '/String.php';