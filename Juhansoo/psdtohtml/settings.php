<?php
// for session variables
if (!isset($_SESSION)) {
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
define('BEGINNING_OF_URL', 'http://localhost/pstk/Juhansoo/psdtohtml/');
define('BLOG', 'http://blogspot.com');
define('VIDEOS', 'http://youtube.com');
define('BASE_FOLDER', 'C:/Users/Rasmus/workspace/');
define('ROOT_FOLDER', BASE_FOLDER . 'pstk/Juhansoo/psdtohtml/');
define('LOGOS_FOLDER', ROOT_FOLDER . 'images/logos/');
define('DEFAULT_LOCALE', 'et_EE');
define('ID_OF_DESIGNER', 1);
define('MENU_COMMON', 1);
define('MENU_OUTER', 2);
define('MENU_INNER', 3);
require_once dirname(__FILE__) . '/../timeago/String.php';