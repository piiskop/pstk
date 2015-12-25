<?php
class Producer {
	private $nameOfProducer;
	public function setNameOfProducer($nameOfProducer) {
		$this->nameOfProducer = $nameOfProducer;
	}
	public function getNameOfProducer() {
		return $this->nameOfProducer;
	}
}
