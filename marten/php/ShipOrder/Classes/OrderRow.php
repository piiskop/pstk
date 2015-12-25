<?php
namespace shiporder;
class OrderRow {
	private $amount;
	public function setamount($amount) {
		$this->amount = $amount;
	}
	public function getamount() {
		return $this->amount;
	}
	public function __construct() {
		if (func_num_args() > 0) {
			$parameters = func_get_arg(0);
			$this->amount = isset($parameters['amount']) ? $parameters['amount'] : null;
		}
	}
}