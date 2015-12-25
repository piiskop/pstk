<?php
class HelperOfBailiff
{

	public function order($owner, $lock)
	{
		if ($owner->getIsPresent() && $owner->getAgrees())
		{
			$lockMaster = new LockMaster();
			$lockMaster->openLock($lock);
		}
		else if (!$owner->getIsPresent())
		{
				
			if ($owner->getIsReachable() && $owner->getAgrees() || !$owner->getIsReachable())
			{
				$lockMaster = new LockMaster();
				$lockMaster->openLock($lock);
			}
		}
	}
}