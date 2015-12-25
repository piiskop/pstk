<?php
$pupils = array (
		array (
				firstname => "kaire",
				lastname => "ojastu",
				progeb => "ei"
		),
		array (
				firstname => "raiko",
				lastname => "ojaste",
				progeb => "ei"
		),
		array (
				firstname => "eleri",
				lastname => "apolson",
				progeb => "ei"
		),
		array (
				firstname => "sander",
				lastname => "mets",
				progeb => "ei"
		),
		array (
				firstname => "maarika",
				lastname => "erika",
				progeb => "ei"
		),
		array (
				firstname => "kristen",
				lastname => "aeg",
				progeb => "jah"
		),
		array (
				firstname => "keijo",
				lastname => "palts",
				progeb => "ei"
		),
		array (
				firstname => "ingmar",
				lastname => "nurmiste",
				progeb => "ei"
		),
		array (
				firstname => "ženja",
				lastname => "fokin",
				progeb => "ei"
		) 
);

echo json_encode($pupils,JSON_FORCE_OBJECT);