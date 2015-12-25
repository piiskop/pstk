<?php
class Person {
	private $idPerson;
	
	public function setIdPerson($idPerson) {
		$this->idPerson = $idPerson;
	}
	
	public function getIdPerson() {
		$this->idPerson = $idPerson;
	}
	private $name;
	
	public function getName() {
		return $this->name;
	}
	
	public function setCompletePerson()	{
		$persons = Person::getPersons();
		$this->name = $persons[$this->idPerson]->name;
	}
	public static function getPersons() {
		$persons = array();
		
		$person = new Person();
		$person->name = 'Meelis';
		$persons[] = $person;
		
		$person = new Person();
		$person->name = 'Andres';
		$persons[] = $person;
		
		return $persons;
	}
}
