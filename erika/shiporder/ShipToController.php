<?php
namespace shiporder;

require_once dirname(__FILE__) . '/e_settings.php'; //tee selle failini, mille sulgudesse anname, FILE absoluutne tee juurkataloogist
//et oskaks info item.php-st välja lugeda, mis on itemid:

/**
 * This class controls shippings
 *
 * @author erika
 * @namespace shiporder
 */
class ShipToController {
	
	/**
	 * This function does anything we want.
	 * Sometimes we want it to build something. Then, the result will be
	 * returned.
	 *
	 * @access public
	 * @return string
	 * @uses \shiporder\ShipTo for shipping list
	 * @uses \shiporder\ShipToView for the visual part of the list
	 */
	public static function start() {
		require_once dirname(__FILE__) . '/ShipTo.php';
		$shipTos = \shiporder\ShipTo::getListOfTypeShipTo(array ());
		require_once dirname(__FILE__) . '/ShipToView.php';
		$shipToView = \shiporder\ShipToView::buildListOfShipTos(array (
				'shipTos' => $shipTos));
		echo $shipToView;
	}
}
\shiporder\ShipToController::start();