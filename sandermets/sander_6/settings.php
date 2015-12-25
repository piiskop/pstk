<?php

// for session variables
if (!isset($_SESSION)) {
    session_start();
}

// for localization
setlocale(LC_TIME, 'et_EE.UTF-8');
date_default_timezone_set('Europe/Tallinn');
setlocale (LC_COLLATE, 'et_EE.UTF-8');

// for seeing errors
ini_set('display_errors', 1);

if (defined('E_DEPRECATED')) {
    error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_STRICT);
} else {
    error_reporting(E_ALL & ~ E_STRICT);
}

//constants
define('ROOT_FOLDER', dirname(__FILE__) . DIRECTORY_SEPARATOR);

$url = explode('?', "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
define('BASE_URL', $url[0]);
