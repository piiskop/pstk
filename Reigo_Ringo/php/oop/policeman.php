<?php

class Policeman
{
	//kas on lukus

	private $interferes;

	public function setInterferes($isLocked)
	{
		$this->interferes = $isLocked;
	}
	public function getInterferes()
	{
		return $this->interferes;
	}
}
