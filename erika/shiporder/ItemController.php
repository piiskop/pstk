<?php
namespace shiporder;//millises nimeruumis tegutseb

require_once dirname(__FILE__) . '/e_settings.php'; //tee selle failini, mille sulgudesse anname, FILE absoluutne tee juurkataloogist
//et oskaks info item.php-st välja lugeda, mis on itemid:

	/**
	 * This class controls everything about items
	 *
	 * @author erika
	 * @namespace shiporder
	 */
class ItemController {
	
	/**
	 * Starts processes with items
	 * @access public
	 * @return string
	 * @uses \shiporder\Item for items list
	 * @uses \shiporder\ItemView for the visual part of the list
	 */
	public static function start() {
		//get data
		require_once dirname(__FILE__) . '/Item.php';
		$items = \shiporder\Item::getListOfTypeItem(array ());
		//get view
		require_once dirname(__FILE__) . '/ItemView.php';
		$itemView = \shiporder\ItemView::buildListOfItems(array ('items' => $items));
		return $itemView;
	}
}
\shiporder\ItemController::start(); //käivitab start meetodi
