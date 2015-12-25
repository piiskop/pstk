<?php

namespace shiporder;

/**
 * This class describes the visual part of ShipTo.
 */
class ShipToView {
	/**
	 * This function builds the list of shipping locations.
	 */
	public static function buildListOfShipTo($parameters) {
		require_once 'HTML/Template/IT.php';
		//$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl = new \HTML_Template_IT("../html");
		$tpl->loadTemplatefile('ShipTo.html');
		foreach ( $parameters['ShipTo'] as $idShipTo => $ShipTo ) {
			$tpl->setCurrentBlock('ship-to');
			$tpl->setVariable(array ('NAME' => $ShipTo['title']));
			$tpl->parse('ship-to');
		}
		$tpl->setCurrentBlock('html');
		$tpl->setVariable(array (
				'TITLE' => 'Sihtkoht'
		));
		$tpl->parse('html');
		return $tpl->get('html');
	}
}