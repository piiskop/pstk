<?php

namespace shiporder;

/**
 * This class describes orders.
 * 
 * @author 
 * @namespace shiporder
 */
 
class Order{		
	
	/**
	 * @access private
	 * @var string item´s name in order
	 * @author 
	 */
	
	private $field;


	/**
	 * setter for the item´s name in order
	 *  @author 
	 */
	
	public function setField($field){  
		$this->field = $field;
	}
	

	/**
	 * getter for the item´s name in order
	 *  @author 
	 */

	public function getField(){  
		return $this->field;
	}
	

	
}


