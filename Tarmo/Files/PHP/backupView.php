<?php
require_once 'HTML/Template/IT.php';
$tmplt = new \HTML_Template_IT(dirname(__FILE__) . '/../HTML');
$tmplt->loadTemplatefile('backup.html');

require_once 'data.php';
if (isset($_GET ['id'])) {
	$getId = $_GET ['id'] - 1;
	foreach ($names as $data){
		$tmplt ->setCurrentBlock('TABLE');
		$tmplt ->setVariable(array(
		'Name' => $data['Name'],
		'ID' => $data['ID'],
		'Url' => $data['URL']));
		$tmplt ->parse('TABLE');
		echo '16: ';
}}
$tmplt->parse('backup');
echo $tmplt->get('backup');


?>