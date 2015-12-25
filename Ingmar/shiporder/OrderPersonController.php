<?php
// Controller

namespace shiporder;

require_once dirname ( __FILE__ ) . '/e_settings.php'; // tee selle failini, mille sulgudesse anname, FILE absoluutne tee juurkataloogist
                                                    // et oskaks info orderPerson.php-st välja lugeda, kes on OrderPerson:

/**
 * This class controls order persons
 *
 * @author 
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
		var_dump ( \shiporder\OrderPerson::getListOfTypeOrderPerson ( array (
				'forAutocompletion' => false 
		) ) );
		echo '</pre>';
		
		// Inserting an order person
		$newOrderPerson = new \shiporder\OrderPerson ();
		$newOrderPerson->setEmail ( 'lilian.tikk03@gmail.com' );
		$newOrderPerson->setFirstName ( 'lilian' );
		$newOrderPerson->setLastName ( 'tikk' );
		$newOrderPerson->insert ();
		echo ' After insertion: <pre>';
		var_dump ( \shiporder\OrderPerson::getListOfTypeOrderPerson ( array (
				'forAutocompletion' => false 
		) ) );
		echo '</pre>';
		
		// Querying full data of an order person
		$orderPerson = new \shiporder\OrderPerson ();
		$orderPerson->setIdOrderPerson ( 3 );
		$orderPerson->setCompleteOrderPerson ();
		echo ' Order person #3: <pre>';
		var_dump ( $orderPerson );
		echo '</pre>';
		
		// Updating data of an order person
		$orderPerson->setAddress ( 'Pärnu' );
		$orderPerson->update ();
		echo ' After updating the order person #3: <pre>';
		var_dump ( \shiporder\OrderPerson::getListOfTypeOrderPerson ( array (
				'forAutocompletion' => false 
		) ) );
		echo '</pre>';
		
		// Deleting the order person #2
		$orderPerson = new \shiporder\OrderPerson ();
		$orderPerson->setIdOrderPerson ( 2 );
		$orderPerson->delete ();
		echo ' After deleting the order person #2: <pre>';
		var_dump ( \shiporder\OrderPerson::getListOfTypeOrderPerson ( array (
				'forAutocompletion' => false 
		) ) );
		echo '</pre>';
		
		// // Items
		// require_once dirname(__FILE__) . '/Item.php';
		// $item = new \shiporder\Item();
		// $item->setIdItem(1);
		// $item->setName('õun');
		// $item->setPrice(1.0);
		// $item->setAmount(20.0);
		// $item->insertItem($item);
		// $item = new \shiporder\Item();
		// $item->setIdItem(2);
		// $item->setName('pirn');
		// $item->setPrice(2.0);
		// $item->setAmount(10.0);
		// $item->insertItem($item);
		// $items = $item->getItems();
		// var_dump($items);
	}
	/**
	 * This function does anything we want.
	 * Sometimes we want it to build something. Then, the result will be
	 * returned.
	 *
	 * @access public
	 * @return string
	 * @param
	 *        	int the ID of the object if present
	 * @param
	 *        	string
	 * @uses \shiporder\OrderPerson for order person list
	 * @uses \shiporder\OrderPersonView for the visual part of the list
	 */
	public static function start($parameters) {
		switch ($parameters['target']){
			case 'listOfOrderPersons':
				{
				require_once dirname ( __FILE__ ) . '/OrderPerson.php';
				$orderPersons = \shiporder\OrderPerson::getListOfTypeOrderPerson ( array () );
				require_once dirname ( __FILE__ ) . '/OrderPersonView.php';
				$orderPersonView = \shiporder\OrderPersonView::buildListOfOrderPersons ( array (
						'orderPersons' => $orderPersons
				) );
				return $orderPersonView;
				break;
				}
			case 'selectOrderPerson' :
				{
				require_once dirname(__FILE__) . '/OrderPerson.php';
				$orderPerson = new \shiporder\OrderPerson();
				$orderPerson->setIdOrderPerson($parameters['id']);
				$orderPerson->setCompleteOrderPerson();
				require_once dirname(__FILE__) . '/OrderPersonView.php';
				$orderPersonView = \shiporder\OrderPersonView::buildOrderPerson(array (
						'orderPerson' => $orderPerson
				));
				return $orderPersonView;
				break;
				}
			default:
				{
				return "Mida iganes";
				}
		}
		

	}
}
//\shiporder\OrderPersonController::start (array('target'=>'OnePersonView', 'id' => 2));













































