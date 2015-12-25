<?php
class RowinOrder{
	private $amount;
	public function __construct(){
		if (func_num_args()>0){
			$parameters = func_get_arg(0);
			$this->amount=isset($parameters['amount'])?$parameters['amount']:null;
		
		}
		
	}
	public function getAmount(){
		return $this->amount;
	}
	public function setAmount(){
		$this->amount=$amount;
	}
	
}
?>