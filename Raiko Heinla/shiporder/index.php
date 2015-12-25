<?php

namespace shiporder;

require_once dirname(__FILE__) . '/../Muu/settings.php';
/**
 * Main controller
 * @namespace shiporder
 */
class Controller {
	public static function start($parameters) {
		switch ($parameters['target']){
			case 'buildTargetAddressesToOrderPerson' :
					require_once dirname(__FILE__) . '/OrderPerson/OrderPersonController.php';
					echo \shiporder\OrderPersonCOntroller::start(array(
						'id' => isset ($_GET['idOrderPerson']) ? $_GET['idOrderPerson'] : 0,
						'target' => 'buildTargetAddressesToOrderPerson'
					));
					exit();
					
			case 'listOfItems' :
				{
				require_once dirname(__FILE__) . '/Item/ItemController.php';
				$body = \shiporder\ItemController::start();
				$title = 'Tooted';
				break;
				}
			case 'listOfOrderPerson':
				{
				require_once dirname(__FILE__).  '/OrderPerson/OrderPersonController.php';
				$body = \shiporder\OrderPersonController::start(array(
					'target' => 'listOfOrderPerson'	
				));
				$title = 'Kliendid';
				break;
				}
					
			case 'selectOrderPerson' :
				{
				require_once dirname(__FILE__) . '/OrderPerson/OrderPersonController.php';
				$body = \shiporder\OrderPersonController::start(array (
					'id' => $_GET['id'],
					'target' => 'selectOrderPerson'
				));
				$title = 'Kliendid';
				break;
				}
			case 'listOfShipTo' :
				{
				require_once dirname(__FILE__) . '/ShipTo/ShipToController.php';
				$body = \shiporder\ShipToController::start();
				$title = 'Sihtkohad';
				break;
				}
			default :	
				{
					exit ('Mida teeme?');
				}
		}
		require_once dirname(__FILE__) . '/View.php';
		echo View::buildView(array(
			'body' => $body,
			'title' => $title
		));
		
	}
	
}
\shiporder\Controller::start(array(
		'target' => isset($_GET ['target']) ? $_GET['target']: ''
));