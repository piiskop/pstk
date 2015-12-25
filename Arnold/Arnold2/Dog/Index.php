<?php
namespace dog;
require_once dirname (__FILE__). '/Configuration.php';
class Controller{
	public static function start(){
	$target=isset($_GET['target']) ? $_GET['target']: 'showForm';//ielse if console.log showForm
	switch($target{
		case 'register':
			{
				require_once dirname (__FILE__). '/Dog.php';
				$dog=new Dog();
				$dog->setBreed($_POST['breed'])
				->setGender($_POST['gender']),
				->setBirthDate($_POST['birthDate']),
				require_once dirname (__FILE__). '';
			};
	})
		require_once dirname  (__FILE__). 'ParticipationView.php';
		echo ParticipationView::buildRegistrationForm();
	}
}
Controller::start();