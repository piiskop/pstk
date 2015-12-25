<?php
<?php
namespace students;
require_once dirname(__FILE__) . '/Model.php';

/**
 * This class describes the pupil.
 *
 * @author Arnold <tserepov12@gmail.com>
 * @namespace students
 */
class Pupil extends \students\Model
{

	/**
	 * raw pupils
	 *
	 * @access private
	 * @author Arnold <tserepov@gmail.com>
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
	 * @var string first name of student
	 */
	private $firstName;

	/**
	 * the getter for the URL of the home page
	 *
	 * @access public
	 * @return string first name of student
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * @access private
	 * @var string last name of student
	 */
	private $lastName;

	/**
	 * the getter for the URL of the home page
	 *
	 * @access public
	 * @return string last name of student
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	 * This function sets the complete pupil.
	 * Küsib väärtused vastavalt ID-le ja väärtustab sihitisele (object) vastavad omadused.
	 *
	 * @access public
	 * @author Arnold <tserepov@gmail.com>
	 */
	public function setCompletePupil()
	{
		if (isset(Pupil::$rawPupils[$this->getId()]['firstName'])) {
			$this->firstName = Pupil::$rawPupils[$this->getId()]['firstName'];
		}
		if (isset(Pupil::$rawPupils[$this->getId()]['lastName'])) {
			$this->lastName = Pupil::$rawPupils[$this->getId()]['lastName'];
		}
	}

	/**
	 * Performs binary search of pupils for inserted last name and counts the steps taken to find it.
	 *
	 * @access public
	 * @author Arnold <tserepov@gmail.com>
	 */
	