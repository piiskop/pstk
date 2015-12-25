<?php
namespace burnstudio;

require_once dirname ( __FILE__ ) . '/b_settings.php';
/**
 * This class controlles everything
 * @namespace burnstudio;
 *
 */
class Controller{
	/**
	 * This function is the stn.
	 *
	 * @access public
	 * @uses View for the visual part
	 */
	public static function start(){
		
 		require_once dirname ( __FILE__ ) . '/MenuElement.php';

//to access class constants or static properties and methods, either from outside the class:
//ClassName::CONSTANT_VALUE
//ClassName::staticMethod()
//or within a class method to reference the same or a parent class using self and parent:	
//self::CONSTANT_VALUE
//self::staticMethod()
//parent::CONSTANT_VALUE
//parent::staticMethod()

 		$menuElements = \burnstudio\MenuElement::getListOfTypeMenuElement(array ('forAutocompletion' => false )); 
//$menuElements = get access to burnstudio folder MenuElement class, getListOfTypeMenuElement method(function)
		$menu = ''; //empty variable
		foreach ($menuElements as $idMenuElement => $menuElement){ //menuElemets are divided into ids and values behind id-s
			require_once dirname ( __FILE__ ) . '/MenuView.php'; 
//$menu = get access to burnstudio folder MenuView class, buildMenuView method(function)
			$menu =  $menu.\burnstudio\MenuView::buildMenuView(
					array(
							$menuElement
					));
		}
		
		require_once dirname(__FILE__) . '/Service.php';
		$services = \burnstudio\Service::getListOfTypeService(array('forAutocompletion' => false));
		$blockOfServices = '';
		foreach ($services as $idService => $service) {
			require_once dirname(__FILE__) . '/ServiceView.php';
			$blockOfServices .= \burnstudio\ServiceView::buildService(
				array(
					'service' => $service['object']
				));
// 			echo ' 41: <pre>';var_dump($blockOfServices); echo '</pre>';
		}
	
		require_once dirname ( __FILE__ ) . '/View.php';
		echo \burnstudio\View::buildView(array (
			'menu' => $menu,						//from if (isset($parameters['menu']))
			'services' => $blockOfServices,			//from if (isset($parameters['services'])) {
		));
	}
}

\burnstudio\Controller::start();