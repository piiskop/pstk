<?php
namespace pupils;
require_once dirname(__FILE__) . '/Model.php';

/**
 * This class describes pupils.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace pupils
 * @uses Model for common parts
 */
class Pupil extends Model {
	/**
	 *
	 * @var array the raw data of pupils
	 */
	private static $rawPupils = array(
		array(
			'idPupil' => 1,
			'name' => "kaire",
			'lastName' => "ojastu"
		),
		array(
			'idPupil' => 2,
			'name' => "raiko",
			'lastName' => "oja"
		),
		array(
			'idPupil' => 3,
			'name' => "kristine",
			'lastName' => "linnaosa"
		),
		array(
			'idPupil' => 4,
			'name' => "eleri",
			'lastName' => "apsoloin"
		),
		array(
			'idPupil' => 5,
			'name' => "sander",
			'lastName' => "mets"
		),
		array(
			'idPupil' => 6,
			'name' => "erika",
			'lastName' => "tänav"
		),
		array(
			'idPupil' => 7,
			'name' => "kristen",
			'lastName' => "rist"
		),
		array(
			'idPupil' => 8,
			'name' => "rasmus",
			'lastName' => "teearu"
		),
		array(
			'idPupil' => 9,
			'name' => "lilian",
			'lastName' => "tikk"
		),
		array(
			'idPupil' => 10,
			'name' => "marten",
			'lastName' => "kähr"
		),
		array(
			'idPupil' => 11,
			'name' => "alar",
			'lastName' => "hein"
		),
		array(
			'idPupil' => 12,
			'name' => "rasmus",
			'lastName' => "juhansoo"
		),
		array(
			'idPupil' => 13,
			'name' => "juhan",
			'lastName' => "täkk"
		),
		array(
			'idPupil' => 14,
			'name' => "arnold",
			'lastName' => "rüütel"
		),
		array(
			'idPupil' => 15,
			'name' => "keijo",
			'lastName' => "lusti"
		),
		array(
			'idPupil' => 16,
			'name' => "ingmar",
			'lastName' => "nurmiste"
		),
		array(
			'idPupil' => 17,
			'name' => "ralf",
			'lastName' => "laud"
		),
		array(
			'idPupil' => 18,
			'name' => "ženja",
			'lastName' => "fokin"
		)
	);
	/**
	 * @access private
	 * @var string the property we search according to
	 */
	private static $property;
	/**
	 * the setter for the property we search according to
	 * @param string $property the property we search according to
	 */
	public function setProperty($property) {
		$this->property = $property;
	}
	/**
	 * the getter for raw pupils
	 *
	 * @access public
	 * @return Array the pupils
	 */
	public static function getRawPupils() {
		return Pupil::$rawPupils;
	}
	/**
	 * This function finds the position of an object in the given array
	 * according to
	 * the value of an object's property using binary search.
	 *
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @param
	 *        	Array
	 *        	parameters.array the array that contains objects
	 * @param
	 *        	string
	 *        	parameters.property the property
	 * @param
	 *        	string
	 *        	parameters.value the value
	 * @return Array the <code>numberOfSteps</code> and <code>position</code>
	 */
	public static function findPositionAsBinary($parameters) {
		usort($parameters['array'], 
			function ($first, $second) {
				return strcoll($first[Pupil::$property], 
					$second[Pupil::$property]);
			});
		$numberOfIterations = 0;
		$position = - 1;
		$lastIndex = count($parameters['array']) - 1;
		if ($parameters['value'] ===
			 $parameters['array'][$lastIndex][$parameters['property']]) {
			$position = $lastIndex;
			return $numberOfIterations;
		}
		for ($currentPlace = floor($lastIndex / 2), $beginning = 0, $end = $lastIndex; ($currentPlace >
			 - 1) || ($currentPlace < count($parameters['array']));) {
			$numberOfIterations ++;
			if ($parameters['value'] ===
				 $parameters['array'][$currentPlace][$parameters['property']]) {
				$position = $currentPlace;
				break;
			}
			else if (strcoll($parameters['value'], 
				$parameters['array'][$currentPlace][$parameters['property']]) > 0) {
				if ($beginning === $currentPlace) {
					break;
				}
				$beginning = $currentPlace; // 8 12 14 15 16
				$distance = $end - $beginning; // 9 5 3 2 1
				
				$currentPlace += floor($distance / 2); // 12 14 15 16
			}
			else if (strcoll($parameters['value'], 
				$parameters['array'][$currentPlace][$parameters['property']]) < 0) {
				$end = $currentPlace; // 8 6
				$distance = $end - $beginning; // 2
				if ($distance < 1) {
					break;
				}
				$currentPlace = $beginning + floor(($distance) / 2); // 5
			}
		}
		return array(
			'numberOfSteps' => $numberOfIterations,
			'position' => $position
		);
	}
}