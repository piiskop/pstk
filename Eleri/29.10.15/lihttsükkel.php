<?php
# for session variables
if (!isset($_SESSION))
{
	session_start();
}

# for localization
setlocale(LC_TIME, 'et_EE.UTF-8');
date_default_timezone_set('Europe/Tallinn');

# for seeing errors
ini_set('display_errors', 1);

if (defined('E_DEPRECATED'))
{
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
else
{
	error_reporting(E_ALL & ~E_STRICT);
}

# header
header('Content-type: text/html; charset=utf-8');



