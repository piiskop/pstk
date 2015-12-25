<?php
class ItemView {
public function buildListOfItems($parameters) {
	require_once 'HTML/Template/IT.php';
    $tpl = new \HTML_Template_IT(ROOT_FOLDER."html");
    $tpl->loadTemplatefile('items.html');
	foreach ( $parameters['items'] as $id => $item ) {
		$tpl->setCurrentBlock('item');		
		$tpl->setVariable(array (
				'NAME' => $item['title']
		));
		$tpl->parse('item');
		
	}
	$tpl->setCurrentBlock('body');
	$tpl->setVariable(array (
			'TITLE' => 'Tooted'
	));
	$tpl->parse('body');
	return $tpl->get('body');

}
}
?>