<?php

namespace shiporder;

/**
 * This is the common view class.
 */
class View {
	/**
	 * This function builds the main structure in HTML.
	 */
	public static function buildView($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('html.html');
		$tpl->setCurrentBlock('html');
		$tpl->setVariable(array (
			'BODY' => $parameters['body'],
			'TITLE' => $parameters['title'] 
		));
		$tpl->parse('html');
		return $tpl->get('html');
	}
}