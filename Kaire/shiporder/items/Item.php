<?php
namespace shiporder;

/**
 * See klass kirjeldab müügi objekte.
 * 
 * @author kaire
 * @namespace shiporder
 */
class Item {
	/**
	 * 
	 * @access private
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
					'name' => 'Ãµun',
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
	 * @author kaire
	 * @var int the ID of the item
	 */
	private $idItem;
	/**
	 * the setter for the ID of the item
	 * 
	 * @access public
	 * @param int $idItem the ID of the item
	 */
	public function setIdItem($idItem) {
		$this->idItem = $idItem;
	}
	/**
	 * @access private
	 * @var float the amount in repository
	 */
	private $amount;
	/**
	 * the setter for the amount
	 * 
	 * @access public
	 * @param float $amount the amount in repository
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}
	/**
	 * the getter for the amount in repository
	 * 
	 * @return float
	 */
	public function getAmount() {
		return $this->amount;
	}
	/**
	 * @access private
	 * @var Item[int] the items
	 */
	private $items = array ();
	/**
	 * This function inserts an item into the array of items.
	 * 
	 * @access public
	 * @param Item the item
	 */
	public function insertItem($item) {
		$this->items[$item->idItem] = $item;
	}
	/**
	 * the getter for items
	 * 
	 * @acces public
	 * @return Item[int]
	 */
	public function getItems() {
		return $this->items;
	}
	/**
	 * 
	 * @var string the name
	 */
	private $name;
	/**
	 * the setter for the name
	 * 
	 * @param string $name the name
	 */
	public function setName($name) {
		$this->name = $name;
	}
	/**
	 * the getter for the name
	 * 
	 * @return float
	 */
	public function getName() {
		return $this->name;
	}
	/**
	 * @var float the price
	 */
	private $price;
	/**
	 * the setter for the price
	 * 
	 * @param float $price the price
	 */
	public function setPrice($price) {
		$this->price = $price;
	}
	/**
	 * the getter for the price
	 * 
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
	 * @author kaire
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