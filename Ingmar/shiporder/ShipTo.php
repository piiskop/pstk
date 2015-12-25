<?php

namespace shiporder;

/**
 * This class describes the shipping data.
 * 
 * @author 
 * @namespace shiporder
 */
class ShipTo {
	
	/**
	 *
	 * @access private
	 * @var int $idShipTo
	 */
	private $idShipTo;
	/**
	 *
	 * @access public
	 * @param int $idShipTo
	 *        	the ID of the shipping
	 */
	
	public function setIdShipTo($idShipTo) {
		$this->idShipTo = $idShipTo;
	}
	
	/**
	 * @access private
	 * @var string $nameOfRecipient the name of the recipient
	 */
	private $nameOfRecipient;
	/**
	 * the setter for the name of the recipient
	 * 
	 * @access public
	 * @param string $nameOfRecipient the name of the recipient
	 */
	public function setNameOfRecipient($nameOfRecipient) {
		$this->nameOfRecipient = $nameOfRecipient;
	}
	/**
	 * the getter for the name of the recipient
	 * 
	 * @access public
	 * @return string
	 */
	public function getNameOfRecipient() {
		return $this->nameOfRecipient;
	}
	/**
	 * @access private
	 * @var string $address the street address
	 */
	private $address;
	/**
	 * the setter for the target street address
	 * 
	 * @access public
	 * @param string $address the target street address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}
	/**
	 * the getter for the target street address
	 * 
	 * @access public
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}
	/**
	 * @access private
	 * @var string $city the name of the target city
	 */
	private $city;
	/**
	 * the setter for the target city name
	 * 
	 * @access public
	 * @param string $city the name of the target city
	 */
	public function setCity($city) {
		$this->city = $city;
	}
	/**
	 * the getter for the name of the target city
	 * 
	 * @access public
	 * @return string
	 */
	public function getCity () {
		return $this->city;
	}
	/**
	 * @access private
	 * @var string $country the name of the target country
	 */
	private $country;
	/**
	 * the setter for the target country
	 * 
	 * @access public
	 * @param string $country the name of the target country
	 */
	public function setCountry($country) {
		$this->country = $country;
	}
	/**
	 * the getter for the name of the target country
	 * 
	 * @access public
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}
	
	public function __construct() {
		if (func_num_args() > 0) {
			$parameters = func_get_arg(0);
			$this->idShipTo = isset($parameters['idShipTo']) ? $parameters['idShipTo'] : null;
			$this->nameOfRecipient = isset($parameters['nameOfRecipient']) ? $parameters['nameOfRecipient'] : null;
			$this->address = isset($parameters['address']) ? $parameters['address'] : null;
			$this->city= isset($parameters['city']) ? $parameters['city'] : null;
			$this->country = isset($parameters['country']) ? $parameters['country'] : null;
		}
	}
	
	/**
	 *
	 * @access private
	 * @var mixed[int] the raw data of shipping
	 */
	private static $rawShipTos = array (
			1 => array (
					'idShipTo' => 1,
					'nameOfRecipient' => 'Kalmer Piiskop',
					'address' => 'Instituudi tee 3-27',
					'city' => 'Harku',
					'country' => 'Estonia'
			),
			2 => array (
					'idShipTo' => 2,
					'nameOfRecipient' => 'Raiko Heinla',
					'address' => 'Metsa 5',
					'city' => 'Pärnu',
					'country' => 'Estonia'
			),
			3 => array (
					'idShipTo' => 3,
					'nameOfRecipient' => 'Rasmus Teearu',
					'address' => 'Jõe 5-6',
					'city' => 'Pärnu',
					'country' => 'Estonia'
			)
	);
	
	/**
	 * This function queries all the shippings and returns them in an
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
	 * @return int[] <code>NULL</code>, if there are no shippings available
	 *         or
	 *         the query is erroneous or the array with keys
	*/
	public static function getListOfTypeShipTo($parameters) {
		$structuredKeys = array ();
	
		foreach ( ShipTo::$rawShipTos as $idShipTo => $shipTo ) {
			$object = new ShipTo();
			$object->idShipTo = $idShipTo;
			$object->setCompleteShipTo();
			$keys[] = $idShipTo;
			$title = $shipTo['nameOfRecipient']; 
			$title2 = sprintf('%1$s&#160;%2$s&#160;%3$s&#160;', $shipTo['address'], $shipTo['city'], $shipTo['country']);
				
			$structuredKeys[$idShipTo] = array (
					'id' => $idShipTo,
					'object' => $object,
					'title' => $title,
					'title2' => $title2
			);
				
			$values[] = $title;
			$values2[] = $title2;
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
	 * This function sets the complete shipping.
	 *
	 * @access public
	 */
	public function setCompleteShipTo() {
		$rawShipTos = ShipTo::$rawShipTos;
		if (isset($rawShipTos[$this->idShipTo]['nameOfRecipient'])) {
			$this->setNameOfRecipient($rawShipTos[$this->idShipTo]['nameOfRecipient']);
		}
		if (isset($rawShipTos[$this->idShipTo]['address'])) {
			$this->setAddress($rawShipTos[$this->idShipTo]['address']);
		}
		if (isset($rawShipTos[$this->idShipTo]['city'])) {
			$this->setCity($rawShipTos[$this->idShipTo]['city']);
		}
		if (isset($rawShipTos[$this->idShipTo]['country'])) {
			$this->setCountry($rawShipTos[$this->idShipTo]['country']);
		}
	}
	
	/**
	 * This function adds new shipping to the system
	 *
	 * @access public
	 */
	public function insert() {
		ShipTo::$rawShipTos[] = array (
				'idShipTo' => count(ShipTo::$rawShipTos),
				'nameOfRecipient' => $this->nameOfRecipient,
				'address' => $this->address,
				'city' => $this->city,
				'country' => $this->country
		);
	}
	
	/**
	 * This function updates shipping data
	 *
	 * @access public
	 */
	public function update() {
		ShipTo::$rawShipTos[$this->idShipTo]['nameOfRecipient'] = $this->nameOfRecipient;
		ShipTo::$rawShipTos[$this->idShipTo]['address'] = $this->address;
		ShipTo::$rawShipTos[$this->idShipTo]['city'] = $this->city;
		ShipTo::$rawShipTos[$this->idShipTo]['country'] = $this->country;
	}
	
	/**
	 * This function deletes shipping data
	 *
	 * @access public
	 */
	public function delete() {
		unset(ShipTo::$rawShipTos[$this->idShipTo]);
	}


}
	