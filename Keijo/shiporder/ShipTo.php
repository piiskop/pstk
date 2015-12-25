<?php
class ShipTo {
	private $idShipTo;
	private $nameOfRecipient;
	private $address;
	private $city;
	private $country;
	
	public function SetIdShipTo($idShipTo) {
		$this -> idShipTO = $idShipTo;
	}
	
	public function setNameOfRecipient($nameOfRecipient) {
		$this -> nameOfRecipient = $nameOfRecipient;
	}
	
	public function setAddress($address) {
		$this -> address = $address;
	}
	
	public function setCity($city) {
		$this -> city = $city;
	}
	
	public function setCountry($country) {
		$this -> country = $country;
	}
	
	public function getNameOfRecipient() {
		return $this -> nameOfRecipient;
	}
	
	public function getAddress() {
		return $this -> address;
	}
	
	public function getCity() {
		return $this -> city;
	}
	
	public function getCountry() {
		return $this -> country;
	}
	
	private static $rawShipTo = array (
			
			1 => array (
					'idShipTo' => 1,
					'nameOfRecipient' => 'kalmer piiskop',
					'address' => 'Instituudi tee 3-27, Harku, 76902 Harku, Harju',
					'city' => "Harku",
					'country' => "Eesti"
			),
			2 => array(
					'idShipTo' => 2,
					'nameOfRecipient' => 'raiko heinla',
					'city' => 'Pärnu',
					'country' => 'Eesti'
			),
			3 => array(
					'idShipTo' => 3,
					'nameOfRecipient' => 'rasmus teearu',
					'city' => 'Pärnu',
					'country' => 'Eesti'
 			)
	);
	
	public static function getListOfTypeShipTo($parameters)
	{
		$structuredKeys = array ();
	
		foreach (ShipTo::$rawShipTo as $idShipTo => $shipTo)
		{
			$object = new ShipTo();
			$object->idShipTo = $idShipTo;
			$object->setCompleteShipTo();
			$keys[] = $idShipTo;
			$title = sprintf(
					'%1$s %2$s',
					$shipTo['nameOfRecipient'], // 1
					$shipTo['address'] // 2
					);
	
			$structuredKeys[$idShipTo] = array (
					'id'     => $idShipTo,
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
		ShipTo::$rawShipTo[] = array (
				'idShipTo' => count(ShipTo::$rawShipTo),
				'nameOfRecipient' => $this->nameOfRecipient,
				'address' => $this->address,
				'city' => $this->city,
				'country' => $this->country
		);
	}
	
	public function update() {
		ShipTo::$rawShipTo[] = array (
				'idShipTo' => count(ShipTo::$rawShipTo),
				'nameOfRecipient' => $this->nameOfRecipient,
				'address' => $this->address,
				'city' => $this->city,
				'country' => $this->country
		);
	}
	
	public function delete() {
		unset(ShipTo::$rawShipTo[$this->idShipTo]);
	}
}