// require_once 'shiporder/OrderPerson.php';
// require_once 'shiporder/Order.php';
// require_once 'ShipTo.php';
// require_once 'RowInOrder.php';
// require_once 'shiporder/Item.php';

// //Andmete sisestamine OrderPersoni kohta
// $orderPerson = new OrderPerson();
// $orderPerson->setEmail('s@s.com');
// $orderPerson->setFirstName('Siiri');
// $orderPerson->setLastName('Soo');
// $orderPerson->insert();
// //echo '<pre>';var_dump(OrderPerson::getListOfTypeOrderPerson(array ('forAutocompletion' => true))); echo '</pre>';

// $orderPerson->setFirstName('Keijo');
// $orderPerson2 = new OrderPerson();
// $orderPerson2->setFirstName('Rasmus');
// $orderPerson2->setLastName('Juhansoo');

// $orderPerson = new OrderPerson();
// $orderPerson->setIdOrderPerson(3);
// $orderPerson->setCompleteOrderPerson();
// //echo '<pre>';var_dump($orderPerson); echo '</pre>';

// $orderPerson = new OrderPerson();
// $orderPerson->setIdOrderPerson(2);
// $orderPerson->setAddress('Pärnu');
// $orderPerson->update();
// //echo '<pre>';var_dump(OrderPerson::getListOfTypeOrderPerson(array ('forAutocompletion' => false))); echo '</pre>';

// $orderPerson = new OrderPerson();
// $orderPerson->setIdOrderPerson(1);
// $orderPerson->delete();
// echo '<pre>';var_dump(OrderPerson::getListOfTypeOrderPerson(array ('forAutocompletion' => false))); echo '</pre>';

// //Andmete sisestamine Kauba kohta
// $item = new Item();
// $item->setName('Akutrell 123gdr');
// $item->setPrice('99.99€');
// $item->setAmount('15');


// //Andmete sisestamine Tellimuse kohta
// $order = new Order();
// $order->setField('akutrell');

// //Andmete sisestamine Tellimuse Koguse kohta
// $amount = new Amount();
// $amount->setAmount('3');

// //Andmete sisestamine Saatmise kohta
// $shipTo = new ShipTo();
// $shipTo->setNameOfRecipient('Erika Säde');
// $shipTo->setAddress('Metsa 1');
// $shipTo->setCity('Pärnu');
// $shipTo->setCountry('Estonia');




// //Väljaprintimine
// echo 'Eesnimi: ';
// echo $orderPerson->getFirstName();
// echo '</br>';
// echo '</br>';

// echo 'Eesnimi: ';
// echo $orderPerson2->getFirstName();
// echo '</br>';
// echo '</br>';
// echo 'Perekonnanimi: ';
// echo $orderPerson2->getLastName();
// echo '</br>';
// echo '</br>';

// echo 'Tellitav ese: ';
// echo $item->getName();
// echo '</br>';
// echo '</br>';

// echo 'Esemete hulk laos: ';
// echo $item->getAmount();
// echo '</br>';
// echo '</br>';

// echo 'Eseme hind (1tk): ';
// echo $item->getPrice();
// echo '</br>';
// echo '</br>';

// echo 'Tellimus: ';
// echo $order->getField();
// echo '</br>';
// echo '</br>';

// echo 'Tellitud eseme kogus: ';
// echo $amount->getAmount();
// echo '</br>';
// echo '</br>';

// echo 'Saadetise vastuvõtja nimi: ';
// echo $shipTo->getNameOfRecipient();
// echo '</br>';
// echo '</br>';

// echo 'Saadetise sihtkoht (aadress): ';
// echo $shipTo->getAddress();
// echo '</br>';
// echo '</br>';

// echo 'Saadetise sihtkoht (linn): ';
// echo $shipTo->getCity();
// echo '</br>';
// echo '</br>';

// echo 'Saadetise sihtkoht (riik): ';
// echo $shipTo->getCountry();
// echo '</br>';
// echo '</br>';
