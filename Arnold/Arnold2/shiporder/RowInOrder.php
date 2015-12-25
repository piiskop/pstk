<?php
namespace shiporder;

/**
 * This class describes a row in order.
 * 
 * @author kalmer
 * @namespace shiporder
 */
class RowInOrder {
	/**
	 * @access private
	 * @author kalmer:piiskop
	 * @var float $amount the amount ordered
	 */
	private $amount;
	/**
	 * the setter for the amount ordered
	 * 
	 * @access public
	 * @author kalmer:piiskop
	 * @param float $amount the amount ordered
	 */
	public function setAmount ($amount) {
		$this->amount = $amount;
	}
	/**
	 * the getter for the amount ordered
	 * 
	 * @access public
	 * @author kalmer:piiskop
	 * @return float
	 */
	public function getAmount() {
		return $this->amount;
	}
}