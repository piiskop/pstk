<?php
require_once 'settings.php';
class Controller {
	public static function start($parameters) {
		switch ($parameters['target']) {
			case 'listOfItems' :
				{
					require_once dirname(__FILE__) . '/ItemController.php';
					$body = ItemController::start();
					$title = 'Tooted';
					break;
				}
			case 'listOfOrderPersons' :
				{
					require_once dirname(__FILE__) . '/OrderPersonController.php';
					$body = OrderPersonController::start(array (
							'target' => 'listOfOrderPersons'
					));
					$title = 'Kliendid';
					break;
				}
			case 'selectOrderPerson': {
				require_once dirname(__FILE__) . '/OrderPersonController.php';
				$body = OrderPersonController::start(array (
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

Controller::start(array (
		'target' => isset($_GET['target']) ? $_GET['target'] : ''
));