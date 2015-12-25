<?php

/**
 * This class describes items row in the order.
 *
 *
 */
class RowInOrder{
	/**
	 * 
	 * @var float $amount the amount of the item in order 
	 */
	private $amount;

	public function setAmount($amount) {
		$this->amount = $amount;

	}
	public function getAmount() {
		return $this->amount;
	}
	
	public function __construct() {
		if (func_num_args() > 0){
			$parameters = func_get_arg(0);
			$this->amount = isset($parameters['amount']) ? $parameters['amount'] : null;
			
		}
	
	
	}
	}
	
	

