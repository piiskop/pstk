<?php
namespace  shiporder;

require_once '../Muu/settings.php';

class RowInOrder{
	private $amount;
	/**
	 * function to set amount of rows
	 */
	public function setAmount($amount){
		$this->amount = $amount;
	}
	/**
	 * function to retrieve amount of rows
	 *
	 * @var string $amount to the amount of rows
	 */
	public function getAmount(){
		return $this->amount;
	}
	
	public function _construct(){
		if (func_num_args()>0){
			$parameters = func_get_arg(0);
			$this->amount = isset($parameters['amount']) ? $parameters['amount'] : null;
		}
	}
}