<?php
/**
 * 
 * Setting and reading cookies
 *
 */

// If $_COOKIE['KaiaCookie'] isn't set, its NULL
if (!$_COOKIE['KaiaCookie']) {
	
	echo 'Creating cookie... ';
	
	// Cookie expires after 10 seconds
	$cookieDuration = time() + 10;
	
	$cookieValue = 'k&uuml;psis PHP tunnist!';
	
	// Scripting languages can't access this cookie
	$httpOnly = true;
	
	setcookie('KaiaCookie', $cookieValue, $cookieDuration, '', '', '', $httpOnly);
	
	echo 'Done! Refresh!';
	
} else {
	echo 'Cookie exists: "' . $_COOKIE['KaiaCookie'] . '"';
}