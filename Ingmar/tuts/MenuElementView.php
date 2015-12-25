<?php
namespace tuts;

/**
 * This class deals with the visual part of menu elements.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace tuts
 */
class MenuElementView
{

	/**
	 * This function creates a HTML-block for a menu item.
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @param MenuElement $parameters['menuElement']
	 *        	the menu element
	 */
	public static function buildMenuElement ($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('from-design-to-web-template.html');
		$tpl->setCurrentBlock('menu-item');
		$tpl->setVariable(
				array(
					'HREF' => $parameters['menuElement']->getHref(),
					'LABEL' => $parameters['menuElement']->getLabel()
				));
		$tpl->parse('menu-item');
		return $tpl->get('menu-item');
	}
}