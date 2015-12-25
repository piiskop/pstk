<?php
namespace tuts;

/**
 * This class deals whith the visual part of menus.
 * @namespace tuts
 */

class MenuView
{
	/**
	 * This function build a menu.
	 */
	
	public static function buildMenu($parameters)
	{
		
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_it ( ROOT_FOLDER . 'html' );
		$tpl->loadTemplatefile ( 'from-design-to-web-template.html' );
		
		require_once dirname (__FILE__) .  '/MenuElement.php';
		$menuElements = \tuts\MenuElement::getListOfTypeMenuElement(
			array(
					'forAutocompletion' => false,
					'type' => $parameters['type']
			));
		$menu = '';
		foreach ($menuElements as $idMenuElement => $menuElement){
			require_once dirname (__FILE__) .  '/MenuElementView.php';
			$menu .=\tuts\MenuElementView::buildMenuElement(
					array(
						'menuElement' => $menuElement['object'],
						'type' => $parameters['type']	
					));
		}
		return $menu;
	}
}