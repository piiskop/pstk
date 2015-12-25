<?php

$pupils = [
    (object) [
        'name' => 'Eleri',
        'sugu' => 'N',
    ],
    (object) [
        'name' => 'Eleri',
        'sugu' => 'N',
    ],
];


$pupilsJSON = json_encode($pupils);

header('Content-Type: application/json');
echo $pupilsJSON;