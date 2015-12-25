<?php
class OrderPerson{
	private  $firstName, $lastName, $email, $address,$id;
public function __construct(){
	if (func_num_args()>0){
		$parameters = func_get_arg(0);
		$this->firstName=isset($parameters['firstName'])?$parameters['firstName']:null;
		$this->lastName=isset($parameters['lastName'])?$parameters['lastName']:null;
		$this->email=isset($parameters['email'])?$parameters['email']:null;
		$this->address=isset($parameters['address'])?$parameters['address']:null;
		$this->id=isset($parameters['id'])?$parameters['id']:null;
	}
	
}
public function setId($id) {
	$this->id = $id;
}

public function getId(){
	return $this->id;
}

public function getFirstName(){
	return $this->firstName;
}

public function setFirstName($firstName){
	$this->firstName=$firstName;
}

public function setLastName($lastName){
	$this->lastName=$lastName;
}

public function getLastName(){
	return $this->lastName;
}

public function setEmail($email){
	$this->email=$email;
}
public function getEmail(){
	return $this->email;
}

public function setAddress($address){
	$this->address=$address;
}

public function getAddress(){
	return $this->address;
}

private static $rawOrderPersons = array (
		1 => array (
			'idOrderPerson' => 1,
			'address' => 'Instituudi tee 3-27, Harku, 76902 Harku, Harju',
			'email' => 'pandeero@gmail.com',
			'firstName' => 'kalmer',
			'lastName' => 'piiskop' 
		),
		2 => array (
			'idOrderPerson' => 2,
			'email' => 'daraiko19999@gmail.com',
			'firstName' => 'raiko',
			'lastName' => 'heinla' 
		),
		3 => array (
			'idOrderPerson' => 3,
			'email' => 'Rass2525@gmail.com',
			'firstName' => 'rasmus',
			'lastName' => 'teearu' 
		) 
	);

public static function getListOfTypeOrderPerson($parameters) {
		$structuredKeys = array ();
		
		foreach ( OrderPerson::$rawOrderPersons as $id => $orderPerson ) {
			$object = new OrderPerson();
			$object->id = $id;
			$object->setCompleteOrderPerson();
			$keys[] = $id;
			$title = sprintf('%1$s&#160;%2$s', $orderPerson['firstName'], // 1
            $orderPerson['lastName']); // 2
			
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
	
	public function setCompleteOrderPerson() {
		$rawOrderPersons = OrderPerson::$rawOrderPersons;
		if (isset($rawOrderPersons[$this->id]['address'])) {
			$this->setAddress($rawOrderPersons[$this->id]['address']);
		}
		if (isset($rawOrderPersons[$this->id]['email'])) {
			$this->setEmail($rawOrderPersons[$this->id]['email']);
		}
		if (isset($rawOrderPersons[$this->id]['firstName'])) {
			$this->setFirstName($rawOrderPersons[$this->id]['firstName']);
		}
		if (isset($rawOrderPersons[$this->id]['lastName'])) {
			$this->setLastName($rawOrderPersons[$this->id]['lastName']);
		}
	}
	
	public function insert() {
		OrderPerson::$rawOrderPersons[] = array (
				'id' => count(OrderPerson::$rawOrderPersons),
				'address' => $this->address,
				'email' => $this->email,
				'firstName' => $this->firstName,
				'lastName' => $this->lastName
		);
	}
	
	public function update() {
		OrderPerson::$rawOrderPersons[$this->id]['address'] = $this->address;
		OrderPerson::$rawOrderPersons[$this->id]['email'] = $this->email;
		OrderPerson::$rawOrderPersons[$this->id]['firstName'] = $this->firstName;
		OrderPerson::$rawOrderPersons[$this->id]['lastName'] = $this->lastName;
	}
	
	public function delete() {
		unset(OrderPerson::$rawOrderPersons[$this->id]);
	}
}

?>