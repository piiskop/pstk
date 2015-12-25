<?php
/**
 *
 * @author peeter
 *kohtutäituri abi
 */

class HelperOfBailiff	//kohtutäituri abi
{
	/**
	 *
	 * @param boolean $owner
	 * @param boolean $lock
	 * @access public
	 * omaniku kohaloleku ja nõusoleku kontroll
	 */

	public function order($owner, $lock) //omaniku konrtoll
	{
		if ($owner->getIsPresent() && $owner->getAgrees()) //kui omanik on  ja ta on nõus, siis ava lukk
		{
			$lockMaster = new LockMaster();
			$lockMaster->openLock($lock);
		}
		else if (!$owner->getIsPresent())	// kui omanik puudub
		{
				
			if ($owner->getIsReachable() && $owner->getAgrees() || !$owner->getIsReachable())	//... kontrolli kas omanik on saadaval
			{																					// ja on nõus või ei ole saadaval
				$lockMaster = new LockMaster();
				$lockMaster->openLock($lock);	//lukumeister avab luku
			}
		}
	}
}