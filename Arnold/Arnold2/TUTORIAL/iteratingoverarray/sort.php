<?php
/**
 * 
 * @author Arnold
 *class Human
 */
class Human {
	private $name;
	private $age;
/**
 * in this function we set name and age
 * @param unknown $name
 */	
	public function setName($name){
		$this->name=$name;
		
	}
	public function setAge($age){
		$this->age=$age;
	}
/**
 * in this function we return name and age what we set/gave
 */	
	public function getName(){
		return $this->name;
	}
	public function getAge(){
		return $this->age;
	}
/**
 * in this function we compare ages of human1 and human 2
 * @param unknown $human1
 * @param unknown $human2
 */	
	public static function compare($human1,$human2){
		if($human1.getAge() > $human2.getAge()){
			return 1;
		}
		else if ($human1.getAge() < $human2.getAge() ){
		return -1;
		}
		else{
			return 0;
		}
		
	}
};

	