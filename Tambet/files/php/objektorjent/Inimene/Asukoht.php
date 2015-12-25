<?php 
class Asukoht {
	
	private $id;
	private $asukoht;
	private $inimesed=array();
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setAsukoht($asukoht) {
		$this->asukoht = $asukoht;
	}
	
	public function getAsukoht(){
		return $this->asukoht;
	}
	public function insertInimene($inimene){
		$this->inimesed[$inimene->getId()]=$inimene;
	}
	public function setInimesed($inimesed) {
		$this->inimesed = $inimesed;
	}
	public function getInimesed(){
		return $this->inimesed;
	}
	
}

?>