<?php
class Inimene {
	public function setEesnimi($eesnimi){
		$this-> eesnimi=$eesnimi;
		
	}
	public function setPerenimi ($perenimi){
		$this-> perenimi=($perenimi);
	}
	public function setSŁnniaeg ($sŁnniaeg){
		$this-> sŁnniaeg=($sŁnniaeg);
	}
	public function setSŁnnikoht ($sŁnnikoht){
		$this-> sŁnniaeg=($sŁnnikoht);
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
	public function getSŁnniaeg (){
		return $this-> sŁnniaeg;
	}
	public function getSŁnnikoht (){
		return $this-> sŁnnikoht;
	}
	public function getidInimene (){
		return $this-> idInimene;
	}
	public static  function getAll ()
	{
		$inimene=new Inimene;
		$inimene-> setEesnimi('Ants');
		$inimene-> setPerenimi('Kivisaar');
		$inimene-> setSŁnniaeg('02.12.1982');
		$inimene-> setSŁnnikoht('Antsla');
		$inimene-> setidInimene('1');
		
		$inimene2=new Inimene;
		$inimene2-> setEesnimi('Anu');
		$inimene2-> setPerenimi('Kiivikas');
		$inimene2-> setSŁnniaeg('08.02.1987');
		$inimene2-> setSŁnnikoht('Narva');
		$inimene2-> setidInimene('2');
		
		$inimene3=new Inimene;
		$inimene3-> setEesnimi('‹lle');
		$inimene3-> setPerenimi('Suurjalg');
		$inimene3-> setSŁnniaeg('09.09.1976');
		$inimene3-> setSŁnnikoht('Antsla');
		$inimene3-> setidInimene('3');
		return array (
				1=> $inimene,
				2=> $inimene2,
				3=> $inimene3
				
		);
	}
	private  $eesnimi;
	private  $perenimi;
	private  $sŁnniaeg;
	private  $sŁnnikoht;
	private  $idInimene;
}

