<?php

namespace shiporder;

/**
 * This class describes orders.
 * 
 * @author erika
 * @namespace shiporder
 */
 
class Order{		
	
	/**
	 * @access private
	 * @var string item´s name in order
	 * @author erika
	 */
	
	private $field;


	/**
	 * setter for the item´s name in order
	 *  @author erika
	 */
	
	public function setField($field){  
		$this->field = $field;
	}
	

	/**
	 * getter for the item´s name in order
	 *  @author erika
	 */

	public function getField(){  
		return $this->field;
	}
	

	
}


