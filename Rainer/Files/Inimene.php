<?php
class Inimene {
	public function setEesnimi($eesnimi){
		$this-> eesnimi=$eesnimi;
		
	}
	public function setPerenimi ($perenimi){
		$this-> perenimi=($perenimi);
	}
	public function setSünniaeg ($sünniaeg){
		$this-> sünniaeg=($sünniaeg);
	}
	public function setSünnikoht ($sünnikoht){
		$this-> sünniaeg=($sünnikoht);
	}
	public function setidInimene ($setidInimene){
		$this-> idInimene=($setidInimene);
		
		
	}
	
	public function getEesnimi(){
	return $this-> $eesnimi;
	
	}
	public function getPerenimi (){
		return $this-> perenimi;
	}
	public function getSünniaeg (){
		return $this-> sünniaeg;
	}
	public function getSünnikoht (){
		return $this-> sünnikoht;
	}
	public function getidInimene (){
		return $this-> idInimene;
	}
	public static  function getAll ()
	{
		$inimene=new Inimene;
		$inimene-> setEesnimi('Ants');
		$inimene-> setPerenimi('Kivisaar');
		$inimene-> setSünniaeg('02.12.1982');
		$inimene-> setSünnikoht('Antsla');
		$inimene-> setidInimene('1');
		
		$inimene2=new Inimene;
		$inimene2-> setEesnimi('Anu');
		$inimene2-> setPerenimi('Kiivikas');
		$inimene2-> setSünniaeg('08.02.1987');
		$inimene2-> setSünnikoht('Narva');
		$inimene2-> setidInimene('2');
		
		$inimene3=new Inimene;
		$inimene3-> setEesnimi('Ülle');
		$inimene3-> setPerenimi('Suurjalg');
		$inimene3-> setSünniaeg('09.09.1976');
		$inimene3-> setSünnikoht('Antsla');
		$inimene3-> setidInimene('3');
		return array (
				1=> $inimene,
				2=> $inimene2,
				3=> $inimene3
				
		);
	}
	private  $eesnimi;
	private  $perenimi;
	private  $sünniaeg;
	private  $sünnikoht;
	private  $idInimene;
}

