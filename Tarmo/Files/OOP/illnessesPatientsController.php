<?php
require_once 'patientsIllnessesClass.php';

$patientIllnessRelation1 = new patientsIllnesses;
$patientIllnessRelation1->setIllnessId(1);
$patientIllnessRelation1->setPatientId(1);
$patientIllnessRelation2 = new patientsIllnesses;
$patientIllnessRelation2->setIllnessId(1);
$patientIllnessRelation2->setPatientId(2);
$patientIllnessRelation3 = new patientsIllnesses;
$patientIllnessRelation3->setIllnessId(2);
$patientIllnessRelation3->setPatientId(2);

$relationArray = array(
		1 => $patientIllnessRelation1,
		2 => $patientIllnessRelation2, 
		3 => $patientIllnessRelation3
);

require_once 'patientsClass.php';
require_once 'illnessesClass.php';
$wantedPatients = Patients::getPatients();
$wantedPatient1 = $wantedPatients[$patientIllnessRelation2->getPatientId()];
$wantedPatientName1 = $wantedPatient1['Patient'] -> getPersonName();

$wantedIllnesses = Illnesses::getIllnesses();
$wantedIllness1 = $wantedIllnesses[$patientIllnessRelation2->getIllnessId()];
$wantedIllnessName1 = $wantedIllness1['Illness'] -> getIllnessName();

//echo $wantedPatientName1, $wantedIllnessName1;
echo '<br/>';
echo '<pre>wantedPatiens<br/>';
/*echo var_dump($patientIllnessRelation1);
*/echo var_dump($wantedPatients);
/*echo '<pre/>';
*/
/*foreach ($wantedPatients as $PatientId => $value ){
	foreach($wantedIllnesses as $IllnessId => $value2){
		echo $PatientId.$value['Patient'] -> getPersonName().$value2['Illness'] -> getIllnessName().'<br/>';

	
	}
}
*/
foreach ($relationArray as $key => $value){
	echo $value -> getPatientId(). $value -> getIllnessId(). '<br/>';
	
}

	
//echo $patientIllnessRelation2 -> getPatientId();
?>
