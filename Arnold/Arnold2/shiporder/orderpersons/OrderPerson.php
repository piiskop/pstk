<?php

namespace shiporder;

/**
 * This class describes order persons.
 *
 * @author arnold
 * @namespace shiporder
 */
class OrderPerson {
	/**
	 *
	 * @access private
	 * @author arnold:piiskop
	 * @var int $idOrderPerson
	 */
	private $idOrderPerson;
	/**
	 *
	 * @access public
	 * @author arnold:tserepov
	 * @param int $idOrderPerson
	 *        	the ID of the order person
	 */
	public function setIdOrdePerson($idOrderPerson) {
		$this->idOrderPerson = $idOrderPerson;
	}
	/**
	 * the getter for the ID
	 * 
	 * @access public
	 * @author arnold:tserepov <tserepov@gmail.com>
	 * @return int the ID
	 */
	public function getId() {
		return $this->idOrderPerson;
	}
	/**
	 *
	 * @author arnold
	 * @var string $address the physical address
	 */
	private $address;
	/**
	 * the setter for the address
	 *
	 * @author arnold
	 * @param string $address
	 *        	the address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}
	/**
	 * the getter for the address
	 *
	 * @author arnold
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}
	/**
	 *
	 * @author arnold
	 * @var string $email the email address
	 */
	private $email;
	/**
	 * the setter for the email address
	 *
	 * @author arnold
	 * @param string $email
	 *        	the email address
	 */
	public function setEmail($email) {
		$this->email = $email;
	}
	/**
	 * the getter for the email address
	 *
	 * @author arnold
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}
	/**
	 *
	 * @author arnold
	 * @var string $firstName the first name
	 */
	private $firstName;
	/**
	 * the setter for the first name
	 *
	 * @author arnold
	 * @param string $firstName
	 *        	the first name
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	/**
	 * the getter for the first name
	 *
	 * @author arnold
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}
	/**
	 *
	 * @author arnold
	 * @var string $lastName the last name
	 */
	private $lastName;
	/**
	 *
	 * @access private
	 * @author arnold:tserepov
	 * @var mixed[int] the raw data of order persons
	 */
	private static $rawOrderPersons = array (
		1 => array (
			'idOrderPerson' => 1,
			'address' => 'Karusselli 22-1,Pärnu',
			'email' => 'tserepov@gmail.com',
			'firstName' => 'arnold',
			'lastName' => 'tserepov'
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
	/**
	 * the setter for the last name
	 *
	 * @author arnold
	 * @param string $lastName
	 *        	the last name
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	/**
	 * the getter for the last name
	 *
	 * @author arnold
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}
	public function __construct() {
		if (func_num_args() > 0) {
			$parameters = func_get_arg(0);
			$this->idOrderPerson = isset($parameters['idOrderPerson']) ? $parameters['idOrderPerson'] : null;
			$this->address = isset($parameters['address']) ? $parameters['address'] : null;
			$this->email = isset($parameters['email']) ? $parameters['email'] : null;
			$this->firstName = isset($parameters['firstName']) ? $parameters['firstName'] : null;
			$this->lastName = isset($parameters['lastName']) ? $parameters['lastName'] : null;
		}
	}
	/**
	 * This function queries all the order persons and returns them in an
	 * autocomplete
	 * array if needed.
	 *
	 * @access public
	 * @author arnold
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
	public static function getListOfTypeOrderPerson($parameters) {
		$structuredKeys = array ();
		
		foreach ( OrderPerson::$rawOrderPersons as $idOrderPerson => $orderPerson ) {
			$object = new OrderPerson();
			$object->idOrderPerson = $idOrderPerson;
			$object->setCompleteOrderPerson();
			$keys[] = $idOrderPerson;
			$title = sprintf('%1$s&#160;%2$s', $orderPerson['firstName'], // 1
$orderPerson['lastName']); // 2
			
			$structuredKeys[$idOrderPerson] = array (
				'id' => $idOrderPerson,
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
	 * This function sets the complete order person.
	 *
	 * @access public
	 * @author arnold:tserepov
	 */
	public function setCompleteOrderPerson() {
		$rawOrderPersons = OrderPerson::$rawOrderPersons;
		if (isset($rawOrderPersons[$this->idOrderPerson]['address'])) {
			$this->setAddress($rawOrderPersons[$this->idOrderPerson]['address']);
		}
		if (isset($rawOrderPersons[$this->idOrderPerson]['email'])) {
			$this->setEmail($rawOrderPersons[$this->idOrderPerson]['email']);
		}
		if (isset($rawOrderPersons[$this->idOrderPerson]['firstName'])) {
			$this->setFirstName($rawOrderPersons[$this->idOrderPerson]['firstName']);
		}
		if (isset($rawOrderPersons[$this->idOrderPerson]['lastName'])) {
			$this->setLastName($rawOrderPersons[$this->idOrderPerson]['lastName']);
		}
	}
	
	/**
	 * This function adds a brand new order person to the system.
	 *
	 * @access public
	 * @author arnold 
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
	/**
	 * This function updates the order person data.
	 *
	 * @access public
	 * @author arnold:tserepov
	 */
	public function update() {
		OrderPerson::$rawOrderPersons[$this->idOrderPerson]['address'] = $this->address;
		OrderPerson::$rawOrderPersons[$this->idOrderPerson]['email'] = $this->email;
		OrderPerson::$rawOrderPersons[$this->idOrderPerson]['firstName'] = $this->firstName;
		OrderPerson::$rawOrderPersons[$this->idOrderPerson]['lastName'] = $this->lastName;
	}
	/**
	 * This function deletes an order person.
	 *
	 * @access public
	 * @author arnold:tserepov
	 */
	public function delete() {
		unset(OrderPerson::$rawOrderPersons[$this->idOrderPerson]);
	}
}