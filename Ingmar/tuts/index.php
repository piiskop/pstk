<?php
namespace tuts;
require_once dirname(__FILE__) . '/settings.php';

/**
 * This class controls everything.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace tuts
 */
class Controller
{

	/**
	 * This function is the stn.
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @uses View for the visual part
	 */
	public static function start()
	{
		require_once dirname(__FILE__) . '/MenuElement.php';
		$menuElements = \tuts\MenuElement::getListOfTypeMenuElement(
			array(
				'forAutocompletion' => false
			));
		$menu = '';
		foreach ($menuElements as $idMenuElement => $menuElement) {
			require_once dirname(__FILE__) . '/MenuElementView.php';
			$menu .= \tuts\MenuElementView::buildMenuElement(
				array(
					'menuElement' => $menuElement['object']
				));
		}
		require_once dirname(__FILE__) . '/Service.php';
		$services = \tuts\Service::getListOfTypeService(
			array(
				'forAutocompletion' => false
			));
// 		echo ' 41: <pre>';var_dump($services); echo '</pre>';
		$blockOfServices = '';
		foreach ($services as $idService => $service) {
			require_once dirname(__FILE__) . '/ServiceView.php';
			$blockOfServices .= \tuts\ServiceView::buildService(
				array(
					'service' => $service['object']
				));
		}
		require_once dirname(__FILE__) . '/View.php';
		echo \tuts\View::buildView(
			array(
				'menu' => $menu,
				'services' => $blockOfServices
			));
	}
}
\tuts\Controller::start();