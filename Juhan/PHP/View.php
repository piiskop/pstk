<?php


class View {

	
	public static function buildView($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('html.html');
		$tpl->setCurrentBlock('html');
		$tpl->setVariable(array (
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'BODY' => $parameters['body'],
				'TITLE' => $parameters['title']
		));
		$tpl->parse('html');
		return $tpl->get('html');
	}
}