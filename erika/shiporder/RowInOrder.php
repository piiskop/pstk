<?php

namespace shiporder;

/**
 * This class describes a row in order.
 * 
 * @author erika
 * @namespace shiporder
 */
class RowInOrder {
	/**
	 * @access private
	 * @var float $amount the amount ordered
	 */
	private $amount;
	/**
	 * the setter for the amount ordered
	 * 
	 * @access public
	 * @param float $amount the amount ordered
	 */
	public function setAmount ($amount) {
		$this->amount = $amount;
	}
	/**
	 * the getter for the amount ordered
	 * 
	 * @access public
	 * @return float
	 */
	public function getAmount() {
		return $this->amount;
	}
}