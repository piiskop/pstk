<?php
require_once dirname ( __FILE__ ) . "./Model.php";
class Pupil extends Model {
	private static $pupils = array (
			1 => array (
					"id" => 1,
					"firstName" => "kaire",
					"lastName" => "ojastu",
					"coder" => false 
			),
			2 => array (
					"id" => 2,
					"firstName" => "raiko",
					"lastName" => "ojaste",
					"coder" => false 
			),
			3 => array (
					"id" => 3,
					"firstName" => "eleri",
					"lastName" => "apsolon",
					"coder" => false 
			),
			4 => array (
					"id" => 4,
					"firstName" => "sander",
					"lastName" => "mets",
					"coder" => false 
			),
			5 => array (
					"id" => 5,
					"firstName" => "maarika",
					"lastName" => "eerika",
					"coder" => false 
			),
			6 => array (
					"id" => 6,
					"firstName" => "kristen",
					"lastName" => "aeg",
					"coder" => false 
			),
			7 => array (
					"id" => 7,
					"firstName" => "keijo",
					"lastName" => "palts",
					"coder" => false 
			),
			8 => array (
					"id" => 8,
					"firstName" => "ingmar",
					"lastName" => "nurmiste",
					"coder" => false 
			),
			9 => array (
					"id" => 9,
					"firstName" => "ženja",
					"lastName" => "fokin",
					"coder" => false 
			) 
	);
	public function binarySearch(){
		//sorts Pupil array
		uasort(Pupil::$pupils, function ($a, $b) {
			return $a ['lastName'] - $b ['lastName'];
		} );
		
	}
}
