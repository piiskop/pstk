<?php
/**
 *
 * @author Tambet
 *luku olek
 */

class Lock		//lukk
{
	private $isLocked;	//privaatne (failisisene) on lukus
	/**
	* @access public
	* @param unknown $isLocked
	* lukku paneku kontroll
	*/

	public function setIsLocked($isLocked)	// pane lukku
	{
		$this->isLocked = $isLocked;		// on lukus
	}
	/**
	 * @access public
	 * @return unknown
	 * luku seisundi taastamine
	 */

	public function getIsLocked()	//mine lukku
	{
		return $this->isLocked;		//tagasta - see on lukus
	}
}