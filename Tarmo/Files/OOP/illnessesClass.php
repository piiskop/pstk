<?php 
class Illnesses {
	public $i_id;
	public $illnessName;
	public $isCurable;
	
	
	public function setIllness($newId, $newIllnessName, $newIsCurable){
		$this->i_id = $newId;
		$this->illnessName = $newIllnessName;
		$this->isCurable = $newIsCurable;
	}
	
	public function getIllnessId(){
		return $this->i_id;
	}
	
	public function getIllnessName(){
		return $this->illnessName;
	}
	
	public function getIsCurable(){
		return $this->isCurable;
	}
	
	
	public static function getIllnesses(){
		$illnessDesc1 = new Illnesses;
		$illnessDesc1->setIllness(1, "OCD", "Yes");
		$illnessDesc2 = new Illnesses;
		$illnessDesc2->setIllness(2, "Skitzophrenia", "No" );
		
		$illnessArray = array(
				1=> array(
					'ID' => 1,
					'Illness' => $illnessDesc1	
				),
				2 => array(
					'ID' => 2,
					'Illness' => $illnessDesc2	
				)
		);
		
		return $illnessArray;
	}	
}
?>