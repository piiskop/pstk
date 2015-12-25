<?php
$content = array (
		'pupils' => array (
				'firstName' => array (
						'processedText' => array (
								"kaire",
								"raiko",
								"eleri",
								"sander",
								"marika",
								"kristen",
								"keijo",
								"ingmar",
								"ženja" 
						) 
				) 
		) ,

		'pupils' => array (
			'lastName' => array (
				'processedText' => array (
						"ojastu",
						"ojaste",
						"apsolon",
						"mets",
						"erika",
						"aeg",
						"palts",
						"nurmiste",
						"fokin"
						)
				)
		)
);
if (isset( $_POST ['pupils'])){
	$content ['firstName'] [0] ['ppils'] = $_POST ['pupils'];
}
if (isset( $_POST ['pupils'])){
	$content ['lastName'] [0] ['ppils'] = $_POST ['pupils'];

}header ( 'Content-type: application/json' );
echo json_encode ( $content, JSON_FORCE_OBJECT );