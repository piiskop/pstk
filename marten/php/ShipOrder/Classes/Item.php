<?php
namespace shiporder;
class Item {
	private $amount;
	public function setAmount($amount) {
		$this->amount = $amount;
	}
	public function getAmount() {
		return $this->amount;
	}
	private $price;
	public function setPrice($price) {
		$this->price = $price;
	}
	public function getPrice() {
		return $this->price;
	}
	private $name;
	public function setName($name) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}
	private static $rawItems = array (
			1 => array (
					'idItem' => 1,
					'amount' => 25,
					'name' => 'pirn',
					'price' => 0.2
			),
			2 => array (
					'idItem' => 2,
					'amount' => 5,
					'name' => 'õun',
					'price' => 0.2
			),
			3 => array (
					'idItem' => 3,
					'amount' => 2,
					'name' => 'ploom',
					'price' => 0.1
			)
	);
	public function __construct() {
		if (func_num_args() > 0) {
			$parameters = func_get_arg(0);
			$this->amount = isset($parameters['amount']) ? $parameters['amount'] : null;
			$this->price = isset($parameters['price']) ? $parameters['price'] : null;
			$this->name = isset($parameters['name']) ? $parameters['name'] : null;
		}
	}
	public function loadRawElement ($index) {
		
		$this->amount = Item::$rawItems[$index]['amount'];
		$this->name = Item::$rawItems[$index]['name'];
		$this->price = Item::$rawItems[$index]['price'];
	}
	public function itemCount() {
		return count(Item::$rawItems);
	}
}
