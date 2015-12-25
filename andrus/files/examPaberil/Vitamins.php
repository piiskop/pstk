<?php
/**
 * class vitamins
 * @author peeter
 *
 */
class Vitamins{
	/**
	 * c
	 * @var string
	 */
	//private $typeOfVitamins;
	private $id;
	private $idOfFoods = array();
	private $name;
	/**
	 * lisab toiduaine id vitaminile
	 * @param integer $idOfFood
	 */
	public function insertIdOfFoods($idOfFood) {
		$this->idOfFoods[$idOfFood] = $idOfFood;
	}
	/**
	 * toiduaine id'd
	 * @return int[int]
	 */
	public function getIdOfFooods(){
		$this->idOfFoods;
		return ($this->idOfFoods);
	}
	/**
	 * creating public get functin
	 * @return int
	 */
	public function setIdVit($id){
		$this->id = $id;
	}
	/**
	 * creating public get functin
	 * @return string
	 */
	public function getIdVit(){
		return ($this->id);
	}
	
	public function setVitName($name){
		$this->name = $name;
	}
	public function getVitName(){
		return ($this->name);
	}
	/**
	 * public function
	 * @return multitype:Vitamins
	 */
	public static function getVitamins(){
		$vitamin1 = new Vitamins();
		$vitamin1->setVitName('E');
		$vitamin1->setIdVit(1);
		
		$vitamin2 = new Vitamins();
		$vitamin2->setVitName('A');
		$vitamin2->setIdVit(2);
		
		$vitamin3 = new Vitamins();
		$vitamin3->setVitName('B6');
		$vitamin3->setIdVit(3);
		
		$vitaminsArray = array(
				1=>$vitamin1,
				2=>$vitamin2,
				3=>$vitamin3
		);
		return ($vitaminsArray);
	}
}