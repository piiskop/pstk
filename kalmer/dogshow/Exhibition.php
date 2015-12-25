<?php
namespace dogshow;
require_once dirname(__FILE__) . '/Model.php';

class Exhibition extends Model {
	private static $exhibitions;
	private $timestamp;
	public function setTimestamp($timestamp) {
		$this->timestamp = $timestamp;
		return $this;
	}
	public function getTimestamp() {
		return $this->timestamp;
	}
	private $location;
	public function setLocation($location) {
		$this->location = $location;
		return $this;
	}
	public function getLocation() {
		return $this->location;
	}
	private $dogs;
	public function setDogs($dogs) {
		$this->dogs = $dogs;
		return $this;
	}
	public function insertDog($dog) {
		$this->dogs[$dog->getId()] = $dog;
	}
	public static function getListOfTypeExhibitions() {
		$exhibition = new Exhibition();
		$exhibition->setId(1);
		$exhibition->timestamp = '2015-12-14 9:30:00';
		$exhibition->location = 'Tallinn';
		Exhibition::$exhibitions[1] = $exhibition;
		$exhibition = new Exhibition();
		$exhibition->setId(2);
		$exhibition->timestamp = '2015-12-15 10:0:00';
		$exhibition->location = 'Pärnu';
		Exhibition::$exhibitions[2] = $exhibition;
		$exhibition = new Exhibition();
		$exhibition->setId(3);
		$exhibition->timestamp = '2015-12-14 10:30:00';
		$exhibition->location = 'Eitea';
		Exhibition::$exhibitions[3] = $exhibition;
		return Exhibition::$exhibitions;
	}
	public function setCompleteExhibition() {
		Exhibition::getListOfTypeExhibitions();
		$id = $this->getId();
		$this->timestamp = Exhibition::$exhibitions[$id]->timestamp;
		$this->location = Exhibition::$exhibitions[$id]->location;
	}
}