<?php
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