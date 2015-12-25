<?php

namespace tuts;

require_once dirname ( __FILE__ ) . '/settings.php';

/**
 * This class controls everything.
 * 
 * @namespace tuts
 */
class Controller {
	
	/**
	 * This function is the stn.
	 * 
	 * @access public
	 */
	public static function start() {
		require_once dirname ( __FILE__ ) . '/MenuElement.php';
		require_once dirname ( __FILE__ ) . '/Service.php';
		$services = \tuts\Service::getListOfTypeService ( array (
				'forAutocompletion' => false 
		) );
		// echo ' 41: <pre>';var_dump($services); echo '</pre>';
		$blockOfServices = '';
		foreach ( $services as $idService => $service ) {
			require_once dirname ( __FILE__ ) . '/ServiceView.php';
			$blockOfServices .= \tuts\ServiceView::buildService ( array (
					'service' => $service ['object'] 
			) );
		}
		
		$logos = '';
		require_once dirname ( __FILE__ ) . '/Logo.php';
		$arrayOfLogos = \tuts\Logo::getListOfTypeLogo ( array (
				'forAutocompletion' => false 
		) );
		foreach ( $arrayOfLogos as $idLogo => $arrayOfLogo ) {
			require_once dirname ( __FILE__ ) . '/LogoView.php';
			$logos .= \tuts\LogoView::buildLogo ( array (
					'logo' => $arrayOfLogo ['object'] 
			) );
		}
		require_once dirname ( __FILE__ ) . '/Model.php';
		\tuts\Model::setComplete ();
		require_once dirname ( __FILE__ ) . '/MenuView.php';
		require_once dirname ( __FILE__ ) . '/View.php';
		echo \tuts\View::buildView ( array (
				'logos' => $logos,
				'services' => $blockOfServices,
				'menus' => array (
						MENU_COMMON => MenuView::buildMenu ( array (
								'type' => MENU_COMMON 
						) ),
						MENU_OUTER => MenuView::buildMenu ( array (
								'type' => MENU_OUTER 
						) ),
						MENU_INNER => MenuView::buildMenu ( array (
								'type' => MENU_INNER 
						) ) 
				) 
				///
		) );
	}
}
\tuts\Controller::start ();