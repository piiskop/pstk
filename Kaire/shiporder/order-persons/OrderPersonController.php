<?php
namespace shiporder;
require_once dirname(__FILE__) . '/../Settings.php';

/**
 * See klass juhib tellijat.
 *
 * @author kaire
 * @namespace shiporder
 */
class OrderPersonController {
	/**
	 * See funktsioon ehitab levinumad n�ited, kuidas sisestada, uuendada, kustutada
	 * ja kuvada tellijate andmeid.
	 *
	 * @access public
	 * @uses \shiporder\OrderPerson
	 */
	public static function buildRawExamples() {
		
		// Order persons
		require_once '/shiporder/OrderPerson.php';
		echo ' 8: Initial data: <pre>';
		var_dump(\shiporder\OrderPerson::getListOfTypeOrderPerson(array (
			'forAutocompletion' => false 
		)));
		echo '</pre>';
		// Inserting an order person
		$newOrderPerson = new \shiporder\OrderPerson();
		$newOrderPerson->setEmail('lilian.tikk03@gmail.com');
		$newOrderPerson->setFirstName('Lilian');
		$newOrderPerson->setLastName('Tikk');
		$newOrderPerson->insert();
		echo ' 10: After insertion: <pre>';
		var_dump(\shiporder\OrderPerson::getListOfTypeOrderPerson(array (
			'forAutocompletion' => false 
		)));
		echo '</pre>';
		// Querying full data of an order person
		$orderPerson = new \shiporder\OrderPerson();
		$orderPerson->setIdOrdePerson(3);
		$orderPerson->setCompleteOrderPerson();
		echo ' 20: Order person #3: <pre>';
		var_dump($orderPerson);
		echo '</pre>';
		// Updating data of an order person
		$orderPerson->setAddress('Pärnu, Pärnu');
		$orderPerson->update();
		echo ' 24: After updating the order person #3: <pre>';
		var_dump(\shiporder\OrderPerson::getListOfTypeOrderPerson(array (
			'forAutocompletion' => false 
		)));
		echo '</pre>';
		// Deleting the order person #2
		$orderPerson = new \shiporder\OrderPerson();
		$orderPerson->setIdOrdePerson(2);
		$orderPerson->delete();
		echo ' 43: After deleting the order person #2: <pre>';
		var_dump(\shiporder\OrderPerson::getListOfTypeOrderPerson(array (
			'forAutocompletion' => false 
		)));
		echo '</pre>';
		
		// Items
		require_once dirname(__FILE__) . '/Item.php';
		$item = new \shiporder\Item();
		$item->setIdItem(1);
		$item->setName('õun');
		$item->setPrice(1.0);
		$item->setAmount(20.0);
		$item->insertItem($item);
		$item = new \shiporder\Item();
		$item->setIdItem(2);
		$item->setName('pirn');
		$item->setPrice(2.0);
		$item->setAmount(10.0);
		$item->insertItem($item);
		$items = $item->getItems();
		var_dump($items);
	}
	/**
	 * This function does anything we want.
	 * Sometimes we want it to build something. Then, the result will be
	 * returned.
	 *
	 * @access public
	 * @param int|null $parameters['id']
	 *        	the ID of the object if present
	 * @param string $parameters['target']
	 *        	the target operation
	 * @return string the view
	 * @uses \shiporder\OrderPerson for order person list
	 * @uses \shiporder\OrderPersonView for the visual part of the list
	 */
	public static function start($parameters) {
		switch ($parameters['target']) {
			case 'listOfOrderPersons' :
				{
					require_once dirname(__FILE__) . '/OrderPerson.php';
					$orderPersons = \shiporder\OrderPerson::getListOfTypeOrderPerson(array ());
					require_once dirname(__FILE__) . '/OrderPersonView.php';
					$orderPersonView = \shiporder\OrderPersonView::buildListOfOrderPersons(array (
						'orderPersons' => $orderPersons 
					));
					return $orderPersonView;
					break;
				}
			case 'selectOrderPerson' :
				{
					require_once dirname(__FILE__) . '/OrderPerson.php';
					$orderPerson = new \shiporder\OrderPerson();
					$orderPerson->setIdOrdePerson($parameters['id']);
					$orderPerson->setCompleteOrderPerson();
					require_once dirname(__FILE__) . '/OrderPersonView.php';
					$orderPersonView = \shiporder\OrderPersonView::buildOrderPerson(array (
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
	