<?php
namespace dogshow;

class Model {
	
	//saan panna alaklassidele id
	private $id;
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getId() {
		return $this->id;
	}
}