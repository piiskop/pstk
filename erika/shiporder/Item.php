<?php
namespace shiporder;

/**
 * This class describes items in sale.
 * 
 * @author erika
 * @namespace shiporder
 */
class Item {
	/**
	 * @access private
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
	
	public function __construct() { //refers to the actual class name, like Item, if you change Item, you don´t change code
		if (func_num_args() > 0) {
			$parameters = func_get_arg(0);
			$this->idItem = isset($parameters['idItem']) ? $parameters['idItem'] : null;
			$this->name = isset($parameters['name']) ? $parameters['name'] : null;
			$this->price = isset($parameters['price']) ? $parameters['price'] : null;
			$this->amount = isset($parameters['amount']) ? $parameters['amount'] : null;
		}
	}
	
	/**
	 *
	 * @access private
	 * @var mixed[int] the raw data of items
	 */
	private static $rawItems = array (
			1 => array (
					'idItem' => 1,
					'name' => 'Taldrik',
					'price' => '12.55',
					'amount' => '3'
			),
			2 => array (
					'idItem' => 2,
					'name' => 'Kauss',
					'price' => '13.55',
					'amount' => '5'
			),
			3 => array (
					'idItem' => 3,
					'name' => 'Tass',
					'price' => '9.55',
					'amount' => '4'
			)
	);
	
	/**
	 * This function queries all the items and returns them in an autocomplete
	 * array if needed.
	 *
	 * @access public
	 * @param boolean $parameters['forAutocompletion']
	 *        	Do we prepare the array for the autocompletion mechanism?
	 * @param integer $parameters['idOfParent']
	 *        	the ID of the page the
	 *        	list of page news we want
	 * @return int[] <code>NULL</code>, if there are no items available
	 *         or
	 *         the query is erroneous or the array with keys
	*/
	public static function getListOfTypeItem($parameters) {
		$structuredKeys = array ();
	
		foreach ( Item::$rawItems as $idItem => $item) {
			$object = new Item();
			$object->idItem = $idItem;
			$object->setCompleteItem();
			$keys[] = $idItem;
			
 			$title = $item['name'];
			$title2 = $item['amount'];
			$title3 = $item['price'];
			
			$structuredKeys[$idItem] = array (
					'id' => $idItem,
					'object' => $object,
					'title' => $title,
					'title2' => $title2,
					'title3' => $title3
			);
				
			$values[] = $title;
			$values2[] = $title2;
			$values3[] = $title3;
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
	 */
	public function setCompleteItem() {
		$rawItems = Item::$rawItems;
		if (isset($rawItems[$this->idItem]['name'])) {//isset->kas muutuja on olemas, kas masiivis rawItems on olemas koht 'name'
			$this->setName($rawItems[$this->idItem]['name']);
		}
		if (isset($rawItems[$this->idItem]['price'])) {
			$this->setPrice($rawItems[$this->idItem]['price']);
		}
		if (isset($rawItems[$this->idItem]['amount'])) {
			$this->setAmount($rawItems[$this->idItem]['amount']);
		}
	}
	
	/**
	 * This function adds new item to the system
	 *
	 * @access public
	 */
	public function insert() {
		Items::$rawItems[] = array (
				'idItem' => count(Item::$rawItems),
				'name' => $this->name,
				'price' => $this->price,
				'amount' => $this->amount
		);
	}
	
	/**
	 * This function updates the items data
	 *
	 * @access public
	 */
	public function update() {
		Item::$rawItems[$this->idItem]['name'] = $this->name;
		Item::$rawItems[$this->idItem]['price'] = $this->price;
		Item::$rawItems[$this->idItem]['amount'] = $this->amount;
	}
	
	/**
	 * This function deletes an item
	 *
	 * @access public
	 */
	public function delete() {
		unset(Item::$rawItems[$this->idItem]);
	}
}