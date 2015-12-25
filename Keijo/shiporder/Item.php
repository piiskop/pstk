<?php
class Item {
	private $idItem;
	private $amount;
	private $price;
	private $name;
	
	public function setIdItem($idItem) {
		$this -> idItem = $idItem;
	}
	
	public function setAmount($amount) {
		$this -> amount = $amount;
	}
	
	public function setPrice($price) {
		$this -> price = $price;
	}
	
	public function setName($name) {
		$this -> name = $name;
	}
		
	public function getAmount() {
		return $this -> amount;
	}
	
	public function getPrice() {
		return $this -> price;
	}
	
	public function getName() {
		return $this -> name;
	}

	private static $rawItem = array (
			
			1 => array (
					'idItem' => 1,
					'amount' => 1,
					'price' => '1.00€',
					'name' => 'Toode 1'
			),
			2 => array (
					'idItem' => 2,
					'amount' => 2,
					'price' => '2.00€',
					'name'	=> 'Toode 2'				
			),
			3 => array (
					'idItem' => 3,
					'amount' => 3,
					'price' => '3.00€',
					'name' => 'Toode 3'	
			)
	);
	
	public static function getListOfTypeItem($parameters)
	{
		$structuredKeys = array ();
	
		foreach (Item::$rawItem as $idItem => $item)
		{
			$object = new Item();
			$object->idItem = $idItem;
			$object->setCompleteItem();
			$keys[] = $idItem;
			$title = sprintf(
					'%1$s %2$s',
					$item['name'] // 1
			);
	
			$structuredKeys[$idItem] = array (
					'id'     => $idItem,
					'object' => $object,
					'title'  => $title,
			);
	
			$values[] = $title;
		}
	
		if (isset($parameters['forAutocompletion']))
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
	
	public function insert() {
		Item::$rawItem[] = array (
				'idItem' => count(Item::$rawItem),
				'amount' => $this->amount,
				'price' => $this->price,
				'name' => $this->name
		);
	}
	
	public function update() {
		Item::$rawItem[] = array (
				'idItem' => count(Item::$rawItem),
				'amount' => $this->amount,
				'price' => $this->price,
				'name' => $this->name
		);
	}
	
	public function delete() {
		unset(Item::$rawItem[$this->idItem]);
	}
}