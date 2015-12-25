<?php
namespace shiporder;

require_once dirname(__FILE__) . '/../settings.php';

/**
 * This class controls everything about items.
 * 
 * @author rasmus
 * @namespace shiporder
 */
class ItemController {

	/**
	 * This function starts the processes with items.
	 * 
	 * @access public
	 * @return string the parsed list of items
	 * @uses \shiporder\Item for data
	 * @uses \shiporder\ItemView for the visual part
	 */
	public static function start() {
		//get data
		require_once dirname(__FILE__) . '/Item.php';
		$item = \shiporder\Item::getListOfTypeItem(array ());
		
		//get view
		require_once dirname(__FILE__) . '/ItemView.php';
		$itemView = \shiporder\ItemView::buildListOfItems(array (
			'item' => $item
		));
		return $itemView;
	}
}
\shiporder\ItemController::start();