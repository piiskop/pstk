<?php
namespace shiporder;

/**
 * This class describes the visual part of shipping
 *
 * @author erika
 * @namespace shiporder
 */
class ShipToView {
	/**
	 * This function builds the list of shipping
	 *
	 * @access public
	 * @param mixed $parameters['shipTos']
	 *        	the list of shipping according to the result of
	 *        	<code>getListOfType</code>...-method
	 * @return the parsed HTML-file
	 */
	public static function buildListOfShipTos($parameters) {
		// require_once dirname(__FILE__) . '/../errors/ErrorView.php';
		// \PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, array (
		// new ErrorView(), 'raiseError'));
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT("./html");
		$tpl->loadTemplatefile('ship-tos.html');
		foreach ( $parameters['shipTos'] as $idShipTo=> $shipTo ) {
			$tpl->setCurrentBlock('ships-to');
			$tpl->setVariable(array ('NAME' => $shipTo['title']));
			$tpl->setVariable(array ('ADDRESS' => $shipTo['title2']));
			$tpl->parse('ships-to');
		}
		$tpl->setCurrentBlock('html');
		$tpl->setVariable(array (
			'TITLE' => 'Kauba saatmisinfo' 
		));
		$tpl->parse('html');
		return $tpl->get('html');
	}
}