<?php
namespace shiporder;

require_once dirname(__FILE__) . '/../../Muu/settings.php';

/**
 * Class that controls items
 * @author Raiko
 * @namespace shiporder
 */
class ItemController{
	public static function start() {
		require_once dirname(__FILE__)  . '/Item.php';
		$Items = \shiporder\Item::getListOfTypeItem(array());
		require_once dirname(__FILE__) . '/ItemView.php';
		$ItemView = \shiporder\ItemView::buildListOfItems(array(
				'Items' => $Items
		));		
		
		echo $ItemView;
	}
}
ItemController::start();