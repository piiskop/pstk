<?php
namespace  dog;
class Dog{
	private $dogs;
	public function getDogs(){
		return Dog::$dogs;
	}
	private $breed;
	public function setBreed($breed){
		$this->breed=$breed;
		return $this;
	}
	private $gender;
	public function setGender($gender){
		$this->gender=$gender;
		return $this;
	}
	private $birthDate;
	public function setBirthDate($birthDate){
		$this->birthDate=$birthDate;
		return $this;
	}
	public function insert(){
		Dog::$dogs[]=$this;
	}
}