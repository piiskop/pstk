<?php 	
		require_once 'HTML/Template/IT.php';
		$tmplt = new \HTML_Template_IT(dirname(__FILE__) . '/../HTML');
		$tmplt->loadTemplatefile('body.html');
		

	if (isset($_GET ['id'])) {
		$getId = $_GET ['id'] - 1;
		$tmplt ->setCurrentBlock('firstView');
		$tmplt ->setVariable(array(
			'ID' =>$names[$getId]['ID'],
			'NAME' =>$names[$getId]['Name']		
		));
		$tmplt ->parse('firstView');
	} else {
		foreach ( $names as $data ) {
			$tmplt ->setCurrentBlock('secondView');
			if (!empty($data ['URL']) && file_exists($data['URL'])){
				$tmplt ->setVariable(array(
					'DETAILEDNAME' => $data ['Name'],
					'D' => $data ['ID'],
					'URL' => $data ['URL']				
				));}
			else {
				$tmplt ->setVariable(array(
						'DETAILEDNAME' => $data ['Name'],
						'D' => $data ['ID'],
						'URL' => '../CSS/nophoto.jpg'
						
			));}	
			$tmplt ->parse('secondView');
		}
	}
	$tmplt->parse('body');
	echo $tmplt->get('body');
	?>
