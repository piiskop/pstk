<?php
class Lock
{
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