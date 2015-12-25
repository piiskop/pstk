<?php

class Lock
{
	//kas on lukus
	
	private $isLocked;
	
	public function setIsLocked($isLocked)
	{
		$this->isLocked = $isLocked;
	}
	public function getIsLocked()
	{
		return $this->isLocked;
	}
}
