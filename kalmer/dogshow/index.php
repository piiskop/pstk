<?php
namespace dogshow;
require_once dirname(__FILE__) . '/Configuration.php';

class Controller {
	public static function start() {
		$target = isset($_GET['target']) ? $_GET['target'] : 'showForm';
		switch ($target) {
			case 'register':
				{
					require_once dirname(__FILE__) . '/ParticipationView.php';
					if (isset($_GET['idExhibition']) && $_GET['idExhibition'] > 0) {
						require_once dirname(__FILE__) . '/Dog.php';
						$dog = new Dog();
						$dog->setBreed('retriiver')
							->setGender('m')
							->setBirthDate('2000-12-21');
						require_once dirname(__FILE__) . '/Exhibition.php';
						$exhibition = new Exhibition();
						$exhibition->setId($_GET['idExhibition']);
						$exhibition->setCompleteExhibition();
						$exhibition->insertDog($dog);
						echo ParticipationView::buildMessage(
							array(
								'dog' => $dog,
								'exhibition' => $exhibition
							));
					}
					else {
						echo ParticipationView::buildErrorMessage();
					}
					break;
				}
			case 'showForm':
			default:
				{
					require_once dirname(__FILE__) . '/Exhibition.php';
					$exhibitions = Exhibition::getListOfTypeExhibitions();
					require_once dirname(__FILE__) . '/ParticipationView.php';
					echo ParticipationView::buildRegistrationForm(
						array(
							'exhibitions' => $exhibitions
						));
					break;
				}
		}
	}
}
Controller::start();