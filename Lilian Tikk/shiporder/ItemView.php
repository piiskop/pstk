<?php
namespace shiporder;

/**
 * This class describes the visual part of items
 * @namespace shiporder
 */
class ItemView {
	/**
	 * This function builds the list of items
	 *
	 * @access public
	 * @param mixed $parameters['items']
	 *        	the list of items according to the result of
	 *        	<code>getListOfType</code>...-method
	 * @return the parsed HTML-file
	 */
	public static function buildListOfItems($parameters) {
		
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT("./html");
		$tpl->loadTemplatefile('items.html');
		foreach ( $parameters['items'] as $idItem => $item ) {
			$tpl->setCurrentBlock('items');
			$tpl->setVariable(array ('NAME' => $item['title']));
			$tpl->setVariable(array ('AMOUNT' => $item['title2']));
			$tpl->setVariable(array ('PRICE' => $item['title3']));
			$tpl->parse('items');
		}
		$tpl->setCurrentBlock('html');
		$tpl->setVariable(array (
			'TITLE' => 'Tooted' 
		));
		$tpl->parse('html');
		return $tpl->get('html');
	}
}