<?php
/**
 * 
 * Formatting dates
 *
 */


date_default_timezone_set('Europe/Tallinn');

/*
echo time();

echo '<hr />';

echo date('d.m.Y H:i:s');

echo '<hr />';

echo date('o-m-d');

echo '<hr />';

echo date('d.m.Y H:i:s', strtotime('+2 days'));

echo '<hr />';

echo $_SERVER['REQUEST_TIME'] == time();

echo '<hr />';
*/

$customDate = mktime(4, 52, 31, 2, 3, 2015);

echo date('d.m.Y H:i:s') . '<br />';
echo date('d.m.Y H:i:s', $customDate);

echo '<hr />';

// Aasta, kuu, päev
echo date('omd') . '<br />';
echo date('omd', $customDate);

echo '<hr />';

// Ainult kuu
echo date('n') . '<br />';
echo date('n', $customDate);

echo '<hr />';

// Ainult päev
echo date('j') . '<br />';
echo date('j', $customDate);

echo '<hr />';

// Tunnid ja minutid
echo date('G:i') . '<br />';
echo date('G:i', mktime(4, 05));