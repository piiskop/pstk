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
	 * @uses MENU_COMMON for the common menu
	 * @uses MENU_OUTER for the menu of outer links
	 * @uses MENU_INNERfor the menu of inner links
	 * @uses View for the visual part
	 */
	public static function start()
	{
		require_once dirname(__FILE__) . '/MenuElement.php';
		require_once dirname(__FILE__) . '/Service.php';
		$services = \tuts\Service::getListOfTypeService(
			array(
				'forAutocompletion' => false
			));
		// echo ' 41: <pre>';var_dump($services); echo '</pre>';
		$blockOfServices = '';
		foreach ($services as $idService => $service) {
			require_once dirname(__FILE__) . '/ServiceView.php';
			$blockOfServices .= \tuts\ServiceView::buildService(
				array(
					'service' => $service['object']
				));
		}
		$logos = '';
		require_once dirname(__FILE__) . '/Logo.php';
		$arrayOfLogos = \tuts\Logo::getListOfTypeLogo(
			array(
				'forAutocompletion' => false
			));
		foreach ($arrayOfLogos as $idLogo => $arrayOfLogo) {
			require_once dirname(__FILE__) . '/LogoView.php';
			$logos .= \tuts\LogoView::buildLogo(
				array(
					'logo' => $arrayOfLogo['object']
				));
		}
		require_once dirname(__FILE__) . '/Human.php';
		$designer = new \tuts\Human();
		$designer->setId(ID_OF_DESIGNER);
		$designer->setCompleteHuman();
		require_once dirname(__FILE__) . '/Model.php';
		$model = new \tuts\Model;
		$model->setComplete();
		require_once dirname(__FILE__) . '/../php/MenuView.php';
		require_once dirname(__FILE__) . '/View.php';
		echo \tuts\View::buildView(
			array(
				'address' => $model->getAddress(),
				'blogDate' => $model->getBlogDate(),
				'blogEntry' => $model->getBlogEntry(),
				'designer' => $designer,
				'logos' => $logos,
				'menus' => array(
					MENU_COMMON => \pstk\MenuView::buildMenu(
						array(
							'type' => MENU_COMMON
						)),
					MENU_OUTER => \pstk\MenuView::buildMenu(
						array(
							'type' => MENU_OUTER
						)),
					MENU_INNER => \pstk\MenuView::buildMenu(
						array(
							'type' => MENU_INNER
						))
				),
				'phoneNumber' => $model->getPhoneNumber(),
				'services' => $blockOfServices,
				'title' => $model->translate(array (
					'property' => 'title'
				)),
				'twitter' => $model->getTwitter()
			));
	}
}
\tuts\Controller::start();