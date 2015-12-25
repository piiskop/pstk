<?php
ini_set('display_errors',1);
if(defined('E_DEPRECATED')){
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
else{
	error_reporting(E_ALL & ~E_STRICT);
}
date_default_timezone_set('Europe/TAllinn');