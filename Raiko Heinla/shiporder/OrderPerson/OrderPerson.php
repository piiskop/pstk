<?php

namespace shiporder;

/**
 * This class describes order persons.
 * 
 * @Author Raiko Heinla
 * @Namespace shiporder
 */
class OrderPerson {
	
	private $idOrderPerson;
	
	public function setIdOrdePerson($idOrderPerson) {
		$this->idOrderPerson = $idOrderPerson;
	}
	
	private $firstName;
	/**
	 * function to set first name
	 */
	public function setFirstName($firstName){
		$this->firstName = $firstName;
	}
	/**
	 * function to retrieve allready set firstName
	 * 
	 * @var string $email to the email address
	 */
	public function getFirstName(){
		return $this->firstName;
	}
	
	private $lastName;
	/**
	 * Function to set last name
	 */
	public function setLastName($lastName){
		$this->lastName = $lastName;
	}
	/**
	 * function to retrieve allready set lastName
	 * 
	 * @var string $lastName to last name
	 */
	public function getLastName(){
		return $this->lastName;
	}
	
	private $email;
	/**
	 * function to set email
	 */
	public function setEmail($email){
		$this->email = $email;
	}
	/**
	 * function to retrieve allready set email
	 * 
	 * @var string $lastName to last name
	 */
	public function getEmail(){
		return $this->email;
	}
	
	private $address;
	/**
	 * function to set address
	 */
	public function setAddress($address){
		$this->address = $address;
	}
	/**
	 * function to retrieve allready set address
	 * 
	 * @var string $address to address
	 */
	public function getAddress(){
		return $this->address;
	}
	public function _construct(){
		if (func_num_args()>0){
		$parameters = func_get_arg(0);
		$this->idOrderPerson = isset($parameters['idOrderPerson']) ? $parameters['idOrderPerson'] : null;
		$this->firstName = isset($parameters['firstName']) ? $parameters['firstName'] : null;
		$this->lastName = isset($parameters['lastName']) ? $parameters['lastName'] : null;
		$this->email = isset($parameters['email']) ? $parameters['email'] : null;
		$this->address = isset($parameters['address']) ? $parameters['address'] : null;
		}
	}	

/**
 * Data for OrderPerson
 */
private static $rawOrderPersons = array(
		1=>	array(
			'idOrderPerson' => 1,
			'firstName' => 'raiko',
			'lastName' => 'heinla',
			'email' => 'raiko19999@gmail.com',
			'address' => 'pärnu maakond sauga vald urge küla'
			
		),
		2=>	array(
			'idOrderPerson' => 2,
			'firstName' => 'marten',
			'lastName' => 'kahr',
			'email' => 'm@k.com',
			'address' => 'pärnu maakond1'
		),
		3=>	array(
			'idOrderPerson' => 3,
			'firstName' => 'rasmus',
			'lastName' => 'teearu',
			'email' => 'r@t.com',
			'address' => 'pärnu maakond2'
	),
);

/**
 * This function queries all the order persons and returns them in an autcomplete array
 * if needed.
 */
public static function getListOfTypeOrderPerson($parameters){
	
	$structuredKeys = array();
	
	foreach (OrderPerson::$rawOrderPersons as $idOrderPerson => $orderPerson)
	{
		$object = new OrderPerson();
		$object ->idOrderPerson = $idOrderPerson;
		$object ->setCompleteOrderPerson();
		$keys[] = $idOrderPerson;
		$title = sprintf(
				'%1$s&#160;%2$s',
				$orderPerson['firstName'],
				$orderPerson['lastName']
		);
		$structuredKeys[$idOrderPerson] = array (
				'id' => $idOrderPerson,
				'object' => $object,
				'title' => $title,
		);
		
		$values[] = $title;
	}
		
		if (isset($parameters['forAutocompletion']) && $parameters['forAutocompletion'])
		{
			$a[] = $values;
			$a[] = $keys;
			return $a;
		} else	{
			return $structuredKeys;
		}	
	}
/**
 * This function sets the complete order person.
 */
	public function setCompleteOrderPerson(){
		$rawOrderPersons = OrderPerson::$rawOrderPersons;
		if (isset ($rawOrderPersons[$this->idOrderPerson]['address'])){
			$this->setAddress($rawOrderPersons[$this->idOrderPerson]['address']);
		}
		if (isset ($rawOrderPersons[$this->idOrderPerson]['email'])){
			$this->setEmail($rawOrderPersons[$this->idOrderPerson]['email']);
		}
		if (isset ($rawOrderPersons[$this->idOrderPerson]['firstName'])){
			$this->setFirstName($rawOrderPersons[$this->idOrderPerson]['firstName']);
		}
		if (isset ($rawOrderPersons[$this->idOrderPerson]['lastName'])){
			$this->setLastName($rawOrderPersons[$this->idOrderPerson]['lastName']);
		}
	}
	
	/**
	 * This function adds a new order person to the system.
	 */
	public function insert() {
		OrderPerson::$rawOrderPersons[] = array (
			'idOrderPerson' => count(OrderPerson::$rawOrderPersons),
			'address' => $this->address,
			'email' => $this->email,
			'firstName' => $this->firstName,
			'lastName' => $this->lastName
		);
	}
}