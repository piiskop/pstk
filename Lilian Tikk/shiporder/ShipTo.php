<?php

namespace shiporder;

/**
 * This class describes the recipent of the order.
 */
class ShipTo {
	/**
	 *
	 * @access private
	 * @var string @nameOfRecipient name of recipient
	 */
	private static $rawShipTos = array (
			1 => array (
					'idShipTo' => 1,
					'name' => 'Mati Unt',
					'address' => 'Vee 22',
					'city' => 'Paide',
					'country' => 'Eesti' 
			),
			2 => array (
					'idShipTo' => 2,
					'name' => 'Mari Tamm',
					'address' => 'Kuuse 8',
					'city' => 'Tartu',
					'country' => 'Eesti' 
			),
			3 => array (
					'idShipTo' => 3,
					'name' => 'Mia Karu',
					'address' => 'Seedri 2',
					'city' => 'Võru',
					'country' => 'Eesti' 
			) 
	);
	private $nameOfRecipient;
	public function setNameOfRecipient($nameOfRecipient) {
		$this->nameOfRecipient = $nameOfRecipient;
	}
	public function getNameOfRecipient() {
		return $this->nameOfRecipient;
	}
	
	/**
	 *
	 * @access private
	 * @var string @address the address of the recipient
	 *     
	 */
	private $address;
	public function setAddress($address) {
		$this->address = $address;
	}
	public function getAddress() {
		return $this->address;
	}
	/**
	 *
	 * @access private
	 * @var string $city the city where order goes
	 */
	private $city;
	public function setCity($city) {
		$this->city = $city;
	}
	public function getCity() {
		return $this->city;
	}
	
	/**
	 *
	 * @access private
	 * @var string $country the country where order goes
	 */
	private $country;
	public function setCountry($country) {
		$this->country = $country;
	}
	public function getCountry() {
		return $this->country;
	}
	public function __construct() {
		if (func_num_args () > 0) {
			$parameters = func_get_arg ( 0 );
			$this->nameOfRecipient = isset ( $parameters ['nameOfRecipient'] ) ? $parameters ['nameOfRecipient'] : null;
			$this->address = isset ( $parameters ['address'] ) ? $parameters ['address'] : null;
			$this->country = isset ( $parameters ['country'] ) ? $parameters ['country'] : null;
		}
	}
	
	/**
	 * This function queries all the order persons and returns them in an autocomplete array if needed.
	 */
	public static function getListOfTypeShipTo($parameters) {
		$structuredKeys = array ();
		
		foreach ( ShipTo::$rawShipTos as $idShipTo => $shipTo ) {
			$object = new ShipTo ();
			$object->idShipTo = $idShipTo;
			$object->setCompleteShipTo ();
			$keys [] = $idShipTo;
			$title = $shipTo ['name'];
			$title2 = sprintf('%1$s&#160;%2$s&#160;%3$s&#160;', $shipTo['address'], $shipTo['city'], $shipTo['country']);
			
			
			$structuredKeys [$idShipTo] = array (
					'id' => $idShipTo,
					'object' => $object,
					'title' => $title,
					'title2' => $title2
			);
			
			$values [] = $title;
			$values2 [] = $title2;
		}
		
		if (isset ( $parameters ['forAutocompletion'] )) {
			$a [] = $values;
			$a [] = $keys;
			return $a;
		} else {
			return $structuredKeys;
		}
	}
	/**
	 * This function sets the complete order person.
	 */
	public function setCompleteShipTo() {
		$rawShipTos = ShipTo::$rawShipTos;
		if (isset ( $rawShipTos [$this->idShipTo] ['nameOfRecipient'] )) {
			$this->setNameOfRecipient ( $rawShipTos [$this->idShipTo] ['nameOfRecipient'] );
		}
		if (isset ( $rawShipTos [$this->idShipTo] ['address'] )) {
			$this->setAddress ( $rawShipTos [$this->idShipTo] ['address'] );
		}
		if (isset ( $rawShipTos [$this->idShipTo] ['city'] )) {
			$this->setCity ( $rawShipTos [$this->idShipTo] ['city'] );
		}
		if (isset ( $rawShipTos [$this->idShipTo] ['country'] )) {
			$this->setCountry ( $rawShipTos [$this->idShipTo] ['country'] );
		}
	}
	public function insert() {
		ShipTo::$rawShipTo [] = array (
				'idShipTo' => count ( ShipTo::$rawShipTo ),
				'amount' => $this->amount,
				'price' => $this->price,
				'name' => $this->name 
		)
		;
	}
	public function update() {
		ShipTo::$rawShipTo [$this->idShipTo] = array (
				'amount' => $this->amount,
				'price' => $this->price,
				'name' => $this->name 
		);
	}
	public function delete() {
		unset ( ShipTo::$rawShipTo [$this->idShipTo] );
	}
}

