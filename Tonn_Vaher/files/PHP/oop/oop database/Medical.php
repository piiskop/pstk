<?php

class Medical {
	/**
	 * @access private
	 * @var integer the ID of the medical benfit
	 */
	private $idMedical;
	/**
	 * @access private
	 * @var integer the medical benfit
	 */
	private $benefit;
	private $idOfPlant = array();
	/**
	 * the setter for the ID of the medical benefit
	 *
	 * @access public
	 * @param integer $idMedical the ID of the medical benefit
	 */
	public function setIdMedical($idMedical) {
		$this->idMedical = $idMedical;
	}
	/**
	 * @param integer $idOfPlant
	 */
	public function insertIdOfPlant($idOfPlant) {
		$this->idOfPlant[$idOfPlant] = $idOfPlant;
	}
	/**
	 * medical id's
	 * @return int[int]
	 */
	public function getIdOfPlant(){
		return $this->idOfPlant;
	}
	/**
	 * the getter of the medical ID
	 *
	 * @access public
	 * @return integer
	 */
	public function getIdMedical(){
		return $this->idMedical;
	}	
	/**
	 * the setter of the benefit
	 *
	 * @access public
	 * @return string
	 */
	public function setBenefit($benefit) {
		$this->benefit = $benefit;
	}
	/**
	 * the getter of the benefit
	 *
	 * @access public
	 * @return string
	 */
	public function getBenefit(){
		return $this->benefit;
	}	
	/**
	 * get all medical sets
	 * 
	 * @access public
	 * @return array all medical sets
	 */
	public static function getMedicals() {
		/**
		 * array all medical sets
		 */
		$medicals = array ();
		
		$medical1 = new Medical ();
		$medical1->setIdMedical(1);
		$medical1->setBenefit("bloating");
		$medicals [$medical1->getIdMedical ()] = $medical1;
		
		$medical2 = new Medical();
		$medical2->setIdMedical(2);
		$medical2->setBenefit("vomiting");
		$medicals [$medical2->getIdMedical ()] = $medical2;
		
		$medical3 = new Medical();
		$medical3->setIdMedical(3);
		$medical3->setBenefit("headache");
		$medicals [$medical3->getIdMedical ()] = $medical3;
		
		return $medicals;
	}
}
$vomiting = array();
$medicals = new Medical();

require 'Plant.php';


foreach ($medicals->getMedicals() as $idMedical => $medical) {
	if ($medical->getBenefit() == "vomiting") {
		$vomiting[] = $medical->getIdMedical();
	}
}

foreach ($vomiting as $vomit) {
	echo "Vomiting ID on: ".$vomit."<br/>";
} 
