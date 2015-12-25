<?php
require_once 'settings.php';

class OrderPersonController {

	public static function buildRawExamples() {
		
		// Order persons
		echo ' 8: Initial data: <pre>';
		var_dump(\OrderPerson::getListOfTypeOrderPerson(array (
			'forAutocompletion' => false 
		)));
		echo '</pre>';
		// Inserting an order person
		$newOrderPerson = new \OrderPerson();
		$newOrderPerson->setEmail('lilian.tikk03@gmail.com');
		$newOrderPerson->setFirstName('lilian');
		$newOrderPerson->setLastName('tikk');
		$newOrderPerson->insert();
		echo ' 10: After insertion: <pre>';
		var_dump(\OrderPerson::getListOfTypeOrderPerson(array (
			'forAutocompletion' => false 
		)));
		echo '</pre>';
		// Querying full data of an order person
		$orderPerson = new OrderPerson();
		$orderPerson->setId(3);
		$orderPerson->setCompleteOrderPerson();
		echo ' 20: Order person #3: <pre>';
		var_dump($orderPerson);
		echo '</pre>';
		// Updating data of an order person
		$orderPerson->setAddress('Pärnu, Pärnu');
		$orderPerson->update();
		echo ' 24: After updating the order person #3: <pre>';
		var_dump(\OrderPerson::getListOfTypeOrderPerson(array (
			'forAutocompletion' => false 
		)));
		echo '</pre>';
		// Deleting the order person #2
		$orderPerson = new \OrderPerson();
		$orderPerson->setId(2);
		$orderPerson->delete();
		echo ' 43: After deleting the order person #2: <pre>';
		var_dump(\OrderPerson::getListOfTypeOrderPerson(array (
			'forAutocompletion' => false 
		)));
		echo '</pre>';
		
		// Items
		require_once dirname(__FILE__) . '/Item.php';
		$item = new Item();
		$item->setId(1);
		$item->setName('õun');
		$item->setPrice(1.0);
		$item->setAmount(20.0);
		$item->insertItem($item);
		$item = new \shiporder\Item();
		$item->setId(2);
		$item->setName('pirn');
		$item->setPrice(2.0);
		$item->setAmount(10.0);
		$item->insertItem($item);
		$items = $item->getItems();
		var_dump($items);
	}
	public static function start($parameters) {
		switch ($parameters['target']) {
			case 'buildTargetAddressesToOrderPerson' :
				require_once dirname(__FILE__) . '/ShipTo.php';
				$targetAddresses = ShipTo::getListOfTypeShipTo(array (
						'idOfParent' => $parameters['id']
				));
				// echo ' 104: <pre>';var_dump($targetAddresses); echo '</pre>';
				require_once dirname(__FILE__) . '/ShipToView.php';
				$shipToView = ShipToView::buildListOfTargetAddresses(array (
						'idOfParent' => $parameters['id'],
						'targetAddresses' => $targetAddresses
				));
				$content = array (
						'targetAddresses' => $shipToView
				);
				return json_encode($content, JSON_FORCE_OBJECT);
				;
			case 'listOfOrderPersons' :
				{
					require_once dirname(__FILE__) . '/OrderPerson.php';
					$orderPersons = OrderPerson::getListOfTypeOrderPerson(array ());
					require_once dirname(__FILE__) . '/OrderPersonView.php';
					$orderPersonView = OrderPersonView::buildListOfOrderPersons(array (
							'orderPersons' => $orderPersons
					));
					return $orderPersonView;
					break;
				}
			case 'selectOrderPerson' :
				{
					require_once dirname(__FILE__) . '/OrderPerson.php';
					$orderPerson = new OrderPerson();
					$orderPerson->setId($parameters['id']);
					$orderPerson->setCompleteOrderPerson();
					require_once dirname(__FILE__) . '/OrderPersonView.php';
					$orderPersonView = OrderPersonView::buildOrderPerson(array (
							'orderPerson' => $orderPerson
					));
					return $orderPersonView;
					break;
				}
			default :
				{
					return 'Mida teeme klientide osas?';
				}
		}
	}
}
//OrderPersonController::start();
	

?>