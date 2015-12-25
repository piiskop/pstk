<?php

namespace shiporder;

/**
 * This class describes the visual part of Item.
 */
class ItemView {
	/**
	 * This function builds the list of items.
	 */
	public static function buildListOfItems($parameters) {
		require_once 'HTML/Template/IT.php';
		//$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl = new \HTML_Template_IT("../html");
		$tpl->loadTemplatefile('Item.html');
		foreach ( $parameters['Items'] as $idItem => $Item ) {
			$tpl->setCurrentBlock('item');
			$tpl->setVariable(array (
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'NAME' => $Item['title']
					
			));
			$tpl->parse('item');
		}
	
		$tpl->parse('html');
//		echo '27' . $tpl->get('body');
		
		return $tpl->get('html');
	}
}