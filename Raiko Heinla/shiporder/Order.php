<?php


namespace  shiporder;
require_once '../Muu/settings.php';

class Order{
	private $field;
	/**
	 * function to set which field will be used
	 */
	public function setField($field){
		$this->field = $field;
	}
	/**
	 * function to retrieve order field id
	 *
	 * @var string $fieldt to the id of field
	 */
	public function getField(){
		return $this->field;
	}

	public function _construct(){
		if (func_num_args()>0){
			$parameters = func_get_arg(0);
			$this->field = isset($parameters['field']) ? $parameters['field'] : null;
		}
	}
}