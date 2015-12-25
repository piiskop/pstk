<?php
namespace psdtohtml;
require_once dirname(__FILE__) . '/settings.php';

/**
 * This class controls everything.
 * 
 * @author rasmus
 * @namespace psdtohtml
 */
class Controller
{

	/**
	 * This function is the stn.
	 *
	 * @access public
	 * @uses MENU_COMMON for the common menu
	 * @uses MENU_OUTER for the menu of outer links
	 * @uses MENU_INNERfor the menu of inner links
	 * @uses View for the visual part
	 */
	public static function start()
	{
		require_once dirname(__FILE__) . '/MenuElement.php';
		require_once dirname(__FILE__) . '/Service.php';
		$services = \psdtohtml\Service::getListOfTypeService(
			array(
				'forAutocompletion' => false
			));
		// echo ' 41: <pre>';var_dump($services); echo '</pre>';
		$blockOfServices = '';
		foreach ($services as $idService => $service) {
			require_once dirname(__FILE__) . '/ServiceView.php';
			$blockOfServices .= \psdtohtml\ServiceView::buildService(
				array(
					'service' => $service['object']
				));
		}
		$logos = '';
		require_once dirname(__FILE__) . '/Logo.php';
		$arrayOfLogos = \psdtohtml\Logo::getListOfTypeLogo(
			array(
				'forAutocompletion' => false
			));
		foreach ($arrayOfLogos as $idLogo => $arrayOfLogo) {
			require_once dirname(__FILE__) . '/LogoView.php';
			$logos .= \psdtohtml\LogoView::buildLogo(
				array(
					'logo' => $arrayOfLogo['object']
				));
		}
		require_once dirname(__FILE__) . '/Human.php';
		$designer = new \psdtohtml\Human();
		$designer->setId(ID_OF_DESIGNER);
		$designer->setCompleteHuman();
		require_once dirname(__FILE__) . '/Model.php';
		\psdtohtml\Model::setComplete();
		require_once dirname(__FILE__) . '/MenuView.php';
		require_once dirname(__FILE__) . '/View.php';
		// echo ' 69: <pre>';var_dump($commonMenu); echo '</pre>';
		echo \psdtohtml\View::buildView(
			array(
				'address' => Model::getAddress(),
				'blogDate' => Model::getBlogDate(),
				'blogEntry' => Model::getBlogEntry(),
				'designer' => $designer,
				'logos' => $logos,
				'menus' => array(
					MENU_COMMON => MenuView::buildMenu(
						array(
							'type' => MENU_COMMON
						)),
					MENU_OUTER => MenuView::buildMenu(
						array(
							'type' => MENU_OUTER
						)),
					MENU_INNER => MenuView::buildMenu(
						array(
							'type' => MENU_INNER
						))
				),
				'phoneNumber' => Model::getPhoneNumber(),
				'services' => $blockOfServices,
				'title' => Model::getTitle(),
				'twitter' => Model::getTwitter()
			));
	}
}
\psdtohtml\Controller::start();