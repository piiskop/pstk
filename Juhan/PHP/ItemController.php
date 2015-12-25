<?php
require_once 'settings.php';

class ItemController{
	
	public static function start(){// get data
		require_once dirname(__FILE__) . '/Item.php';
		$items = Item::getListOfTypeItem(array ());

		// get view
		require_once dirname(__FILE__) . '/ItemView.php';
		$view = ItemView::buildListOfItems(array (
			'items' => $items
		));
		echo $view;
	}
	
	
}

ItemController::start();
?>