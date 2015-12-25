<?php

/**
 * Created on 17.04.2015
 *
 * @copyright Copyright &copy; 2015, Kalmer Piiskop <pandeero@gmail.com>
 */
class LockMaster
{

	public function openLock($lock)
	{
		$lock->setIsLocked(false);
	}
}

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

class Owner
{
	private $agrees;

	public function setAgrees($agrees)
	{
		$this->agrees = $agrees;
	}

	public function getAgrees()
	{
		return $this->agrees;
	}
	private $isPresent;

	public function setIsPresent($isPresent)
	{
		$this->isPresent = $isPresent;
	}

	public function getIsPresent()
	{
		return $this->isPresent;
	}
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

$owner = new Owner();
$owner->setIsPresent(true);
$owner->setAgrees(false);

$lock = new Lock();
$lock->setIsLocked(true);

$helperOfBailiff = new HelperOfBailiff();
$helperOfBailiff->order($owner, $lock);

echo ' 100: Kas uks on lukus?', $lock->getIsLocked();

