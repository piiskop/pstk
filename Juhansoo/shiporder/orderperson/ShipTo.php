<?php
namespace shiporder;

/**
 * This class describes the ship-to-data.
 *
 * @author Rasmus
 * @namespace shiporder
 */
class ShipTo {
	/**
	 * @access private
	 * @var mixed[int] raw data of shipping
	 */
	private static $rawTargetAddresses = array (
			1 => array (
					'id' => 1,
					'idOrderPerson' => 1,
					'nameOfRecipient' => 'Kalmer Piiskop',
					'address' => 'Maleva 4',
					'city' => 'Tallinn',
					'country' => 'Estonia'
			),
			2 => array (
					'id' => 2,
					'idOrderPerson' => 2,
					'nameOfRecipient' => 'Raiko Heinla',
					'address' => 'Communism 2',
					'city' => 'Moscow',
					'country' => 'Russia'
			),
			3 => array (
					'id' => 3,
					'idOrderPerson' => 3,
					'nameOfRecipient' => 'Rasmus Teearu',
					'address' => 'Moose 3',
					'city' => 'Helsinki',
					'country' => 'Finland'
			)
	);
	
	/**
	 * @access private
	 * @var string $nameOfRecipient name of recipient
	 */
	private $nameOfRecipient;
	/**
	 * the setter for name of recipient
	 *
	 * @access public
	 * @param string $nameOfRecipient name of recipient
	 */
	public function setNameOfRecipient($nameOfRecipient) {
		$this->nameOfRecipient = $nameOfRecipient;
	}
	/**
	 * the getter for name of recipient
	 *
	 * @access public
	 * @param string $nameOfRecipient name of recipient
	 */
	public function getNameOfRecipient() {
		return $this->nameOfRecipient;
	}
	/**
	 * @access private
	 * @var string $address street address
	 */
	private $address;
	/**
	 * the setter for street address
	 *
	 * @access public
	 * @param string $address street address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}
	/**
	 * the getter for street address
	 *
	 * @access public
	 * @param string $address street address
	 */
	public function getAddress() {
		return $this->address;
	}
	/**
	 * @access private
	 * @var string $city target city
	 */
	private $city;
	/**
	 * the setter for target city
	 *
	 * @access public
	 * @param string $city target city
	 */
	public function setCity($city) {
		$this->city = $city;
	}
	/**
	 * the getter for target city
	 *
	 * @access public
	 * @param string $city target city
	 */
	public function getCity() {
		return $this->city;
	}
	/**
	 * @access private
	 * @var string $nameOfRecipient target country
	 */
	private $country;
	/**
	 * the setter for target country
	 *
	 * @access public
	 * @param string $country target country
	 */
	public function setCountry($country) {
		$this->country = $country;
	}
	/**
	 * the getter for target country
	 *
	 * @access public
	 * @param string $country target country
	 */
	public function getCountry() {
		return $this->country;
	}
	
	/**
	 * This function sets the complete target address.
	 *
	 * @access public
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
				$title = sprintf('%1$s&#160;%2$s', 
					$targetAddress['nameOfRecipient'], // 1
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