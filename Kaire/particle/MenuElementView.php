<?php
namespace particle;

/**
 * This class deals with the visual part of menu elements.
 *
 * @author k
 * @namespace tuts
 */
class MenuElementView
{

	/**
	 * This function creates a HTML-block for a menu item.
	 *
	 * @access public
	 * @author k
	 * @param MenuElement $parameters['menuElement']
	 *        	the menu element
	 * @param string $parameters['type']
	 *        	the type
	 * @see MenuElement::$type
	 * @uses Error for error handling
	 * @uses ErrorView for error handling
	 * @uses MENU_COMMON for the common menu
	 * @uses MENU_SIDE for the menu in sidebar
	 */
	public static function buildMenuElement($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('particle-template.html');
		switch ($parameters['type']) {
			case MENU_COMMON:
				$tpl->setCurrentBlock('item-in-common-menu');
				$tpl->setVariable(
					array(
						'HREF-OF-ITEM-IN-COMMON-MENU' => (null ===
							 $parameters['menuElement']->getHref()) ? $parameters['menuElement']->translate(
								array(
									'property' => 'href',
									'isSlug' => true
								)) : $parameters['menuElement']->getHref(),
							'LABEL-OF-ITEM-IN-COMMON-MENU' => $parameters['menuElement']->translate(
								array(
									'property' => 'label'
								))
					));
				$tpl->parse('item-in-common-menu');
				// echo ' 38: ', $tpl->get('menu-item');
				return $tpl->get('item-in-common-menu');
				break;
			case MENU_SIDE:
				$tpl->setCurrentBlock('item-in-menu-in-sidebar');
				$tpl->setVariable(
					array(
						'HREF-OF-ITEM-IN-MENU-IN-SIDEBAR' => (null ===
							 $parameters['menuElement']->getHref()) ? $parameters['menuElement']->translate(
								array(
									'property' => 'href',
									'isSlug' => true
								)) : $parameters['menuElement']->getHref(),
							'LABEL-OF-ITEM-IN-MENU-IN-SIDEBAR' => $parameters['menuElement']->translate(
								array(
									'property' => 'label'
								))
					));
				$tpl->parse('item-in-menu-in-sidebar');
				return $tpl->get('item-in-menu-in-sidebar');
				break;
			default:
				require_once dirname(__FILE__) . '/Error.php';
				$error = new Error();
				$error->setMessage(\pstk\String::translate('errorWhichMenu'));
				require_once dirname(__FILE__) . '/ErrorView.php';
				ErrorView::raiseError($error);
		}
	}
}