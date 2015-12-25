<?php
namespace students;
require_once dirname(__FILE__) . '/Model.php';

/**
 * This class describes the pupil.
 *
 * @author Rasmus <juhansoo12@gmail.com>
 * @namespace students
 */
class Pupil extends \students\Model
{

	/**
	 * raw pupils
	 *
	 * @access private
	 * @author Rasmus <juhansoo12@gmail.com>
	 */
	private static $rawPupils = array(
		1 => array(
				'firstName' => 'kaire',
				'lastName' => 'ojastu'
		),
		2 => array(
				'firstName' => 'raiko',
				'lastName' => 'ojaste'
		),
		3 => array(
				'firstName' => 'eleri',
				'lastName' => 'apsolon'
		),
		4 => array(
				'firstName' => 'sander',
				'lastName' => 'mets'
		),
		5 => array(
				'firstName' => 'maarika',
				'lastName' => 'erika'
		),
		6 => array(
				'firstName' => 'kristen',
				'lastName' => 'aeg'
		),
		7 => array(
				'firstName' => 'keijo',
				'lastName' => 'palts'
		),
		8 => array(
				'firstName' => 'ingmar',
				'lastName' => 'nurmiste'
		),
		9 => array(
				'firstName' => 'ženja',
				'lastName' => 'fokin'
		)
	);

	/**
	 * @access private
	 * @var string lastname of student
	 */
	private $lastName;

	/**
	 * the getter for the URL of the home page
	 *
	 * @access public
	 * @return string lastname of student
	 */
	public function getLastName()
	{
		return $this->lastName;
	}
	
	/**
	 * First sorts list of pupils by lastname.
	 * Then performs binary search of pupils for inserted lastname and counts the steps taken to find it.
	 * 
	 * @access public
	 * @author Rasmus <juhansoo12@gmail.com>
	 */
	public static function binarySearch() {
		$pupils = \students\Pupil::$rawPupils;
		$sort = array();
		foreach($pupils as $a=>$b) {
			$sort['lastName'][$a] = $b['lastName'];
		}
		array_multisort($sort['lastName'], SORT_DESC, $pupils);
		$lastName = $_GET['lastName'];
		$min = 0;
		$max = count($pupils) - 1;
		$found = false;
		$guesstimes = 0;
		if ($lastName !== "") {
			do {
				$guesstimes++;
				$guess = floor(($min + $max) / 2);
				if ($pupils[$guess]["lastName"] === $lastName) {
					$found = true;
					return ['guess' => $guess, 'guesstimes' => $guesstimes];
				}
				else {
					if ($pupils[$guess]["lastName"] < $lastName) {
						$min = $guess + 1;
					}
					else {
						$max = $guess - 1;
					}
				}
			}
			while ($min <= $max);
			if (!$found) {
				return ['guesstimes' => $guesstimes];
			}
		}
	}
}