<?php

namespace shiporder;

/**
 * This class describes orders.
 * 
 * @namespace shiporder
 */
 
class Order{		
	
	/**
	 * @access private
	 * @var string item´s name in order
	 */
	
	private $field;


	/**
	 * setter for the item´s name in order
	 */
	
	public function setField($field){  
		$this->field = $field;
	}
	

	/**
	 * getter for the item´s name in order
	 */

	public function getField(){  
		return $this->field;
	}
	

	
}


