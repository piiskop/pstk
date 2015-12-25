<?php

class BailiffHelper
{
	
	private $giveOrder;
	
	public function giveOrder($order){
		
		$this->giveOrder = $order;
	}
	public function getGiveOrder()
	{
		return $this->giveOrder;
	}

	private $fighting;
	
	public function isFighting($order){
	
		$this->fighting = $order;
	}
	public function getIsFighting()
	{
		return $this->fighting;
	}	

}
