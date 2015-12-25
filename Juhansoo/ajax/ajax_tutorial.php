<?php

$streets = [
	'jannseni' => [
		'latitude' => 58.39,
		'longitude' => 24.49
	],
	'suurJ' => [
		'latitude' => 58.39,
		'longitude' => 24.52
	]
];

$class = [
	'startYear' => 2002,
	'studentList' => [
			"Tõnis Talvik",
			"Marta Maasikas",
			"Liisa Liiv"
	],
	'teacherName' => "Alfred Aasa"
];

if (isset($_POST['latitude'])) {
	$streets['jannseni']['latitude'] = $_POST['latitude'];
}
	
echo json_encode($streets, JSON_FORCE_OBJECT);