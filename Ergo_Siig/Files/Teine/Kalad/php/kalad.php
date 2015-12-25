<?php

class kalad 
{

	private $idKala;
	public function setIdKala($idKala) 
	{
		$this->idKala = $idKala;
	}

	public function getIdKala() 
	{
		return $this->idKala;
	}

	private $name;
	public function getNimi() 
	{
		return $this->nimi;
	}

	public function setCompleteKalad() 
	{
		$Kalad = kalad::getKalad ();
		$this->nimi = $kalad [$this->idKala]->nimi;
	}
//Loob massiivi kalade kohta - koht kus võetakse kogu info
	public static function getKalad()
	{
		$kalad = array ();
		
		$kala = new Kalad ();
		$kala -> idKala   = 0;
		$kala -> nimi     = 'Siig';
		$kalad []         = $kala;
		
		$kala = new Kalad ();
		$kala -> idKala   = 1;
		$kala ->nimi      = 'Ahven';
		$kalad []         = $kala;
		
		$kala = new Kalad ();
		$kala -> idKala   = 2;
		$kala ->nimi       = 'Lõhe';
		$kalad []         = $kala;
		
		$kala = new Kalad ();
		$kala -> idKala   = 3;
		$kala ->nimi       = 'Kilu';
		$kalad []         = $kala;
		return $kalad;
	}
}