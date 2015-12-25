<?php
require_once dirname(__FILE__) . '/settings.php';

/**
 * This class controls humans
 *
 * @author Rasmus <juhansoo12@gmail.com>
 *
 */
class HumanController
{
	/**
	 * This function does anything we want.
	 * Sometimes we want it to build something. Then, the result will be returned.
	 *
	 * @access public
	 * @author Rasmus <juhansoo12@gmail.com>
	 * @uses Human for human list
	 */
	public static function start() {
		require_once dirname(__FILE__) . '/Human.php';
		$john = new Human;
		$john->setName("John")->setAge(23);
		$mary = new Human;
		$mary->setName("Mary")->setAge(18);
		$bob = new Human;
		$bob->setName("Bob")->setAge(6);
		$people = array(
				$john, $mary, $bob
		);
		usort($people, array("Human", "compare"));
		echo "<pre>"; var_dump($people); "</pre>";
	}
}

HumanController::start();