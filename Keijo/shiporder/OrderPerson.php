<?php

namespace shiporder;

class OrderPerson {
	private $IdOrderPerson;
	
		public function setIdOrdePerson($idOrderPerson) {
			$this->idOrderPerson = $idOrderPerson;
			}
	private $firstName;
	
		public function setFirstName($firstName) {
			$this -> firstName = $firstName;
		}
		
		public function getFirstName() {
			return $this -> firstName;
		}
		
	private $lastName;
	
		public function setLastName($lastName) {
			$this -> lastName = $lastName;
		}
		
		public function getLastName() {
			return $this -> lastName;
		}
	
	private $eMail;
	
		public function setEMail($eMail) {
			$this -> eMail = $eMail;
		}
		
		public function getEMail() {
			return $this -> email;
		}
	
	private $address;
	
		public function setAddress($address) {
			$this -> address = $adress;
		}
	
	public function getAddress() {
		return $this -> address;
		}
	
	private static $rawOrderPerson = array (
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
		
	public static function getListOfTypeOrderPerson($parameters)
	{
		$structuredKeys = array ();
	
		foreach (OrderPerson::$rawOrderPersons as $idOrderPerson => $orderPerson)
		{
			$object = new OrderPerson();
			$object->idOrderPerson = $idOrderPerson;
			$object->setCompleteOrderPerson();
			$keys[] = $idOrderPerson;
			$title = sprintf(
					'%1$s %2$s',
					$orderPerson['firstName'], // 1
					$orderPerson['lastName'] // 2
					);
	
			$structuredKeys[$idOrderPerson] = array (
					'id'     => $idOrderPerson,
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
	
	public function insert() {
		OrderPerson::$rawOrderPersons[] = array (
				'idOrderPerson' => count(OrderPerson::$rawOrderPersons),
				'address' => $this->address,
				'email' => $this->email,
				'firstName' => $this->firstName,
				'lastName' => $this->lastName
		);
	}
	
	public function update() {
		OrderPerson::$rawOrderPersons[$this->idOrderPerson] = array (
				'address' => $this->address,
				'email' => $this->email,
				'firstName' => $this->firstName,
				'lastName' => $this->lastName
		);
	}
	
	public function delete() {
		unset(OrderPerson::$rawOrderPersons[$this->idOrderPerson]);
	}
	
}