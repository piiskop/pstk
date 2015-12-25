<?php
class ShipTo{

	private static $rawTargetAddresses = array (
			1 => array (
					'id' => 1,
					'idOrderPerson' => 1,
					'nameOfRecipient' => 'kalmer:piiskop',
					'address' => 'Harku',
					'city' => 'Viljandi',
					'country' => 'Viljandi'
			),
			2 => array (
					'id' => 2,
					'idOrderPerson' => 2,
					'nameOfRecipient' => 'raiko heinla',
					'address' => 'Lõuna 2-15',
					'city' => 'Pärnu',
					'country' => 'Pärnu'
			),
			3 => array (
					'id' => 3,
					'idOrderPerson' => 2,
					'nameOfRecipient' => 'heiko rainla',
					'address' => 'Põhja 15-2',
					'city' => 'Narva',
					'country' => 'Ida-Viru'
			)
	);
	
	private $nameOfRecipient, $address, $city, $country,$id;
	

public function setAddress($address){
	$this->address=$address;
}

public function getAddress(){
	return $this->address;
}

public function  getnameOfRecipient(){
	return $this->nameOfRecipient;
	}

public function  setnameOfRecipient($nameOfRecipinent){
	$this->nameOfRecipient=$nameOfRecipient;
	
}

public function getCity(){
	return $this->city;
}

public function setCity($city){
	$this->city=$city;
}

public function getCounty(){
	return $this->country;
}

public function setCounty($country){
	return $this->$nameOfRecipient;
}

public function setCompleteShipTo() {
	$rawTargetAddresses = ShipTo::$rawTargetAddresses;
	if (isset($rawTargetAddresses[$this->idShipTo]['nameOfRecipient'])) {
		$this->setAddress($rawTargetAddresses[$this->idShipTo]['nameOfRecipient']);
	}
	if (isset($rawTargetAddresses[$this->idShipTo]['address'])) {
		$this->setAddress($rawTargetAddresses[$this->idShipTo]['address']);
	}
	if (isset($rawTargetAddresses[$this->idShipTo]['city'])) {
		$this->setAddress($rawTargetAddresses[$this->idShipTo]['city']);
	}
	if (isset($rawTargetAddresses[$this->idShipTo]['country'])) {
		$this->setAddress($rawTargetAddresses[$this->idShipTo]['country']);
	}
}

public static function getListOfTypeShipTo($parameters) {
	$structuredKeys = array ();
	foreach ( ShipTo::$rawTargetAddresses as $idTargetAddress => $targetAddress ) {
		if ($parameters['idOfParent'] == $targetAddress['idOrderPerson']) {
			$object = new ShipTo();
			$object->idShipTo = $idTargetAddress;
			$object->setCompleteShipTo();
			$keys[] = $idTargetAddress;
			$title = sprintf('%1$s&#160;%2$s', $targetAddress['nameOfRecipient'], // 1
					$targetAddress['city']); // 2
					$structuredKeys[$idTargetAddress] = array (
							'id' => $idTargetAddress,
							'object' => $object,
							'title' => $title
					);
					$values[] = $title;
		}
	}
	if (isset($parameters['forAutocompletion']) && $parameters['forAutocompletion']) {
		$a[] = $values;
		$a[] = $keys;
		return $a;
	} else {
		return $structuredKeys;
	}
}

}
?>