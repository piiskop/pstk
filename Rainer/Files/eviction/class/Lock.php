<?php
/**
 *
 * @author andrus
 *luku staatus
 */

class Lock		//lukk
{
	private $isLocked;	//privaatne  on lukus
	/**
	* @access public
	* @param unknown $isLocked
	* lukku paneku kontroll
	*/

	public function setIsLocked($isLocked)	// avalik pane lukku
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
		return $this->isLocked;		// on lukus
	}
}