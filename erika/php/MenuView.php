<?php
namespace pstk;

/**
 * This class deals with the visual part of menus.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace particle
 */
class MenuView
{

	/**
	 * This function builds a menu.
	 *
	 * @access public
	 * @author kalmer:piiskop<pandeero@gmail.com>
	 * @param int $parameters['type']
	 *        	the type of the menu
	 * @return string the menu
	 * @uses ROOT_FOLDER for getting the correct PHP-file
	 */
	public static function buildMenu($parameters)
	{
		require_once ROOT_FOLDER . '/MenuElement.php';
		$menuElements = MenuElement::getListOfTypeMenuElement(
			array(
				'forAutocompletion' => false,
				'type' => $parameters['type']
			));
		$menu = '';
		foreach ($menuElements as $idMenuElement => $menuElement) {
			require_once ROOT_FOLDER . '/MenuElementView.php';
			$menu .= MenuElementView::buildMenuElement(
				array(
					'menuElement' => $menuElement['object'],
					'type' => $parameters['type']
				));
		}
		return $menu;
	}
}