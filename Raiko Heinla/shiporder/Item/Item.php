<?php

namespace shiporder;

class Item{

	public function setIdItem($idItem) {
		$this->idItem = $idItem;
	}
	private $amount;
	/**
	 * function to set amount of items bought
	 */
	public function setAmount($amount){
		$this->amount = $amount;
	}
	/**
	 * function to retrieve amount of items bought
	 *
	 * @var string $amount to the amount of items bought
	 */
	public function getAmount(){
		return $this->amount;
	}
	
	private $priece;
	/**
	 * function to set item priece
	 */
	public function setPriece($priece){
		$this->priece = $priece;
	}
	/**
	 * function to retrieve set priece of items
	 *
	 * @var string $priece to the priece of item
	 */
	public function getPrice(){
		return $this->price;
	}
	
	private $nameOfRecipient;
	/**
	 * function to set item name
	 */
	public function setName($name){
		$this->name = $name;
	}
	/**
	 * function to retrieve name of items
	 *
	 * @var string $name to the name of item
	 */
	public function getName(){
		return $this->name;
	}
	
	public function _construct(){
		if (func_num_args()>0){
			$parameters = func_get_arg(0);
			$this->idItem = isset($parameters['idItem']) ? $parameters['idItem'] : null;
			$this->amount = isset($parameters['amount']) ? $parameters['amount'] : null;
			$this->priece = isset($parameters['priece']) ? $parameters['priece'] : null;
			$this->name = isset($parameters['name']) ? $parameters['name'] : null;
		}
	}
	
	private static $rawItems = array(
			1=>	array(
					'idItem' => 1,
					'amount' => '10',
					'priece' => '5,00',
					'name' => 'laev',
		
			),
			2=>	array(
					'idItem' => 2,
					'amount' => '20',
					'priece' => '10,00',
					'name' => 'jalgratas',
		
			),
			3=>	array(
					'idItem' => 3,
					'amount' => '30',
					'priece' => '15,00',
					'name' => 'kinnas',
		
			),
	);
	
public static function getListOfTypeItem($parameters){
	
	$structuredKeys = array();
	
	foreach (Item::$rawItems as $idItem => $item)
		{
			$object = new Item();
			$object -> idItem = $idItem;
			$object -> setCompleteItem();
			$keys[] = $idItem;
			$title = sprintf(
				'%1$s, %2$s',
				$item['name'],
				$item['amount']	
					
			);
			$structuredKeys[$idItem] = array (
				'id' => $idItem,
				'object' => $object,
				'title' => $title,
			);
			
			$values[] = $title;
		}	
		
		if(isset($parameters['forAutocompletion']))
		{
			$a[] = $values;
			$a[] = $keys;
			return $a;
		}
		else
		{
			return $structuredKeys;
		}
	}
	
	/**
	 * 
	 */
	public  function setCompleteItem(){
		$rawItems = Item::$rawItems;
		if (isset($rawItems[$this->idItem]['amount'])){
			$this->setAmount($rawItems[$this->idItem]['amount']);	
		}
		if (isset($rawItems[$this->idItem]['priece'])){
			$this->setPriece($rawItems[$this->idItem]['priece']);
		}
		if (isset($rawItems[$this->idItem]['name'])){
			$this->setName($rawItems[$this->idItem]['name']);
		}
	}


//////////////////////////////////////
/////////////////////////////////////
////////////////////////////////////
/**
 * This function adds a new item.
 */
public function insert() {
	Item::$rawItems[] = array (
			'idItem' => count(Item::$rawItems),
			'amount' => $this->amount,
			'priece' => $this->priece,
			'name' => $this->name
	);
}
/**
 * This function updates the item data.
 */
public function update() {
	Item::$rawItems[$this->idItem]['amount'] = $this->amount;
	Item::$rawItems[$this->idItem]['priece'] = $this->priece;
	Item::$rawItems[$this->idItem]['name'] = $this->name;
}
/**
 * This function deletes anitem.
 */
public function delete() {
	unset(Item::$rawItems[$this->idItem]);
}
}