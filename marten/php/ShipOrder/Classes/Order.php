<?php
namespace shiporder;
class Order {
	private $shipToId;
	public function setshipToId($shipToId) {
		$this->shipToId = $shipToId;
	}
	public function getshipToId() {
		return $this->shipToId;
	}
	public function __construct() {
		if (func_num_args() > 0) {
			$parameters = func_get_arg(0);
			$this->shipToId = isset($parameters['shipToId']) ? $parameters['shipToId'] : null;
		}
	}
}