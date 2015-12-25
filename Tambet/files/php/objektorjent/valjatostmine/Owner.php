<?php
/**
 *
 * @author Tambet
 *omanik
 */

class Owner	//omanik
{
	private $agrees;	// kas on nõus.
	/**
	* @access public
	* @param boolean $agrees
	* omaniku nõusolek
	*/

	public function setAgrees($agrees)	//avalik nõusoleku määramine
	{
		$this->agrees = $agrees;	// on nõus
	}
	/**
	 * @access public
	 * @return boolean
	 * nõusoleku kontroll
	 */

	public function getAgrees()	// nõusoleku andmine
	{
		return $this->agrees;	//nõus
	}
	private $isPresent;	// komaniku kohalolek
	/**
	* @access public
	* @param boolean $isPresent
	* kohaloleku määramine
	*/

	public function setIsPresent($isPresent) //kohaloleku määramine
	{
		$this->isPresent = $isPresent;	//on kohal
	}
	/**
	 * omaniku kohaloleku kontroll
	 * @return boolean
	 */

	public function getIsPresent()	//On kohal
	{
		return $this->isPresent;	//see omanik esindatud
	}

	private $isReachable;	//omanik on kätte saadav

	/**
	 *
	 * @param boolean $isReachable
	 * omanik on kätte saadav
	 */
	public function setIsReachable($isReachable)	//on saadaval
	{
		$this->isReachable = $isReachable; // see omanik on saadaval
	}

	public function getIsReachable()	//omanik saadaval
	{
		/**
		 * kontroll, kas omanik on leitav
		 */
		return $this->isReachable;
	}
}