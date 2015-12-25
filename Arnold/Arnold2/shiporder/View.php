<?php

namespace shiporder;

/**
 * This is the common view class.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace shiporder
 */
class View {
	/**
	 * This function builds the main structure in HTML.
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @param string $parameters['body']
	 *        	the body
	 * @param string $parameters['title']
	 *        	the title
	 * @return string the parsed HTML-structure
	 * @uses BEGINNING_OF_URL for links
	 */
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