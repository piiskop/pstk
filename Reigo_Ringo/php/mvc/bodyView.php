<?php

require_once 'conf.php';

require_once 'C:/wamp/bin/php/php5.4.12/Template/IT.php';

function does_image_exist($location){
	if(file_exists($location['pilt'])){
		$where_picture = $location['pilt'];
	}
	else {
		$where_picture = 'thumbnail.jpg';	
	}
	return $where_picture;
}

$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
$tpl->loadTemplatefile('row.html');

require_once 'data.php';

foreach ($andmed as $item)
{	
	$tpl->setCurrentBlock('row');
	$tpl->setVariable(array (
			'NAME' => $item['nimetus'],
			'DESCRIPTION' => $item['kirjeldus'],
			'PILT' => does_image_exist($item)
			)
	);
	$tpl->parse('row');
}
$html .= $tpl->get('row');
