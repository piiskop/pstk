<?php
class LockMaster
{
	/**
	 * @access public
	 * @param variable $lock
	 * luku oleku määramine
	 */

	public function openLock($lock)	//ava lukk
	{
		$lock->setIsLocked(false);	//lukku
	}
}