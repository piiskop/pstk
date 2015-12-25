<?php
class Order {
	private $field;
	private $method;
	
	public function setField($field) {
		$this -> field = $field;
	}
	
	public function setMethod($method) {
		$this -> method = $method;
	}
	
	public function getField() {
		return $this -> field;
	}
	
	public function getMethod() {
		return $this -> method;
	}
}