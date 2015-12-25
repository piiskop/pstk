<?php
class Model{
	private $id;
	private $firstName;
	private $lastName;
	private $coder;
	public  function setId($id){
		$this->id=$id;
	}
	public function setLastName($lastName){
		$this->lastName=$lastName;
	}
	
	public function setFirstName($firstName){
		$this->firstName=$firstName;
	}
	
	public function setCoder($coder) {
		$this->coder=$coder;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getFirstName() {
		return $this->firstName;
	}
	
	public function getLastName(){
		return $this->lastName;
	}
	
	public function getCoder(){
		return $this->coder;
	}
}