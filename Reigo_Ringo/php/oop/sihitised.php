<?php

class kast {
	
	private $laius;
	public function setLaius($value){
		
		$this->laius = $value;		
	}	
	public function getLaius()
	{
		return $this->laius;
	}	
	
	private $korgus;
	public function setKorgus($value){
	
		$this->korgus = $value;
	}
	public function getKorgus()
	{
		return $this->korgus;
	}	
	
	private $materjal;
	public function setMaterjal($value){
	
		$this->materjal = $value;
	}
	public function getMaterjal()
	{
		return $this->materjal;
	}
/*
	private $maht;
	public function arvutaMaht($laius, $korgus){
		$maht = $laius * $korgus;
		//$this->materjal = $value;
		//return $this->maht;
		echo $maht;
	}
*/
}

$kastike = new kast();
$kastike->setLaius(0.6);
$kastike->setKorgus(0.5);
$kastike->setMaterjal('kasepuu');

echo $kastike->getLaius() . '<br/>' . $kastike->getKorgus() . '<br/>' . $kastike->getMaterjal() . '<br/>';

$kirst = new kast();
$kirst->setLaius('0.8 meetrit');
$kirst->setKorgus('2.1 meetrit');
$kirst->setMaterjal('mahagon');

echo $kirst->getLaius() . '<br/>' . $kirst->getKorgus() . '<br/>' . $kirst->getMaterjal() . '<br/>';

//$kastike->arvutaMaht(0.5, 0.6);
