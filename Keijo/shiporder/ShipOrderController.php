<?php
require_once dirname(__FILE__).'/settings.php';
require_once dirname(__FILE__).'/OrderPerson.php';
echo ' 8: Initial data: <pre>';
var_dump(\shiporder\OrderPerson::getListOfTypeOrderPerson(array (
		'forAutocompletion' => false)));
echo '</pre>';

$orderPerson = new \shiporder\OrderPerson();
$orderPerson->setIdOrdePerson(3);
$orderPerson->setCompleteOrderPerson();
echo ' 20: Order person #3: <pre>';
var_dump($orderPerson);
echo '</pre>';

require_once dirname(__FILE__).'/ShipTo.php';
require_once dirname(__FILE__).'/Item.php';
require_once dirname(__FILE__).'/Order.php';
require_once dirname(__FILE__).'/RowInOrder';
