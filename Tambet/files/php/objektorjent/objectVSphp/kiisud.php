<?php
class kiisud {
	private $karv;
	private $silm;
		
	public function setKarv($karv) {
		$this->karv = $karv;
	}
	public function getKarv(){
		return $this->karv;
	}
	public function setSilm($silm) {
		$this->silm = $silm;
	}
	public function getSilm(){
		return $this->silm;
	}
}