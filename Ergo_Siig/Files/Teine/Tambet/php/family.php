<?php
/**
 * @access private
 * @author Ergo
 * @var integer id of the family
 */
class family {
	/**
	 *
	 * @access private
	 * @author Ergo
	 * @var integer id of the family
	 */
	private $idfamily;
	/**
	 * @setter for the <code>idFamily</code>
	 * 
	 * @access private
	 * @author Ergo
	 * @param int $idFamily
	 *        	id of the family
	 */
	public function setIdFamily($idFamily) {
		$this->idFamily = $idFamily;
	}
	/**
	 * @the getter of the Family
	 *
	 * @access private
	 * @author Ergo
	 * @param
	 *        	string
	 */
	public function getIdFamily() {
		return $this->idFamily;
	}
	/**
	 *
	 * @access private
	 * @author Ergo
	 * @var string name
	 */
	private $name;
	/**
	 * @the getter of the name
	 * 
	 * @access private
	 * @author Ergo
	 * @param
	 *        	string
	 */
	public function getName() {
		return $this->name;
	}
	/**
	 * This function complites the family
	 * 
	 * @access public
	 * @author Ergo
	 */
	public function setCompleteFamily() {
		$familys = family::getFamilys ();
		$this->name = $familys [$this->idFamily]->name;
	}
	/**
	 * this function makes family list
	 * 
	 * @access public
	 * @ author Ergo
	 * @return multitype:Family
	 */
	public static function getFamilys() {
		$familys = array ();
		
		$family = new Family ();
		$family -> idFamily = 0;
		$family -> name     = 'Siig';
		$familys []         = $family;
		
		$family = new Family ();
		$family -> idFamily = 1;
		$family ->name      = 'Kusta';
		$familys []         = $family;
		
		$family = new Family ();
		$family -> idFamily = 2;
		$family->name       = 'Kull';
		$familys []         = $family;
		
		$family = new Family ();
		$family -> idFamily = 3;
		$family ->name      = 'Rõivas';
		$familys []         = $family;
		return $familys;
	}
}