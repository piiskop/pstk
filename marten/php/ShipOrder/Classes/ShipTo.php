<?php
namespace shiporder;
class ShipTo {
	private $nameOfRecipient;
	public function setnameOfRecipient($nameOfRecipient) {
		$this->nameOfRecipient = $nameOfRecipient;
	}
	public function getnameOfRecipient() {
		return $this->nameOfRecipient;
	}
	private $country;
	public function setcountry($country) {
		$this->country = $country;
	}
	public function getcountry() {
		return $this->country;
	}
	private $city;
	public function setcity($city) {
		$this->city = $city;
	}
	public function getcity() {
		return $this->city;
	}
	private $address;
	public function setaddress($address) {
		$this->address = $address;
	}
	public function getaddress() {
		return $this->address;
	}

	public function __construct() {
		if (func_num_args() > 0) {
			$parameters = func_get_arg(0);
			$this->nameOfRecipient = isset($parameters['nameOfRecipient']) ? $parameters['nameOfRecipient'] : null;
			$this->country = isset($parameters['country']) ? $parameters['country'] : null;
			$this->city = isset($parameters['city']) ? $parameters['city'] : null;
			$this->address = isset($parameters['address']) ? $parameters['address'] : null;
		}
	}
}