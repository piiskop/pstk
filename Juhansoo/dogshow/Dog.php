<?php
namespace dogshow;
require_once dirname(__FILE__) . '/Model.php';

/**
 * This method sets the participation view.
 *
 * @author Rasmus <juhansoo12@gmail.com>
 * @namespace dogshow
 */
class Dog extends Model {
	
	private static $dogs;
	public function getDogs() {
		return Dog::$dogs;
	}
	
	private $breed;
	public function setBreed($breed) {
		//viitab klassi koer põhjal tehtud koera omadusele
		$this->breed = $breed;
		return $this;
	}
	public function getBreed() {
		return $this->breed;
	}
	
	private $sex;
	public function setSex($sex) {
		$this->sex = $sex;
		return $this;
	}
	public function getSex() {
		return $this->sex;
	}
	
	private $birthDate;
	public function setBirthDate($birthDate) {
		$this->birthDate = $birthDate;
		return $this;
	}
	public function getBirthDate() {
		return $this->birthDate;
	}
	
	private $email;
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}
	
	//paneb massiivi lõppu käesoleva elemendi
	public function insert() {
		Dog::$dogs[] = $this;
	}
}