<?php
//echo ("PHP Working");

$arr = array (
		array (
				"startYear" => 2002,
				"studentList" => array (
						"Tõnis Talvik",
						"Marta Maasikas",
						"Liisa Liiv" 
				),
				"teacherName" => "Alfred Aasa" 
		),
		array (
				"startYear" => 1992,
				"studentList" => array (
						"Juhan Jõks",
						"Edgar Elevi",
						"Toomas Tuulik" 
				),
				"teacherName" => "Vadim Vostok" 
		),
		array (
				"startYear" => 1990,
				"studentList" => array (
						"Peeter Paslik",
						"Sanja Soosik",
						"Oskar Kett" 
				),
				"teacherName" => "Olev Oskur" 
		) 
);

echo json_encode($arr,JSON_FORCE_OBJECT);