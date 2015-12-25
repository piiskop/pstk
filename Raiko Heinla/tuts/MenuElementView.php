<?php

namespace tuts;

/**
 * This class deals with the visual part of menu elements.
 * 
 * @namespace tuts
 */
class MenuElementView {
	
	/**
	 * This function creates a HTML-block for a menu item.
	 *
	 * @access public
	 * @param MenuElement $parameters['menuElement']
	 *        	the menu element
	 */
	public static function buildMenuElement($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT ( ROOT_FOLDER . 'html' );
		$tpl->loadTemplatefile ( 'from-design-to-web-template.html' );
		
		switch ($parameters ['type']) {
			case MENU_COMMON :
				
				$tpl->setCurrentBlock ( 'menu-item' );
				$tpl->setVariable ( array (
						'HREF' => $parameters ['menuElement']->getHref (),
						'LABEL' => $parameters ['menuElement']->getLabel () 
				) );
				$tpl->parse ( 'menu-item' );
				return $tpl->get ( 'menu-item' );
				break;
			// /
			case MENU_OUTER :
				$tpl->setCurrentBlock ('outer-link');
				$tpl->setVariable ( array (
						'HREF' => $parameters ['menuElement']->getHref (),
						'LABEL' => $parameters ['menuElement']->getLabel () 
				) );
				$tpl->parse ( 'outer-link' );
				return $tpl->get ( 'outer-link' );
				break;
			// /
			case MENU_INNER :
				$tpl->setCurrentBlock ( 'inner-link' );
				$tpl->setVariable ( array (
						'HREF' => $parameters ['menuElement']->getHref (),
						'LABEL' => $parameters ['menuElement']->getLabel () 
				));
				$tpl->parse ( 'inner-link' );
				return $tpl->get ( 'inner-link' );
				break;
			default :
				exit ( "What type?" );
		}
	}
}