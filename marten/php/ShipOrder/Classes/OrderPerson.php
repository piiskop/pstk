<?php
namespace shiporder;
class OrderPerson {
	private $idOrderPerson;
	public function setIdOrderPerson($idOrderPerson) {
		$this->idOrderPerson = $idOrderPerson;
	}
	public function getIdOrderPerson() {
		return $this->idOrderPerson;
	}
	private $firstName;
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	public function getFirstName() {
		return $this->firstName;
	}
	private $lastName;
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	public function getLastName() {
		return $this->lastName;
	}
	private $email;
	public function setEmail($email) {
		$this->email = $email;
	}
	public function getEmail() {
		return $this->email;
	}
	private $address;
	public function setAddress($address) {
		$this->address = $address;
	}
	public function getAddress() {
		return $this->address;
	}
	private static $rawOrderPersonData = array(
			1 => array (
					'idOrderPerson' => 1,
					'firstName' => 'Marten',
					'lastName' => 'Kähr',
					'email' => 'mail@marten.ee',
					'address' => 'Kapteni pst. 55, Tallinn, Harju Maakond',
			),
			2 => array (
					'idOrderPerson' => 3,
					'firstName' => 'Raiko',
					'lastName' => 'Heinla',
					'email' => 'rkhn@meil.ee',
					'address' => 'Kapteni pst. 56, Tallinn, Harju Maakond',
			),
			3 => array (
					'idOrderPerson' => 3,
					'firstName' => 'Aleksei',
					'lastName' => 'Novosjolov',
					'email' => 'aleksei@mail.com',
					'address' => 'Kapteni pst. 57, Tallinn, Harju Maakond',
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
	public function loadRaw() {
		$orderPersons = array();
		foreach (OrderPerson::$rawOrderPersonData as $idOrderPerson=>$ArrayOfOrderPerson) {
			$orderPerson = new OrderPerson(array (
				'idOrderPerson'=>$ArrayOfOrderPerson['idOrderPerson'],
				'firstName'=>$ArrayOfOrderPerson['firstName'],
				'lastName'=>$ArrayOfOrderPerson['lastName'],
				'email'=>$ArrayOfOrderPerson['email'],
				'address'=>$ArrayOfOrderPerson['address']
			));
			$orderPersons[$idOrderPerson] = $orderPerson;
		}
		echo '<pre>';
		var_dump($orderPersons);
		echo '</pre>';
	}
	public function personCount() {
		return count(OrderPerson::$rawOrderPersonData);
	}
	public function insert(){
		OrderPerson::$rawOrderPersonData[]= array(
				'idOrderPerson'=>count(OrderPerson::$rawOrderPersonData),
				'firstName'=>$this->firstName,
				'lastName'=>$this->lastName,
				'email'=>$this->email,
				'address'=>$this->address,
		);
	}
	public function setCompleteOrderPerson() {
		$this->firstName = OrderPerson::$rawOrderPersonData[$this->idOrderPerson]['firstName'];
		$this->lastName = OrderPerson::$rawOrderPersonData[$this->idOrderPerson]['lastName'];
		$this->email = OrderPerson::$rawOrderPersonData[$this->idOrderPerson]['email'];
		$this->address = OrderPerson::$rawOrderPersonData[$this->idOrderPerson]['address'];
		
	}
	public function update() {
		OrderPerson::$rawOrderPersonData[$this->idOrderPerson]= array(
				'idOrderPerson'=>$this->idOrderPerson,
				'firstName'=>$this->firstName,
				'lastName'=>$this->lastName,
				'email'=>$this->email,
				'address'=>$this->address
		);
	}
	public function delete () {
		unset(OrderPerson::$rawOrderPersons[$this->idOrderPerson]);
	}
	public function returnRawValue($type,$index) {
		if ($type == 'firstName') {
			return OrderPerson::$rawOrderPersonData[$index]['firstName'];
		}
		elseif ($type == 'lastName') {
			return OrderPerson::$rawOrderPersonData[$index]['lastName'];
		}
		elseif ($type == 'fullName') {
			return OrderPerson::$rawOrderPersonData[$index]['firstName'].' '.OrderPerson::$rawOrderPersonData[$index]['lastName'];
		}
		else {
			return null;
		}
	}
}