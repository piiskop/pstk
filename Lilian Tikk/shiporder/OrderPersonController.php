<?php 
//Controller

namespace shiporder;

require_once dirname(__FILE__) . '/e_settings.php'; 
/**
 * This class controls order persons.
 *
 * @namespace shiporder
 */
class OrderPersonController {
	/**
	 * This function builds common examples how to insert, update, delete and
	 * display the data of order persons.
	 *
	 * @access public
	 * @uses \shiporder\OrderPerson
	 */
	public static function buildRawExamples() {

		// Order persons
		require_once '/shiporder/OrderPerson.php';
		echo ' Initial data: <pre>';
		var_dump(\shiporder\OrderPerson::getListOfTypeOrderPerson(array ('forAutocompletion' => false)));
		echo '</pre>';
		
		// Inserting an order person
		$newOrderPerson = new \shiporder\OrderPerson();
		$newOrderPerson->setEmail('karin@mail.ee');
		$newOrderPerson->setFirstName('karin');
		$newOrderPerson->setLastName('mari');
		$newOrderPerson->insert();
		echo ' After insertion: <pre>';
		var_dump(\shiporder\OrderPerson::getListOfTypeOrderPerson(array ('forAutocompletion' => false)));
		echo '</pre>';
		
		// Querying full data of an order person
		$orderPerson = new \shiporder\OrderPerson();
		$orderPerson->setIdOrderPerson(3);
		$orderPerson->setCompleteOrderPerson();
		echo ' Order person #3: <pre>';
		var_dump($orderPerson);
		echo '</pre>';
		
		// Updating data of an order person
		$orderPerson->setAddress('Tartu');
		$orderPerson->update();
		echo ' After updating the order person #3: <pre>';
		var_dump(\shiporder\OrderPerson::getListOfTypeOrderPerson(array ('forAutocompletion' => false)));
		echo '</pre>';
		
		// Deleting the order person #2
		$orderPerson = new \shiporder\OrderPerson();
		$orderPerson->setIdOrderPerson(2);
		$orderPerson->delete();
		echo ' After deleting the order person #2: <pre>';
		var_dump(\shiporder\OrderPerson::getListOfTypeOrderPerson(array ('forAutocompletion' => false)));
		echo '</pre>';


	}
	/**
	 * This function does anything we want.
	 * Sometimes we want it to build something. Then, the result will be
	 * returned.
	 *
	 * @access public
	 * @return string
	 * @uses \shiporder\OrderPerson for order person list
	 * @uses \shiporder\OrderPersonView for the visual part of the list
	 */
	public static function start() {
		require_once dirname(__FILE__) . '/OrderPerson.php';
		$orderPersons = \shiporder\OrderPerson::getListOfTypeOrderPerson(array ());
		require_once dirname(__FILE__) . '/OrderPersonView.php';
		$orderPersonView = \shiporder\OrderPersonView::buildListOfOrderPersons(array (
				'orderPersons' => $orderPersons
		));
		echo $orderPersonView;
	}
}
\shiporder\OrderPersonController::start();













































