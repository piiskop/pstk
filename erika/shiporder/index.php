<?php

namespace shiporder;
//http://localhost/pstk/erika/shiporder/?target=listOfItems
//http://localhost/pstk/erika/shiporder/?target=listOfOrderPersons
//http://localhost/pstk/erika/shiporder/?target=selectOrderPerson&id=1

require_once dirname ( __FILE__ ) . '/e_settings.php';
/**
 * THE MASTER controller
 *
 * @namespace shiporder;
 *           
 *           
 */
class Controller {
	public static function start($parameters) {
		switch ($parameters ['target']) {
			case 'listOfItems' :
				{
					require_once dirname ( __FILE__ ) . '/ItemController.php';
					$body = \shiporder\ItemController::start ();
					$title = 'Kaubad';
					break;
				}
			case 'listOfOrderPersons' :
				{
					require_once dirname ( __FILE__ ) . '/OrderPersonController.php';
					$body = \shiporder\OrderPersonController::start ( array (
							'target' => 'listOfOrderPersons' 
					) );
					$title = 'Kliendid';
					break;
				}
			case 'selectOrderPerson': {
					require_once dirname(__FILE__) . '/OrderPersonController.php';
					$body = \shiporder\OrderPersonController::start(array (
						'id' => $_GET['id'],
						'target' => 'selectOrderPerson'
					));
					$title = 'Kliendid';
				break;
			}
			default :
				{
					exit('Mida asja?');
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