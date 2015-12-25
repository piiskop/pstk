<?php
/**
 * This class describes all countries that produce Tv series.
 * @author martinmb
 *
 */
class Country {
	/**
	 * 
	 * @var integer the id of the country.
	 */
	private $id;
	public function setId($id) {
		$this->id = $id;
	}
	/**
	 * returns the id of the country.
	 */
	public function getId() {
		return $this->id;
	}
	/**
	 * 
	 * @var string the name of the country
	 */
	private $name;
	public function setName($name) {
		$this->name = $name;
	}
	/**
	 * 
	 * @return string returns the name of the country.
	 */
	public function getName() {
		return $this->name;
	}
	/**
	 * 
	 * @return multitype:Country creates an array of all the data a country has.
	 */
	public static function getCountries() {
		$countries = array ();
		$country = new Country ();
		$country->setId ( 1 );
		$country->setName ( 'America' );
		$countries [$country->getId ()] = $country;
		
		$country2 = new Country ();
		$country2->setId ( 2 );
		$country2->setname ( 'Germany' );
		$countries [$country2->getId ()] = $country2;
		
		return $countries;
	}
	
	/**
	 * 
	 * @var unknown 
	 */
	private $idsOfTvSeries = array();
	public function insertIdsOfTvSeries ($idOfTvSeries){
		$this->idsOfTvSeries[$idOfTvSeries]=$idOfTvSeries;
		
	}
	/**
	 * 
	 * @return unknown 
	 */
	public function idsOfTvSeries () {
		return $this->idsOfTvSeries;
		
	}
}







