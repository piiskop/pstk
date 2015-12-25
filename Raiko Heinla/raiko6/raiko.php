<?php
/**
 * raw data for pupils
 */
$pupils = array (
	1=>	array (
				
				"firstName" => "kaire",
				"lastName" => "ojastu",
				"canProgram" => false
		),
	2=>	array (
				
				"firstName" => "raiko",
				"lastName" => "ojaste",
				"canProgram" => false
		),
	3=>	array (
				
				"firstName" => "eleri",
				"lastName" => "apsolon",
				"canProgram" => false
		),
	4=>	array (
				
				"firstName" => "sander",
				"lastName" => "mets",
				"canProgram" => false
		),
	5=>	array (
				
				"firstName" => "maarika",
				"lastName" => "erika",
				"canProgram" => false
		),
	6=>	array (
				
				"firstName" => "kristen",
				"lastName" => "aeg",
				"canProgram" => false
		),
	7=>	array (
				
				"firstName" => "keijo",
				"lastName" => "palts",
				"canProgram" => false
		),
	8=>	array (
				
				"firstName" => "ingmar",
				"lastName" => "nurmiste",
				"canProgram" => false
		),
	9=>	array (
				
				"firstName" => "ženja",
				"lastName" => "fokin",
				"canProgram" => false
		) 
);

echo json_encode ( $pupils, JSON_FORCE_OBJECT );


//echo '<br/>' . "You entered " . $_POST ["insertName"];


