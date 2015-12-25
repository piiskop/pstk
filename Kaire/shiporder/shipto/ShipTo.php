<?php
namespace shiporder;

/**
 * See klass kirjeldab tellimuse andmeid.
 * 
 * @author kaire
 * @namespace shiporder
 */
class ShipTo {
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
}