<?php
namespace dog;
require_once dirname(__FILE__). '/Model.php';
class Exhibition extends Model{
	private static $exhibitions;
	private $timestamp;
	public function setTimeStamp($timestamp){
		$this->timestamp= $timestamp;
		return $this;
	}
	private $location;
	public function setLocation($location){
		$this->location= $location;
		return $this;
	}
	private $dogs;
	public function setDogs($dogs){
		$this->dogs= $dogs;
		return $this;
	}
	public static function getListOfTypeExhibitions(){
		$exhibition=new excebition();
		$exhibition->setId(1);
		$exhibition->timestamp='2015-12-14 9:30:00';
		$exhibition->location='Tallinn';
		Exhibition::$exhibitions(1)=$exhibition;
		$exhibition=new excebition();
		$exhibition->setId(2);
		$exhibition->timestamp='2015-12-14 10:00:00';
		$exhibition->location='Parnu';
		Exhibition::$exhibitions(2)=$exhibition;
		$exhibition=new excebition();
		$exhibition->setId(3);
		$exhibition->timestamp='2015-12-14 9:30:00';
		$exhibition->location='Tartu';
		Exhibition::$exhibitions(3)=$exhibition;
		
	}
	public function setCompleteExhibitions(){
		$exhibition= new Exhibition();
		$exhibition->setId(1);
		$exhibition->timestamp= '2015-12-14 9:30:00';
	}
}