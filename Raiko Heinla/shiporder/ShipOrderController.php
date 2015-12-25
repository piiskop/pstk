<?php
//pear.php.net ->documentation -> introducion
require_once '../Muu/settings.php';
require_once 'OrderPerson.php';
$orderPerson = new \shiporder\OrderPerson();
$orderPerson->setIdOrdePerson(1);
echo ' <pre>';var_dump(\shiporder\OrderPerson::getListOfTypeOrderPerson(array ('forAutocompletion' => true))); echo '</pre>';


require_once 'Item.php';

$item = new \shiporder\Item();
$item->setIdItem(1);
echo ' <pre>';var_dump(\shiporder\Item::getListOfTypeItem(array ('forAutocompletion' => true))); echo '</pre>';


require_once 'ShipTo.php';

$item = new \shiporder\ShipTo();
$item->setIdShipTo(1);
echo ' <pre>';var_dump(\shiporder\ShipTo::getListOfTypeShipTo(array ('forAutocompletion' => true))); echo '</pre>';




	
//Inserting an order person
$newOrderPerson = new \shiporder\OrderPerson();
$newOrderPerson->setEmail('lilian.tikk.03@gmail.com');
$newOrderPerson->setFirstName('lilian');
$newOrderPerson->setLastName('tikk');
$newOrderPerson->insert();
echo var_dump(\shiporder\OrderPerson::getListOfTypeOrderPerson(array(
	'forAutocompletion' => false	
)));

//Inserting new ShipTo location
$newShipTo = new \shiporder\ShipTo();
$newShipTo->setNameOfRecipient('Peeter');
$newShipTo->setCity('Tallinn');
$newShipTo->setCountry('Estonia');
$newShipTo->insert();
echo var_dump(\shiporder\ShipTo::getListOfTypeShipTo(array(
		'forAutocompletion' => false
)));

//Inserting a new item
$newShipTo = new \shiporder\Item();
$newShipTo->setAmount('50');
$newShipTo->setPriece('30');
$newShipTo->setName('Auto');
$newShipTo->insert();
echo var_dump(\shiporder\Item::getListOfTypeItem(array(
		'forAutocompletion' => false
)));

class OrderPersonController {
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
//\OrderPerson\OrderPersonController::start();
/*
 $orderPerson->setFirstName('keijo');

 $orderPerson2 = new \shiporder\OrderPerson();
 $orderPerson2->setFirstName('rasmus');
 $orderPerson2->setLastName('juhansoo');

 require_once 'RowInOrder.php';
 $rowInOrder = new \shiporder\RowInOrder();
 $rowInOrder->setAmount(10);

 require_once 'Order.php';
 $order = new \shiporder\Order();
 $order->setField('18');

 echo $orderPerson->getFirstName();
 echo '<br/>' . $orderPerson2->getFirstName();
 echo '<br/>' . $orderPerson2->getLastName();
 echo '<br/>' . $shipTo->getNameOfRecipient();
 echo '<br/>' . $shipTo->getCountry();
 echo '<br/>' . $item->getAmount();
 echo '<br/>' . $rowInOrder->getAmount();
 echo '<br/>' . $order->getField();
 */