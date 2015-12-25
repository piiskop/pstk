<?php
class LockMaster
{
	public function openLock($lock)
	{
		$lock->setIsLocked(false);
	}
}