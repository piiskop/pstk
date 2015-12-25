<?php

class Plant {
	/**
	 * @access private
	 * @var integer the ID of the plant
	 */
	private $idPlant;
	private $name;
	private $idOfMedicals = array();
	
	public function setIdPlant($idPlant) {
		$this->idPlant = $idPlant;
	}
	public function getIdPlant(){
		return $this->idPlant;
	}
	public function insertIdOfMedical($idOfMedicals) {
		$this->idOfMedicals[$idOfMedicals] = $idOfMedicals;
	}
	public function getIdOfMedicals(){
		return $this->idOfMedicals;
	}
	public function setName($name) {
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
	
	public static function getPlants() {
		$plants = array ();
	
		$plant1 = new Plant ();
		$plant1->setIdPlant(1);
		$plant1->setName("Lemon Balm");
		$plants [$plant1->getIdPlant ()] = $plant1;
	
		$plant2 = new Plant();
		$plant2->setIdPlant(2);
		$plant2->setName("Bay Laurel");
		$plants [$plant2->getIdPlant ()] = $plant2;
	
		$plant3 = new Plant();
		$plant3->setIdPlant(3);
		$plant3->setName("Tarragon");
		$plants [$plant3->getIdPlant ()] = $plant3;
	
		return $plants;
	}
	
	
}