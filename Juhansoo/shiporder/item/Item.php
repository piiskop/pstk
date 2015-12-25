<?php
namespace shiporder;

/**
 * This class describes the items in sale.
 * 
 * @author Rasmus
 * @namespace shiporder
 */
class Item {
	/**
	 * @access private
	 * @var int $iditem id of item
	 */
	private $idItem;
	/**
	 * the setter for id of item
	 * 
	 * @access public
	 * @param ont $iditem id of item
	 */
	public function setIdItem($idItem) {
		$this->idItem = $idItem;
	}
	/**
	 * the getter for id of item
	 * 
	 * @access public
	 * @param ont $iditem id of item
	 */
	public function getIdItem() {
		return $this->idItem;
	}
	/**
	 * @access private
	 * @var float $items amount in repository
	 */
	private static $items = array ();
	/**
	 * This function inserts an item into the array of items.
	 *
	 * @access public
	 * @param float $items amount in repository
	 */
	public function insertItem($item) {
		$this->items[$item->idItem] = $items;
	}
	/**
	 * the getter for items
	 *
	 * @access public
	 * @param float $items amount in repository
	 */
	public static function getItems() {
		return $this->items;
	}
	/**
	 * @access private
	 * @var float $amount amount in repository
	 */
	private $amount;
	/**
	 * the setter for the amount
	 * 
	 * @access public
	 * @param float $amount amount in repository
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}
	/**
	 * the getter for the amount
	 * 
	 * @access public
	 * @param float $amount amount in repository
	 */
	public function getAmount() {
		return $this->amount;
	}
	/**
	 * @access private
	 * @var float $price item price
	 */
	private $price;
	/**
	 * the setter for item price
	 * 
	 * @access public
	 * @param float $price item price
	 */
	public function setPrice($price) {
		$this->price = $price;
	}
	/**
	 * the getter for item price
	 * 
	 * @access public
	 * @param float $price item price
	 */
	public function getPrice() {
		return $this->price;
	}
	/**
	 * @access private
	 * @var string $name item name
	 */
	private $name;
	/**
	 * the setter for item name
	 * 
	 * @access public
	 * @param string $name item name
	 */
	public function setName($name) {
		$this->name = $name;
	}
	/**
	 * the setter for item name
	 * 
	 * @access public
	 * @param string $name item name
	 */
	public function getName() {
		return $this->name;
	}
	/**
	 * @access private
	 * @var mixed[int] raw data of items
	 */
	private static $rawItems = array (
		1 => array (
			'idItem' => 1,
			'amount' => 3,
			'price' => 1000,
			'name' => 'iPhone'
		),
		2 => array (
			'idItem' => 2,
			'amount' => 2,
			'price' => 2000,
			'name' => 'Macbook'
		),
		3 => array (
			'idItem' => 3,
			'amount' => 1,
			'price' => 3000,
			'name' => 'iMac'
		)
	);
	
	public function __construct() {
		if (func_num_args() > 0) {
			$parameters = func_get_arg(0);
			$this->idItem = isset($parameters['idItem']) ? $parameters['idItem'] : null;
			$this->amount = isset($parameters['amount']) ? $parameters['amount'] : null;
			$this->price = isset($parameters['price']) ? $parameters['price'] : null;
			$this->name = isset($parameters['name']) ? $parameters['name'] : null;
		}
	}
	
	/**
	 * This function queries all the items and returns them in an autocomplete
	 * array if needed.
	 *
	 * @access public
	 * @param boolean $parameters['forAutocompletion'] Do we prepare the array
	 * 		for the autocompletion mechanism?
	 * @param integer $parameters['idOfParent']        the ID of the page the
	 * 		list of page news we want
	 * @return int[] <code>NULL</code>, if there are no items available or
	 * 		the query is erroneous or the array with keys
	 */
	public static function getListOfTypeItem($parameters) {
		$structuredKeys = array ();
	
		foreach (Item::$rawItems as $idItem => $item) {
			$object = new Item();
			$object->idItem = $idItem;
			$object->setCompleteItem();
			$keys[] = $idItem;
			$title = $object->name;
	
			$structuredKeys[$idItem] = array (
				'id' => $idItem,
				'object' => $object,
				'title' => $title,
			);
	
			$values[] = $title;
		}
	
		if (isset($parameters['forAutocompletion'])) {
			$a[] = $values;
			$a[] = $keys;
			return $a;
		}
		else {
			return $structuredKeys;
		}
	
	}
	
	/**
	 * This function sets the complete item.
	 *
	 * @access public
	 */
	public function setCompleteItem() {
		$rawItems = Item::$rawItems;
		if (isset($rawItems[$this->idItem]['name'])) {
			$this->name = ($rawItems[$this->idItem]['name']);
		};
		if (isset($rawItems[$this->idItem]['price'])) {
			$this->price = ($rawItems[$this->idItem]['price']);
		}
		if (isset($rawItems[$this->idItem]['amount'])) {
			$this->amount = ($rawItems[$this->idItem]['amount']);
		}
	}
	
	/**
	 * This function adds a new item to the system.
	 *
	 * @access public
	 */
	public function insert() {
		Item::$rawItems[] = array (
			'idItem' => count(Item::$rawItems),
			'amount' => $this->amount,
			'price' => $this->price,
			'name' => $this->name
		);
	}
	
	/**
	 * This function updates the item data.
	 *
	 * @access public
	 */
	public function update() {
		Item::$rawItems[$this->idItem]['name'] = $this->name;
		Item::$rawItems[$this->idItem]['price'] = $this->price;
		Item::$rawItems[$this->idItem]['amount'] = $this->amount;
	}
	
	/**
	 * This function deletes an item.
	 *
	 * @access public
	 */
	public function delete() {
		unset(Item::$rawItems[$this->idItem]);
	}
}