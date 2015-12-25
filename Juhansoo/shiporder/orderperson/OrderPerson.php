<?php
namespace shiporder;

/**
 * This class describes the order person.
 * 
 * @author Rasmus
 * @namespace shiporder
 */
class OrderPerson {
	/**
	 * @access private
	 * @var int $idOrderPerson 
	 * 			id of order person
	 */
	private $idOrderPerson;
	/**
	 * the setter for first name
	 *
	 * @access public
	 * @param int $idOrderPerson 
	 * 			id of order person
	 */
	public function setIdOrderPerson($idOrderPerson) {
		$this->idOrderPerson = $idOrderPerson;
	}
	/**
	 * the getter for the ID
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return int the ID
	 */
	public function getId() {
		return $this->idOrderPerson;
	}
	/**
	 * @access private
	 * @var string $firstname first name
	 */
	
	private $firstName;
	/**
	 * the setter for first name
	 * 
	 * @access public
	 * @param string $firstname first name
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	/**
	 * the getter for first name
	 * 
	 * @access public
	 * @param string $firstName first name
	 */
	public function getFirstName() {
		return $this->firstName;
	}
	/**
	 * @access private
	 * @var string $firstname last name
	 */
	private $lastName;
	/**
	 * the setter for last name
	 * 
	 * @access public
	 * @param string $lastname last name
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	/**
	 * the getter for last name
	 * 
	 * @access public
	 * @param string $lastname last name
	 */
	public function getLastName() {
		return $this->lastName;
	}
	/**
	 * @access private
	 * @var string $email email
	 */
	private $email;
	/**
	 * the setter for email
	 * 
	 * @access public
	 * @param string $email email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}
	/**
	 * the getter for email
	 * 
	 * @access public
	 * @param string $email email
	 */
	public function getEmail() {
		return $this->email;
	}
	/**
	 * @access private
	 * @var string $address address
	 */
	private $address;
	/**
	 * the setter for address
	 * 
	 * @access public
	 * @param string $address address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}
	/**
	 * the getter for address
	 * 
	 * @access public
	 * @param string $address address
	 */
	public function getAddress() {
		return $this->address;
	}
	/**
	 * @access private
	 * @var mixed[int] raw data of order persons
	 */
	private static $rawOrderPersons = array (
		1 => array (
			'idOrderPerson' => 1,
			'firstName' => 'kalmer',
			'lastName' => 'piiskop',
			'email' => 'pandeero@gmail.com',
			'address' => 'Instituudi tee 3-27, 76902 Harku, Harju'
		),
		2 => array (
			'idOrderPerson' => 2,
			'firstName' => 'raiko',
			'lastName' => 'heinla',
			'email' => 'daraiko19999@gmail.com'
		),
		3 => array (
			'idOrderPerson' => 3,
			'firstName' => 'rasmus',
			'lastName' => 'teearu',
			'email' => 'Rass2525@gmail.com'
		) 
	);
	
	public function __construct() {
		if (func_num_args() > 0) {
			$parameters = func_get_arg(0);
			$this->idOrderPerson = isset($parameters['idOrderPerson']) ? $parameters['idOrderPerson'] : null;
			$this->firstName = isset($parameters['firstName']) ? $parameters['firstName'] : null;
			$this->lastName = isset($parameters['lastName']) ? $parameters['lastName'] : null;
			$this->email = isset($parameters['email']) ? $parameters['email'] : null;
			$this->address = isset($parameters['address']) ? $parameters['address'] : null;
		}
	}
	
	/**
	 * This function queries all the order persons and returns them in an autocomplete
	 * array if needed.
	 *
	 * @access public
	 * @param boolean $parameters['forAutocompletion'] Do we prepare the array
	 * 		for the autocompletion mechanism?
	 * @param integer $parameters['idOfParent']        the ID of the page the
	 * 		list of page news we want
	 * @return int[] <code>NULL</code>, if there are no order person available or
	 * 		the query is erroneous or the array with keys
	 */
	public static function getListOfTypeOrderPerson($parameters) {
		$structuredKeys = array ();
	
		foreach (OrderPerson::$rawOrderPersons as $idOrderPerson => $orderPerson) {
			$object = new OrderPerson();
			$object->idOrderPerson = $idOrderPerson;
			$object->setCompleteOrderPerson();
			$keys[] = $idOrderPerson;
			$title = sprintf('%1$s %2$s', 
				$orderPerson['firstName'], // 1
				$orderPerson['lastName'] // 2
			);
	
			$structuredKeys[$idOrderPerson] = array (
				'id' => $idOrderPerson,
				'object' => $object,
				'title' => $title,
			);
	
			$values[] = $title;
		}
	
		if (isset($parameters['forAutocompletion'])) {
			$a[] = $values;
			$a[] = $keys;
			return $a;
		}
		else {
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
		if (isset($rawOrderPersons[$this->idOrderPerson]['firstName'])) {
			$this->setFirstName($rawOrderPersons[$this->idOrderPerson]['firstName']);
		}
		if (isset($rawOrderPersons[$this->idOrderPerson]['lastName'])) {
			$this->setLastName($rawOrderPersons[$this->idOrderPerson]['lastName']);
		}
		if (isset($rawOrderPersons[$this->idOrderPerson]['email'])) {
			$this->setEmail($rawOrderPersons[$this->idOrderPerson]['email']);
		}
		if (isset($rawOrderPersons[$this->idOrderPerson]['address'])) {
			$this->setAddress($rawOrderPersons[$this->idOrderPerson]['address']);
		};
	}
	
	/**
	 * This function adds a new order person to the system.
	 * 
	 * @access public
	 */
	public function insert() {
		OrderPerson::$rawOrderPersons[] = array (
			'idOrderPerson' => count(OrderPerson::$rawOrderPersons),
			'firstName' => $this->firstName,
			'lastName' => $this->lastName,
			'email' => $this->email,
			'address' => $this->address
		);
	}
	
	/**
	 * This function updates the order person data.
	 *
	 * @access public
	 */
	public function update() {
		OrderPerson::$rawOrderPersons[$this->idOrderPerson]['firstName'] = $this->firstName;
		OrderPerson::$rawOrderPersons[$this->idOrderPerson]['lastName'] = $this->lastName;
		OrderPerson::$rawOrderPersons[$this->idOrderPerson]['email'] = $this->email;
		OrderPerson::$rawOrderPersons[$this->idOrderPerson]['address'] = $this->address;
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