<?php
require_once 'settings.php';
class Controller{
	
	public static function start(){
		require_once dirname(__FILE__) . '/PupilView.php';
		$name=Controller::test_input($_GET["name"]);
		PupilView::buildView(array("name"=>$name));
	
		
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}
Controller::start();