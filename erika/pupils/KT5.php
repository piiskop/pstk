<?php
/**
 * @author erika säde <erika.s2de@gmail.com>
 * @var array of pupils
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
		),
		array ( //testing Kalmer, testing
				'firstName' => "testi",
				'lastName' => "mati"
		)
);

header('Content-type: application/json');
echo json_encode($pupils);


