<?php 
/**
 * describes patients data
 * @author Tarmo
 */
class Patients {
	/**
	 * @var integer patients id 
	 */
	private $p_id;
	/**
	 * @var string patients name
	 */
	private $name; 
	/**
	 * 
	 * @var integer patients age
	 */
	private $age;
	/**
	 * 
	 * @var string patients gender
	 */
	private $gender;
	
	/**
	 * patients cnstructor
	 * @param integer $newId new id
	 * @param string $newName new name
	 * @param integer $newAge new age
	 * @param string $newGender new gender
	 */
	public function setPerson($newId, $newName, $newAge, $newGender) {	
		$this->p_id = $newId;
		$this->name = $newName;
		$this->age = $newAge;
		$this->gender = $newGender;
	}
	
	/**
	 * patients ID getter
	 * @return integer p_id
	 */
	public function getPersonId(){
		return $this->p_id;
	}
		
	/**
	 * patients name getter
	 * @return string name
	 */
	public function getPersonName(){
		return $this->name;
	}
	/**
	 * patients age getter
	 * @return integer age
	 */
	public function getPersonAge(){
		return $this->age;
	}
	/**
	 * patients gender getter
	 * @return string gender
	 */
	public function getPersonGender(){
		return $this->gender;
	}
	
	/**
	 * getter for patients array
	 * @return integer|Patients[string][integer]
	 */
	
	public static  function getPatients(){
		$person1 = new Patients;
		$person1->setPerson(1, "John", 67, "Male");
		$person2 = new Patients;
		$person2->setPerson(2, "Mary", 75, "Female");
		
		$patientArray = array(
				1 => array(
					'ID' => 1,
					'Patient' => $person1
				),
				2 => array(
					'ID' => 2,
					'Patient' => $person2	
				)	
				
		);
		return $patientArray;
		
	}

}
//$obj = new Patients; // storing class in a variable using 'new'

?>