<?php

# for session variables
if (!isset($_SESSION)) {
    session_start();
}

# for localization
setlocale(LC_TIME, 'et_EE.UTF-8');
date_default_timezone_set('Europe/Tallinn');

# for seeing errors
ini_set('display_errors', 1);

if (defined('E_DEPRECATED')) {
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
} else {
    error_reporting(E_ALL & ~E_STRICT);
}

# header
header('Content-type: text/html; charset=utf-8');
echo '<pre>';
$array = array(2, 5, 6, 7);
var_dump($array[2]);

$kristen = array(
    'age' => 20,
    'sex' => 'male',
    'phoneNumber' => array(
        '112',
        '110',
    )
);

echo '<br/>';
var_dump($kristen["phoneNumber"][0]);


$poem = array(
    'You' => array(
        'word' => 'You',
        'numberOfWords' => 3,
    ),
    'Me' => array(
        'word' => 'Me',
        'numberOfWords' =>13,
    ),
    'Place' => array(
        'word' => 'Place',
        'numberOfWords' =>10,
    ),
    'That' => array(
        'word' => 'That',
        'numberOfWords' =>7,
    ),
    'Take' => array(
        'word' => 'Take',
        'numberOfWords' =>2,
    ),
    'One' => array(
        'word' => 'One',
        'numberOfWords' =>2,
    ),
    'Green' => array(
        'word' => 'Green',
        'numberOfWords' =>1,
    )
);
echo '<br/>';
var_dump($poem['Place']['numberOfWords']);

$firstArray = array(2, 4, 5, 8, 10);
$secondArray = array(3, 5, 7, 9, 11);
$thirdArray = array(
    ($firstArray[0] + $secondArray[0]),
    ($firstArray[1] + $secondArray[1]),
    ($firstArray[2] + $secondArray[2]),
    ($firstArray[3] + $secondArray[3]),
    ($firstArray[4] + $secondArray[4]),
);

var_dump ($thirdArray);
print_r($thirdArray);
echo '<br/>';
var_dump($firstArray[0] + $secondArray[0]);
echo '<br/>';
var_dump($firstArray[1] + $secondArray[1]);
echo '<br/>';
var_dump($firstArray[2] + $secondArray[2]);
echo '<br/>';
var_dump($firstArray[3] + $secondArray[3]);
echo '<br/>';
var_dump($firstArray[4] + $secondArray[4]);

foreach ($poem as $blabla=> $vaartus) {
    echo '<br/>'.$vaartus["word"]; 
}