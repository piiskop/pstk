<?php
namespace particle;

/**
 * This class deals with the visual part of menus.
 *
 * @author k
 * @namespace particle
 */
class MenuView
{

	/**
	 * This function builds a menu.
	 *
	 * @access public
	 * @author k
	 * @param int $parameters['type']
	 *        	the type of the menu
	 * @return string the menu
	 */
	public static function buildMenu($parameters)
	{
		require_once dirname(__FILE__) . '/MenuElement.php';
		$menuElements = \particle\MenuElement::getListOfTypeMenuElement(
			array(
				'forAutocompletion' => false,
				'type' => $parameters['type']
			));
		$menu = '';
		foreach ($menuElements as $idMenuElement => $menuElement) {
			require_once dirname(__FILE__) . '/MenuElementView.php';
			$menu .= \particle\MenuElementView::buildMenuElement(
				array(
					'menuElement' => $menuElement['object'],
					'type' => $parameters['type']
				));
		}
		return $menu;
	}
}