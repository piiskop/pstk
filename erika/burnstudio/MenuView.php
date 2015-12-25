<?php
/**
 * This class deals with the visual part of menu elements.
 * @namespace burnstudio
 */
namespace burnstudio;
/**
 * This function creates a HTML-block for a menu item.
 *
 * @access public
 * @param MenuElement $parameters['menuElement']
 *        	the menu element
 */
class MenuView {
	public static function buildMenuView($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT ( "./html" );
		$tpl->loadTemplatefile ( 'burnstudio-copy.html' );
		
		$tpl->setCurrentBlock ( 'menu-item' );
		$tpl->setVariable ( array (
				'HREF' => $parameters [0] ['object']->getHref(),
				'LABEL' => $parameters [0] ['object']->getLabel() 
		) );
		$tpl->parse ( 'menu-item' );
		
		return $tpl->get ( 'menu-item' );
	}
}
