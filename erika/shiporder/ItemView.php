<?php
namespace shiporder;

/**
 * This class describes the visual part of items
 *
 * @author erika
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
		// require_once dirname(__FILE__) . '/../errors/ErrorView.php';
		// \PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, array (
		// new ErrorView(), 'raiseError'));
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT("./html");//HTML_Template_IT on konstruktor, . juurnime ruum
		$tpl->loadTemplatefile('items.html'); //funktsioon loadTemplatefile
		foreach ( $parameters['items'] as $idItem => $item ) {//masiiv lammutatakse kahte tulpa, 
			//indeksiteks ja väärtusteks, idItemisse indeksid, itemisse väärtused
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
