<?php
namespace dogshow;
require_once dirname(__FILE__) . '/Model.php';

class Dog extends Model{
	private static $dogs;
	public function getDogs() {
		return Dog::$dogs;
	}
	private $breed;
	public function setBreed($breed) {
		$this->breed = $breed;
		return $this;
	}
	public function getBreed() {
		return $this->breed;
	}
	private $gender;
	public function setGender($gender) {
		$this->gender = $gender;
		return $this;
	}
	private $birthDate;
	public function setBirthDate($birthDate) {
		$this->birthDate = $birthDate;
		return $this;
	}
	public function insert() {
		Dog::$dogs[] = $this;
	}
}