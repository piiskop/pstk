<?php
echo ' 2: <pre>';var_dump($_POST); echo '</pre>';
$pupils = array (
		array (
				'firstName' => "kaire",
				
		),
		array (
				'firstName' => "raiko",
			
		),
		array (
				'firstName' => "eleri",
			
		),
		array (
				'firstName' => "sander",
			
		),
		array (
				'firstName' => "erika",
			
		),
		array (
				'firstName' => "kristen",
				
		),
		array (
				'firstName' => "ralf",
			
		),
		array (
				'firstName' => "ženja",
				
		)
);
echo json_encode ( $pupils, JSON_FORCE_OBJECT );
