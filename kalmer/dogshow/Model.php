<?php
namespace dogshow;

class Model {
	private $id;
	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
}