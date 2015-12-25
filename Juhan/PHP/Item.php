<?php
class Item{
	private $amount, $price, $name,$id;
	public function __construct(){
		if (func_num_args()>0){
			$parameters = func_get_arg(0);
			$this->amount=isset($parameters['amount'])?$parameters['amount']:null;
			$this->price=isset($parameters['price'])?$parameters['price']:null;
			$this->name=isset($parameters['name'])?$parameters['name']:null;
			$this->id=isset($parameters['id'])?$parameters['id']:null;				
		}
	
	}
	
	public static $rawItems=array(
			1=>array('id'=>1,
					'amount'=>25,
					'name'=>'pirn',
					'price'=>0.2
			),
			2=>array(
					'id'=>2,
					'amount'=>2,
					'name'=>'õun',
					'price'=>0.2
			),
			3=>array('id'=>3,
					'amount'=>4,
					'name'=>'ploom',
					'price'=>0.1
			)
				
	);
	
	public static function getListOfTypeItem($parameters) {
		$structuredKeys = array ();
	
		foreach ( Item::$rawItems as $id => $item ) {
			$object = new Item();
			$object->id = $id;
			$object->setCompleteItem();
			$keys[] = $id;
			$title = sprintf('%1$s&#160', $item['name']);
	
			$structuredKeys[$id] = array (
					'id' => $id,
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
	
	
	public function setCompleteItem() {
		$rawOrderItems = Item::$rawItems;
		if (isset($rawOrderItems[$this->id]['name'])) {
			$this->setName($rawOrderItems[$this->id]['name']);
		}
		if (isset($rawOrderItems[$this->id]['amount'])) {
			$this->setAmount($rawOrderItems[$this->id]['amount']);
		}
		if (isset($rawOrderItems[$this->id]['price'])) {
			$this->setPrice($rawOrderItems[$this->id]['price']);
		}
	}
	
	public function getAmount(){
		return $this->amount;
	}
	public function setAmount($amount){
		$this->amount=$amount;
	}
	
	public function getPrice(){
		return $this->price;
	}
	
	public function setPrice($price){
		$this->price=$price;
	}
	
	public function getName(){
		return $this->name;
	}
	
	
	public function setName($name){
		$this->name=$name;
	}
	
	public function setId($id){
		$this->id=$id;
	}
	
	public function insertItem($item) {
		$this->items[$item->idItem] = $item;
	}
}
?>