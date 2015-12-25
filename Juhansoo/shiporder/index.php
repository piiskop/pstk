<?php
namespace shiporder;

require_once dirname(__FILE__) . '/settings.php';

/**
 * This is the main controller.
 *
 * @author rasmus
 * @namespace shiporder
 */
class Controller {
	public static function start($parameters) {
		switch ($parameters['target']) {
			case 'buildTargetAddressesToOrderPerson' :
				require_once dirname(__FILE__) . '/orderperson/OrderPersonController.php';
				echo \shiporder\OrderPersonController::start(array (
					'id' => isset($_GET['idOrderPerson']) ? $_GET['idOrderPerson'] : 0,
					'target' => 'buildTargetAddressesToOrderPerson'
				));
				exit();
			case 'listOfItems' : {
				require_once dirname(__FILE__) . '/item/ItemController.php';
				$body = \shiporder\ItemController::start();
				$title = 'Tooted';
				break;
			}
			case 'listOfOrderPersons' : {
				require_once dirname(__FILE__) . '/orderperson/OrderPersonController.php';
				$body = \shiporder\OrderPersonController::start(array (
					'target' => 'listOfOrderPersons'
				));
				$title = 'Kliendid';
				break;
			}
			case 'selectOrderPerson': {
				require_once dirname(__FILE__) . '/orderperson/OrderPersonController.php';
				$body = \shiporder\OrderPersonController::start(array (
					'id' => isset($_GET['id']) ? $_GET['id'] : '',
					'target' => 'selectOrderPerson'
				));
				$title = 'Kliendid';
				break;
			}
			default : {
				exit('Mis juhtus?');
			}
		}
		require_once dirname(__FILE__) . '/View.php';
		echo View::buildView(array (
			'body' => $body,
			'title' => $title
		));
	}
}

\shiporder\Controller::start(array (
	'target' => isset($_GET['target']) ? $_GET['target'] : 'listOfOrderPersons' 
));