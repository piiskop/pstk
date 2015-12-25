<?php

namespace shiporder;

/**
 * This class describes the ship-to-data.
 *
 * @author kalmer
 * @namespace shiporder
 */
class ShipTo {
	/**
	 *
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var array[int] $rawTargetAddresses the sample target addresses
	 */
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
	/**
	 *
	 * @access private
	 * @author kalmer:piiskop
	 * @var string $nameOfRecipient the name of the recipient
	 */
	private $nameOfRecipient;
	/**
	 * the setter for the name of the recipient
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @param string $nameOfRecipient
	 *        	the name of the recipient
	 */
	public function setNameOfRecipient($nameOfRecipient) {
		$this->nameOfRecipient = $nameOfRecipient;
	}
	/**
	 * the getter for the name of the recipient
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @return string
	 */
	public function getNameOfRecipient() {
		return $this->nameOfRecipient;
	}
	/**
	 *
	 * @access private
	 * @author kalmer:piiskop
	 * @var string $address the street address
	 */
	private $address;
	/**
	 * the setter for the target street address
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @param string $address
	 *        	the target street address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}
	/**
	 * the getter for the target street address
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}
	/**
	 *
	 * @access private
	 * @author kalmer:piiskop
	 * @var string $city the name of the target city
	 */
	private $city;
	/**
	 * the setter for the target city name
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @param string $city
	 *        	the name of the target city
	 */
	public function setCity($city) {
		$this->city = $city;
	}
	/**
	 * the getter for the name of the target city
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}
	/**
	 *
	 * @access private
	 * @author kalmer:piiskop
	 * @var string $country the name of the target country
	 */
	private $country;
	/**
	 * the setter for the target country
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @param string $country
	 *        	the name of the target country
	 */
	public function setCountry($country) {
		$this->country = $country;
	}
	/**
	 * the getter for the name of the target country
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}
	/**
	 * This function sets the complete target address.
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 */
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
	/**
	 * This function queries all the target addresses of the give order person
	 * and returns them in an
	 * autocomplete
	 * array if needed.
	 *
	 * @access public
	 * @author kalmer
	 * @param boolean $parameters['forAutocompletion']
	 *        	Do we prepare the array
	 *        	for the autocompletion mechanism?
	 * @param integer $parameters['idOfParent']
	 *        	the ID of the parent
	 * @return int[] <code>NULL</code>, if there are no order person available
	 *         or
	 *         the query is erroneous or the array with keys
	 */
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