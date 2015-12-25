<?php
class RowInOrder {
	private $amount;
	private $method;
	
	public function setAmount($amount) {
		$this -> amount = $amount;
	}
	
	public function setMethod($method) {
		$this -> method = $method;
	}
	
	public function getAmount() {
		return $this -> amount;
	}
	
	public function getMethod(){
		return $this -> method;
	}
}