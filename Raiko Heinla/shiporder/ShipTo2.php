<?php
namespace shiporder;

/**
 * This class describes where to ship bought goods.
 *
 * @Author Raiko Heinla
 * 
 * @Namespace shipto
 */
require_once '../Muu/settings.php';

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
					'nameOfRecipient' => 'name1',
					'city' => 'pärnu',
					'country' => 'estonia'
	
			),
			2=>	array(
					'idShipTo' => 2,
					'nameOfRecipient' => 'name2',
					'city' => 'pärnu',
					'country' => 'estonia'
	
			),
			3=>	array(
					'idShipTo' => 3,
					'nameOfRecipient' => 'name3',
					'city' => 'pärnu',
					'country' => 'estonia'
	
			),
	);
	
public static function getListOfTypeShipTo($parameters){
	
		$structuredKeys = array();
		
		foreach (ShipTo::$rawShipTo1 as $idShipTo => $shipTo)
			{
			$object = new ShipTo();
			$object -> idShipTo = $idShipTo;
			$object -> setCompleteShipTo();
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
		if(isset($parameters['forAutoCompletion']))
		{
			$a[] = $values;
			$a[] = $keys;
			return  $a;
		}
		else
		{
			return  $structuredKeys;
		}	
	}
	
	public function setCompleteShipTo(){
		$rawShipTo = ShipTo::$rawShipTo1;
		if (isset($rawShipTo1[$this->idShipTo]['nameOfRecipient'])){
			$this->setNameOfRecipient($rawShipTo1[$this->idShipto]['nameOfRecipient']);
		}
		if (isset($rawShipTo1[$this->idShipTo]['city'])){
			$this->setCity($rawShipTo1[$this->idShipto]['city']);
		}	
		if (isset($rawShipTo1[$this->idShipTo]['country'])){
			$this->setCountry($rawShipTo1[$this->idShipto]['country']);
		}
	}
}