<?php
/**
 * @access public
 * @author peeter
 *omaniku klass
 */

class Owner	//omanik
{
	private $agrees;	//failisisene nõusolek
	/**
	* @access public
	* @param boolean $agrees
	* omaniku nõusolek
	*/

	public function setAgrees($agrees)	//avalik nõusoleku määramine
	{
		$this->agrees = $agrees;	// omanik on nõus
	}
	/**
	 * @access public
	 * @return boolean
	 * omaniku nõusoleku kontroll
	 */

	public function getAgrees()	// avalik nõosolekut andma
	{
		return $this->agrees;	//nõusolek
	}
	private $isPresent;	// failisisene omaniku esintamine
	/**
	* @access public
	* @param boolean $isPresent
	* omaniku kohaloleku määramine
	*/

	public function setIsPresent($isPresent) //omaniku kohaloleku määramine
	{
		$this->isPresent = $isPresent;	//see omanik on kohal
	}
	/**
	 * omaniku kohaloleku kontroll
	 * @return boolean
	 */

	public function getIsPresent()	//kohal viibimine
	{
		return $this->isPresent;	//on esindatud
	}

	private $isReachable;	//omanik on leitav

	/**
	 *
	 * @param boolean $isReachable
	 * omanik on leitav
	 */
	public function setIsReachable($isReachable)	//omanik saadavaks
	{
		$this->isReachable = $isReachable;
	}

	public function getIsReachable()	//omanik leitav
	{
		/**
		 * kontroll, kas omanik on leitav
		 */
		return $this->isReachable;
	}
}