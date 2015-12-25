<?php

namespace shiporder;

/**
 * This class describes the visual part of target addresses.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace shiporder
 */
class ShipToView {
	/**
	 * This function builds the list of target addresses of an order person.
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @param mixed $parameters['targetAddresses']
	 *        	the list of target addresses according to the result of
	 *        	<code>getListOfType</code>...-method
	 * @return the parsed HTML-file
	 * @uses BEGINNING_OF_URL for linking
	 */
	public static function buildListOfTargetAddresses($parameters) {
		// require_once dirname(__FILE__) . '/../errors/ErrorView.php';
		// \PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, array (
		// new ErrorView(), 'raiseError'
		// ));
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('order-persons.html');
		foreach ( $parameters['targetAddresses'] as $idShipTo => $targetAddress ) {
			$tpl->setCurrentBlock('target-address-in-list');
			$tpl->setVariable(array (
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'ID-OF-TARGET-ADDRESS' => $idShipTo,
				'TITLE-OF-TARGET-ADDRESS' => $targetAddress['title'] 
			));
			$tpl->parse('target-address-in-list');
		}
		$tpl->parse('list-of-target-addresses');
		return $tpl->get('list-of-target-addresses');
	}
}