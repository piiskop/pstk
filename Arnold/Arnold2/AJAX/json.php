<?php

$pupils = [
		(object) [
				'name' => 'Arnold',
				'lastName' => 'Tserepov',
				'sugu' => 'M'
		],
		(object) [
				'name' => 'Arni',
				'lastName'=> 'Tserepov',
				'sugu' => 'M'
		],
];


$pupilsJSON = json_encode($pupils);

header('Content-Type: application/json');
echo $pupilsJSON;