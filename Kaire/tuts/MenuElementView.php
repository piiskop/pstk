<?php
namespace tuts;

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
	 * @uses MENU_COMMON for the common menu
	 * @uses MENU_OUTER for the menu of outer links
	 * @uses MENU_INNER for the menu of inner links
	 */
	public static function buildMenuElement($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('from-design-to-web-template.html');
		switch ($parameters['type']) {
			case MENU_COMMON:
				$tpl->setCurrentBlock('menu-item');
				$tpl->setVariable(
					array(
						'HREF' => (null === $parameters['menuElement']->getHref()) ? $parameters['menuElement']->translate(
							array(
								'property' => 'href',
								'isSlug' => true
							)) : $parameters['menuElement']->getHref(),
						'LABEL' => $parameters['menuElement']->translate(
							array(
								'property' => 'label'
							))
					));
				$tpl->parse('menu-item');
				// echo ' 38: ', $tpl->get('menu-item');
				return $tpl->get('menu-item');
				break;
			case MENU_OUTER:
				$tpl->setCurrentBlock('outer-link');
				$tpl->setVariable(
					array(
						'HREF-OF-OUTER-LINK' => (null ===
							 $parameters['menuElement']->getHref()) ? $parameters['menuElement']->translate(
								array(
									'property' => 'href',
									'isSlug' => true
								)) : $parameters['menuElement']->getHref(),
							'LABEL-OF-OUTER-LINK' => $parameters['menuElement']->translate(
								array(
									'property' => 'label'
								))
					));
				$tpl->parse('outer-link');
				return $tpl->get('outer-link');
				break;
			case MENU_INNER:
				$parameters['menuElement']->setAttributes();
				if ($parameters['menuElement']->isActive()) {
					$tpl->touchBlock('current');
				}
				$tpl->setCurrentBlock('inner-link');
				$tpl->setVariable(
					array(
						'HREF-OF-INNER-LINK' => ('' ===
							 $parameters['menuElement']->getHref()) ? $parameters['menuElement']->translate(
								array(
									'property' => 'href',
									'isSlug' => true
								)) : $parameters['menuElement']->getHref(),
							'LABEL-OF-INNER-LINK' => $parameters['menuElement']->translate(
								array(
									'property' => 'label'
								))
					));
				$tpl->parse('inner-link');
				return $tpl->get('inner-link');
				break;
			default:
				exit("What type?");
		}
	}
}