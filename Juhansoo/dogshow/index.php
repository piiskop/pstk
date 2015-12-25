<?php
namespace dogshow;
require_once dirname(__FILE__) . '/Configuration.php';

//1. näitab registreerimisvormi
//2. sisestatud vormi andmed postitatakse
/**
 * This method sets the controller.
 *
 * @author Rasmus <juhansoo12@gmail.com>
 * @namespace dogshow
 */
// class Controller {
	
// 	//avalik meetod
// 	public static function start() {
//		//http://localhost/pstk/Juhansoo/dogshow/?target=register&idExhibition=1&breed=retriiver
// 		$target = isset($_GET['target']) ? $_GET['target'] : 'showForm';
// 		switch($target) {
// 			case 'register':
// 				{
// 					require_once dirname(__FILE__) . '/ParticipationView.php';
// 					if(isset($_GET['idExhibition']) && $_GET['idExhibition'] > 0) {
// 						require_once dirname(__FILE__) . '/Dog.php';
// 						$dog = new Dog;
// 						$dog->setBreed('retriiver')
// 							->setSex('m')
// 							->setBirthDate('2006-12-21');
// 						require_once dirname(__FILE__) . '/Exhibition.php';
// 						$exhibition = new Exhibition();
// 						$exhibition->setId($_GET['idExhibition']);
// 						$exhibition->setCompleteExhibition();
// 						$exhibition->insertDog($dog);
// 					}
// 					else {
// 						echo ParticipationView::buildErrorMessage();
// 					}
// 					echo ParticipationView::buildMessage(array (
// 						'breed' => $dog,
// 						'location' => $exhibition
// 					));
// 					break;
// 				}
// 			case 'showForm':
// 			default:
// 				{
// 					require_once dirname(__FILE__) . '/Exhibition.php';
// 					$exhibitions = Exhibition::getListOfTypeExhibitions();
// 					require_once dirname(__FILE__) . '/ParticipationView.php';
// 					echo ParticipationView::buildRegistrationForm(array ('exhibitions' => $exhibitions));
// 					break;
// 				}
// 		}
// 	}
// }

// Controller::start();




require_once dirname(__FILE__) . '/Exhibition.php';
//lõin muutuja (mis on objekt) exhibition1, millel on omadused ja funktsioonid, mis on määratud klassis Exhibition
$exhibition1 = new Exhibition;
$exhibition1->setId(1);
$exhibition1->setLocation('Pärnu');
$exhibition1->setTimestamp('2015-12-30 09:00:00');
$exhibition2 = new Exhibition;
$exhibition2->setId(2);
$exhibition2->setLocation('Tallinn');
$exhibition2->setTimestamp('2015-12-20 10:00:00');
Exhibition::insertExhibition($exhibition1);
Exhibition::insertExhibition($exhibition2);
$exhibition1->setLocation('Tartu');
echo '<pre>'; var_dump(Exhibition::getExhibitions()); echo '</pre>';
require_once dirname(__FILE__) . '/Dog.php';
$dog1 = new Dog;
$dog1->setId(1);
$dog1->setBreed('retriiver');
$dog1->setBirthDate('2014-12-30 09:00:00');
$dog2 = new Dog;
$dog2->setId(2);
$dog2->setBreed('labrador');
$dog2->setBirthdate('2013-12-20 10:00:00');
//käivitatakse dog1 küljes olev funktsioon insert 
$dog1->insert();
$dog2->insert();

echo '<pre>'; var_dump($_GET); echo '</pre>';