<?php

class LockSmith
{
	private $openLock;
	
	public function openLock($isLocked)
	{
		$this->openLock = $isLocked;
	}
	public function getOpenLock()
	{
		return $this->openLock;
	}	
		
}
