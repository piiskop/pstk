<?php
class rebased { 
	private $pikkus;
	private $varvus;
	
	public function setpikkus($pikkus) {
		$this->pikkus = $pikkus;
	}
	public function getpikkus(){
		return $this->pikkus;
	}
	public function setvarvus($varvus) {
		$this->varvus = $varvus;
	}
	public function getvarvus(){
		return $this->varvus;
	}
}