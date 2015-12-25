<?php

namespace shiporder;

/**
 * This class describes items in sale.
 *
 * @author kalmer
 * @namespace shiporder
 */
class Item {
	
	/**
	 *
	 * @access private
	 * @author kalmer:piiskop
	 * @var mixed[int] the raw data of items
	 */
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
	
	/**
	 *
	 * @access private
	 * @author kalmer:piiskop
	 * @var int the ID of the item
	 */
	private $idItem;
	/**
	 * the setter for the ID of the item
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @param int $idItem
	 *        	the ID of the item
	 */
	public function setIdItem($idItem) {
		$this->idItem = $idItem;
	}
	/**
	 *
	 * @access private
	 * @author kalmer
	 * @var float the amount in repository
	 */
	private $amount;
	/**
	 * the setter for the amount
	 *
	 * @author kalmer:piiskop
	 * @param float $amount
	 *        	the amount in repository
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}
	/**
	 * the getter for the amount in repository
	 *
	 * @author kalmer:piiskop
	 * @return float
	 */
	public function getAmount() {
		return $this->amount;
	}
	/**
	 *
	 * @access private
	 * @author kalmer:piiskop
	 * @var Item[int] the items
	 */
	private $items = array ();
	/**
	 * This function inserts an item into the array of items.
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @param
	 *        	Item the item
	 */
	public function insertItem($item) {
		$this->items[$item->idItem] = $item;
	}
	/**
	 * the getter for items
	 *
	 * @acces public
	 *
	 * @author kalmer:piiskop
	 * @return Item[int]
	 */
	public function getItems() {
		return $this->items;
	}
	/**
	 *
	 * @author kalmer
	 * @var string the name
	 */
	private $name;
	/**
	 * the setter for the name
	 *
	 * @author kalmer:piiskop
	 * @param string $name
	 *        	the name
	 */
	public function setName($name) {
		$this->name = $name;
	}
	/**
	 * the getter for the name
	 *
	 * @author kalmer:piiskop
	 * @return float
	 */
	public function getName() {
		return $this->name;
	}
	/**
	 *
	 * @author kalmer
	 * @var float the price
	 */
	private $price;
	/**
	 * the setter for the price
	 *
	 * @author kalmer:piiskop
	 * @param float $price
	 *        	the price
	 */
	public function setPrice($price) {
		$this->price = $price;
	}
	/**
	 * the getter for the price
	 *
	 * @author kalmer:piiskop
	 * @return float
	 */
	public function getPrice() {
		return $this->price;
	}
	
	/**
	 * This function queries all the items and returns them in an
	 * autocomplete
	 * array if needed.
	 *
	 * @access public
	 * @author kalmer
	 * @param boolean $parameters['forAutocompletion']
	 *        	Do we prepare the array
	 *        	for the autocompletion mechanism?
	 * @param integer $parameters['idOfParent']
	 *        	the ID of the page the
	 *        	list of page news we want
	 * @return int[] <code>NULL</code>, if there are no order person available
	 *         or
	 *         the query is erroneous or the array with keys
	 */
	public static function getListOfTypeItem($parameters) {
		$structuredKeys = array ();
		
		foreach ( Item::$rawItems as $idItem => $item ) {
			$object = new Item();
			$object->idItem = $idItem;
			$object->setCompleteItem();
			$keys[] = $idItem;
			$title = $object->name;
			$structuredKeys[$idItem] = array (
				'id' => $idItem,
				'object' => $object,
				'title' => $title 
			);
			
			$values[] = $title;
		}
		
		if (isset($parameters['forAutocompletion']) && $parameters['forAutocompletion']) {
			$a[] = $values;
			$a[] = $keys;
			return $a;
		} else {
			return $structuredKeys;
		}
	}
	/**
	 * This function sets the complete item.
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 */
	public function setCompleteItem() {
		$rawItems = Item::$rawItems;
		if (isset($rawItems[$this->idItem]['amount'])) {
			$this->amount = ($rawItems[$this->idItem]['amount']);
		}
		if (isset($rawItems[$this->idItem]['name'])) {
			$this->name = ($rawItems[$this->idItem]['name']);
		}
		if (isset($rawItems[$this->idItem]['price'])) {
			$this->price = ($rawItems[$this->idItem]['price']);
		}
	}
}