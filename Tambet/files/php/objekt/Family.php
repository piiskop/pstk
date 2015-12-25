<?php
/**
 * this class describes familys
 *
 * @author kalmer
 *        
 */
class Family {
	/**
	 *
	 * @access private
	 * @author tambet
	 * @var int id of the family
	 */
	private $idFamily;
	/**
	 * the setter for the <code>idFamily</code>
	 *
	 * @access private
	 * @author tambet
	 * @param int $idFamily
	 *        	id of the family
	 */
	public function setIdFamily($idFamily) {
		$this->idFamily = $idFamily;
	}
	
	/**
	 * the getter of the id of Family
	 *
	 * @access privat
	 * @author tambet
	 * @return int
	 */
	public function getIdFamily() {
		return $this->idFamily;
	}
	/**
	 *
	 * @access private
	 * @author tambet
	 * @var string name
	 */
	private $name;
	/**
	 * the getter of the name
	 *
	 * @access privat
	 * @author tambet
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * this function completes te family
	 *
	 * @author tamet
	 * @access pubic
	 */
	public function setCompleteFamily() {
		$familys = Family::getFamilys();
		$this->name = $familys[$this->idFamily]->name;
	}
	
	/**
	 * this function makes the family list
	 *
	 * @access public
	 * @author tambet
	 * @return multitype:Family
	 */
	public static function getFamilys() {
		$familys = array ();
		
		$family = new Family();
		$family->idFamily=0;
		$family->name = 'Song';
		$familys[] = $family;
		
		$family = new Family();
		$family->idFamily=1;
		$family->name = 'Tenusaar';
		$familys[] = $family;
		
		$family = new Family();
		$family->idFamily=2;
		$family->name = 'Rootlane';
		$familys[] = $family;
		
		$family = new Family();
		$family->idFamily=3;
		$family->name = 'Eiütle';
		$familys[] = $family;
		return $familys;
	}
}