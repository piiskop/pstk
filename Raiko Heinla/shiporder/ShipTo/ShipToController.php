<?php
namespace shiporder;

require_once dirname(__FILE__) . '/../../Muu/settings.php';

/**
 * Class that controls items
 * @author Raiko
 * @namespace shiporder
 */
class ShipToController{
	public static function start() {
		require_once dirname(__FILE__)  . '/ShipTo.php';
		$ShipTo = \shiporder\ShipTo::getListOfTypeShipTo(array());
		require_once dirname(__FILE__) . '/ShipToView.php';
		$ShipToView = \shiporder\ShipToView::buildListOfShipTo(array(
				'ShipTo' => $ShipTo
		));

		echo $ShipToView;
	}
}
ShipToController::start();