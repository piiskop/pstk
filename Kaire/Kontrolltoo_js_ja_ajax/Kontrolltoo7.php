<?php
/**
 * This code echoes an array of pupils in JSON format
 * @author kaire<kaire.ojastu@gmail.com>
 */
$pupils = array (
		array (
				'firstName' => "kaire",
				'lastName' => "ojastu" 
		),
		array (
				'firstName' => "raiko",
				'lastName' => "ojaste" 
		),
		array (
				'firstName' => "eleri",
				'lastName' => "apolson" 
		),
		array (
				'firstName' => "sander",
				'lastName' => "mets" 
		),
		array (
				'firstName' => "maarika",
				'lastName' => "erika" 
		),
		array (
				'firstName' => "kristen",
				'lastName' => "aeg" 
		),
		array (
				'firstName' => "keijo",
				'lastName' => "palts" 
		),
		array (
				'firstName' => "ingmar",
				'lastName' => "nurmiste" 
		),
		array (
				'firstName' => "ženja",
				'lastName' => "fokin" 
		) 
);

echo json_encode($pupils,JSON_FORCE_OBJECT);