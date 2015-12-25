<?php
namespace shiporder;

/**
 * This class describes where to ship bought goods.
 *
 * @Author Raiko Heinla
 * 
 * @Namespace shipto
 *
 */require_once dirname(__FILE__) . '/../../Muu/settings.php';

class ShipTo{
	
	public function setIdShipTo($idShipTo) {
		$this->idShipTo = $idShipTo;
	}
	
	private $nameOfRecipient;
	/**
	 * function to set name of recipient
	 */
	public function setNameOfRecipient($nameOfRecipient){
		$this->nameOfRecipient = $nameOfRecipient;
	}
	/**
	 * function to retrieve allready set recipient name
	 * 
	 * @var string $nameOfRecipient to the name of the recipient
	 */
	public function getNameOfRecipient(){
		return $this->nameOfRecipient;
	}
	
	private $address;
	/**
	 * function to set address
	 */
	public function setaddress($address){
		$this->address = $address;
	}
	/**
	 * function to retrieve allready set address
	 * 
	 * @var string $address to the address
	 */
	public function getaddress(){
		return $this->address;
	}
	
	private $city;
	/**
	 * function to set name of city
	 */
	public function setCity($city){
		$this->city = $city;
	}
	/**
	 * function to retrieve allready set city
	 * 
	 * @var string $city to the city of residence
	 */
	public function getCity(){
		return $this->city;
	}

	private $country;
	/**
	 * function to set country of residence
	 */
	public function setCountry($country){
		$this->country = $country;
	}
	/**
	 * function to retrieve allready set country name
	 * 
	 * @var string $country to the country of recidence
	 */
	public function getCountry(){
		return $this->country;
	}
	
	
	public function _construct(){
		if (func_num_args()>0){
			$parameters = func_get_arg(0);
			$this->idShipTo = isset($parameters['idShipTo']) ? $parameters['idShipTo'] : null;
			$this->nameOfRecipient = isset($parameters['nameOfRecipient']) ? $parameters['nameOfRecipient'] : null;
			$this->address = isset($parameters['address']) ? $parameters['address'] : null;
			$this->city = isset($parameters['city']) ? $parameters['city'] : null;
			$this->country = isset($parameters['country']) ? $parameters['country'] : null;
		}
	}
	
	private static $rawShipTo = array(
			1=>	array(
					'idShipTo' => 1,
					'nameOfRecipient' => 'Raiko',
					'city' => 'pärnu',
					'country' => 'estonia'
	
			),
			2=>	array(
					'idShipTo' => 2,
					'nameOfRecipient' => 'Marten',
					'city' => 'pärnu',
					'country' => 'estonia'
	
			),
			3=>	array(
					'idShipTo' => 3,
					'nameOfRecipient' => 'Mann',
					'city' => 'pärnu',
					'country' => 'estonia'
	
			),
	);
//////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
///////////////////////////////////////////////////////
/////////////////////////////////////////////
	/**
	 * This function queries all the order persons and returns them in an autcomplete array
	 * if needed.
	*/
	public static function getListOfTypeShipTo($parameters){

		$structuredKeys = array();

		foreach (ShipTo::$rawShipTo as $idShipTo => $shipTo)
		{
			$object = new ShipTo();
			$object ->idShipTo = $idShipTo;
			$object ->setCompleteShipTo();
			$keys[] = $idShipTo;
			$title = sprintf(
					'%1$s, %2$s',
					$shipTo['nameOfRecipient'],
					$shipTo['city']
			);
			$structuredKeys[$idShipTo] = array (
					'id' => $idShipTo,
					'object' => $object,
					'title' => $title,
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
	/**
	 * This function sets the complete order person.
	 */
	public function setCompleteShipTo(){
		$rawShipTo = ShipTo::$rawShipTo;
		if (isset ($rawShipTo[$this->idShipTo]['nameOfRecipient'])){
			$this->setNameOfRecipient($rawShipTo[$this->idShipTo]['nameOfRecipient']);
		}
		if (isset ($rawShipTo[$this->idShipTo]['city'])){
			$this->setCity($rawShipTo[$this->idShipTo]['city']);
		}
		if (isset ($rawShipTo[$this->idShipTo]['country'])){
			$this->setCountry($rawShipTo[$this->idShipTo]['country']);
		}
	}
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
	/**
	 * This function adds a new ShipTo location.
	 */
	public function insert() {
		ShipTo::$rawShipTo[] = array (
			'idShipTo' => count(ShipTo::$rawShipTo),
			'nameOfRecipient' => $this->nameOfRecipient,
			'city' => $this->city,
			'country' => $this->country
		);
	}
	/**
	 * This function updates the ShipTo data.
	 */
	public function update() {
		OrderPerson::$rawShipTo[$this->idShipTo]['nameOfRecipient'] = $this->nameOfRecipient;
		OrderPerson::$rawShipTo[$this->idShipTo]['city'] = $this->city;
		OrderPerson::$rawShipTo[$this->idShipTo]['country'] = $this->country;
	}
	/**
	 * This function deletes ShipTo location.
	 */
	public function delete() {
		unset(ShipTo::$rawShipTo[$this->idShipTo]);
	}
}