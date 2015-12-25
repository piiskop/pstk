<?php

//Model -> see käsitleb ainult andmeid

namespace shiporder;

/**
 * This class describes order persons.
 *
 * @author erika
 * @namespace shiporder
 */
 
class OrderPerson {
	/**
	 *
	 * @access private
	 * @var int $idOrderPerson
	 */
	private $idOrderPerson;
	/**
	 *
	 * @access public
	 * @param int $idOrderPerson
	 *        	the ID of the order person
	 */
	public function setIdOrderPerson($idOrderPerson) {
		$this->idOrderPerson = $idOrderPerson;
	}
	/**
	 *
	 * @var string $address the physical address
	 */
	private $address;
	/**
	 * the setter for the address
	 *
	 * @param string $address
	 *        	the address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}
	/**
	 * the getter for the address
	 *
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}
	/**
	 *
	 * @var string $email the email address
	 */
	private $email;
	/**
	 * the setter for the email address
	 *
	 * @param string $email
	 *        	the email address
	 */
	public function setEmail($email) {
		$this->email = $email;
	}
	/**
	 * the getter for the email address
	 *
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}
	/**
	 *
	 * @var string $firstName the first name
	 */
	private $firstName;
	/**
	 * the setter for the first name
	 *
	 * @param string $firstName
	 *        	the first name
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	/**
	 * the getter for the first name
	 *
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}
	/**
	 *
	 * @var string $lastName the last name
	 */
	private $lastName;
	/**
	 * the setter for the last name
	 *
	 * @param string $lastName
	 *        	the last name
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	/**
	 * the getter for the last name
	 *
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
	 *
	 * @access private
	 * @var mixed[int] the raw data of order persons
	 */
	private static $rawOrderPersons = array (
			1 => array (
					'idOrderPerson' => 1,
					'address' => 'Instituudi tee 3-27, Harku, 76902 Harku, Harju',
					'email' => 'pandeero@gmail.com',
					'firstName' => 'Kalmer',
					'lastName' => 'Piiskop'
			),
			2 => array (
					'idOrderPerson' => 2,
					'email' => 'daraiko19999@gmail.com',
					'firstName' => 'Raiko',
					'lastName' => 'Heinla'
			),
			3 => array (
					'idOrderPerson' => 3,
					'email' => 'Rass2525@gmail.com',
					'firstName' => 'Rasmus',
					'lastName' => 'Teearu'
			)
	);
	
	/**
	 * This function queries all the order persons and returns them in an
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
			$a[] = $values;//pealkirjad, mis pannakse kokku real 181
			$a[] = $keys;//võtmed on id-d
			return $a;
		} else {
			return $structuredKeys;
		}
	}
	/**
	 * This function sets the complete order person.
	 *
	 * @access public
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
	 */
	public function delete() {
		unset(OrderPerson::$rawOrderPersons[$this->idOrderPerson]);
	}
}

	