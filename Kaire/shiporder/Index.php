<?php
namespace shiporder;

require_once dirname(__FILE__) . '/Settings.php';

/**
 * See on kontroller.
 *
 * @author kaire
 * @namespace shiporder
 */
class Controller {
	public static function start($parameters) {
		switch ($parameters['target']) {
			case 'listOfItems' :
				{
					require_once dirname(__FILE__) . '/items/ItemController.php';
					$body = \shiporder\ItemController::start();
					$title = 'Tooted';
					break;
				}
			case 'listOfOrderPersons' :
				{
					require_once dirname(__FILE__) . '/order-persons/OrderPersonController.php';
					$body = \shiporder\OrderPersonController::start();
					$title = 'Kliendid';
					break;
				}
			case 'selectOrderPerson': {
					require_once dirname(__FILE__) . '/orderpersons/OrderPersonController.php';
					$body = \shiporder\OrderPersonController::start(array (
						'id' => $_GET['id'],
						'target' => 'selectOrderPerson'
					));
					$title = 'Kliendid';
				break;
			}
			default :
				{
					exit('Mida teeme?');
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
	'target' => isset($_GET['target']) ? $_GET['target'] : ''
));