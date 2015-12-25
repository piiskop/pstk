<?php
$humans = array (
		'humans' => array (
				array (
						'name' => 'Aadam',
						'birthday' => '1945-06-12T06:00:00',
						'sex' => 'M',
						'blood-type' => 'A+',
						'weight' => 99,
						'height' => 187,
						'address' => array (
								'street_address' => 'Majaka 2',
								'city' => 'Pärnu',
								'state' => 'Pärnumaa' 
						) 
				)
				,
				array (
						'name' => 'Eeva',
						'birthday' => '1954-01-22T22:03:05',
						'sex' => 'N',
						'blood-type' => 'B−',
						'weight' => '58',
						'height' => '176' 
				) 
		) 
);
if(isset($_POST['target'])){
	$humans['humans'][0]['name'] = $_POST['name'];
}
header ( 'Content-type: application/json' );
echo json_encode ( $humans, JSON_FORCE_OBJECT );

?>