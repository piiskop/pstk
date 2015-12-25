<?php

class Owner
{
	//kas omanik nõustub ukse avamisega
	
	private $agrees;

	public function setAgrees($agrees)
	{
		$this->agrees = $agrees;
	}
	public function getAgrees()
	{
		return $this->agrees;
	}

	//kas omanikuga saab kontakteeruda
	
	private $isContactable;
	
	public function setIsContactable($isContactable)
	{
		$this->isContactable = $isContactable;
	}
	public function getIsContactable()
	{
		return $this->isContactable;
	}	
	
	//kas kakleb	
	
	private $fighting;
	
	public function isFighting($order){
	
		$this->fighting = $order;
	}
	public function getIsFighting()
	{
		return $this->fighting;
	}
	
	//kas omanik on kohal
	
	private $isPresent;

	public function setIsPresent($isPresent)
	{
		$this->isPresent = $isPresent;
	}
	public function getIsPresent()
	{
		return $this->isPresent;
	}
	
	//kas omanikku on võimalik kätte saada
	
	private $isReachable;

	public function setIsReachable($isReachable)
	{
		$this->isReachable = $isReachable;
	}
	public function getIsReachable()
	{
		return $this->isReachable;
	}
}

