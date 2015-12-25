<?php
error_reporting ( E_ALL );

/**
 * untitledModel - class.Foods.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 30.05.2015, 09:09:13 with ArgoUML PHP module
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare ( PHP_VERSION, '5' )) {
	die ( 'This file was generated for PHP 5' );
}

/**
 * Short description of class Foods
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Foods {
	/**
	 * Short description of attribute id
	 *
	 * @access private
	 * @var Integer
	 */
	private $id;
	private $idOfVit = array();
	/**
	 * vitaminide id'd
	 * @return int[int]
	 */
	public function getIdOfVitamins(){
		$this->idOfVit;
		return ($this->idOfVit);
	}
	/**
	 * lisab toiduaine id vitaminile
	 * @param int $idOfVit
	 */
	public function insertIdOfVitamins($idOfVit){
		$this->idOfVit[$idOfVit] = $idOfVit;
	}
	/**
	 * Short description of attribute name
	 *
	 * @access private
	 * @var string
	 */
	private $name;
	/**
	 * Short description of method setId
	 *
	 * @access public
	 * @author peeter
	 * @param
	 *        	id
	 * @return mixed
	 * @version 1
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 * Short description of method getId
	 *
	 * @access public
	 * @author firstname and lastname of author, <author@example.org>
	 * @return mixed
	 */
	public function getId() {
		return ($this->id);
	}
	
	/**
	 * Short description of method setName
	 *
	 * @access public
	 * @author firstname and lastname of author, <author@example.org>
	 * @param
	 *        	name
	 * @return mixed
	 */
	public function setName($name) {
		$this->name = $name;
	}
	
	/**
	 * Short description of method getName
	 *
	 * @access public
	 * @author firstname and lastname of author, <author@example.org>
	 * @return mixed
	 */
	public function getName() {
		return ($this->name);
	}
	
	/**
	 * Short description of method getFoods
	 *
	 * @access public
	 * @author firstname and lastname of author, <author@example.org>
	 * @return mixed
	 */
	public static function getFoods() {
		$food1 = new Foods ();
		$food1->setName ( 'Astelpaju' );
		$food1->setId ( 1 );
		
		$food2 = new Foods ();
		$food2->setName ( 'Pihlakas' );
		$food2->setId ( 2 );
		
		$food3 = new Foods ();
		$food3->setName ( 'Kuusk' );
		$food1->setId ( 3 );
		
		$food4 = new Foods ();
		$food4->setName ( 'Rukola' );
		$food4->setId ( 4 );
		
		$food5 = new Foods ();
		$food5->setName ( 'Kaalikas' );
		$food5->setId ( 5 );
		
		$food6 = new Foods ();
		$food6->setName ( 'Avokaado' );
		$food6->setId ( 6 );
    	
    	$foodsArray = array(
    		1 => $food1,
    		2 => $food2,
    		3 => $food3,
    		4 => $food4,
    		5 => $food5,
    		6 => $food6
    	);
    	return ($foodsArray);
	}
}

?>