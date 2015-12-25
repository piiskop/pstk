<?php
namespace shiporder;

require_once dirname(__FILE__) . '/e_settings.php'; //tee selle failini, mille sulgudesse anname, FILE absoluutne tee juurkataloogist
//et oskaks info item.php-st välja lugeda, mis on itemid:

/**
 * This class controls items.
 * 
 * @namespace shiporder
 */
class ItemController {
	
	/**
	 * This function does anything we want.
	 * Sometimes we want it to build something. Then, the result will be
	 * returned.
	 *
	 * @access public
	 * @return string
	 * @uses \shiporder\Item for items list
	 * @uses \shiporder\ItemView for the visual part of the list
	 */
	public static function start() {
		require_once dirname(__FILE__) . '/Item.php';
		$items = \shiporder\Item::getListOfTypeItem(array ());
		require_once dirname(__FILE__) . '/ItemView.php';
		$itemView = \shiporder\ItemView::buildListOfItems(array (
				'items' => $items
		));
		echo $itemView;
	}
}
\shiporder\ItemController::start();
