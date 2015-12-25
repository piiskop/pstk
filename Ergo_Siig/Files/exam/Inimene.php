<?php
/**tegin klassi inimene
 * klass inimene, millel omadus eesnimi ja perenimi
 * 
 * @author tambet
 *        
 */
class Inimene {
	
	private $id;
	private $eesnimi;
	private $perenimi;
	
	
	public function setPerenimi($perenimi) {
		$this->perenimi = $perenimi;
	}
	public function getPerenimi(){
		return $this->perenimi;
	}	
	
	public function setEesnimi($eesnimi) {
		$this->eesnimi = $eesnimi;
	}	
	public function getEesnimi(){
		return $this->eesnimi;
	}	
	
	public function setId($id) {
		$this->id = $id;
	}	
	public function getId(){
		return $this->id;
	}
}
