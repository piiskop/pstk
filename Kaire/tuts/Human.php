<?php
namespace tuts;
require_once dirname(__FILE__) . '/Model.php';

/**
 * This class describes the human.
 *
 * @author k
 * @namespace tuts
 */
class Human extends \tuts\Model
{

	/**
	 * raw humans
	 *
	 * @access private
	 * @author k
	 */
	private static $rawHumans = array(
		1 => array(
			'idHuman' => 1,
			'email' => 'pandeero@gmail.com',
			'href' => 'http://www.1stwebdesigner.com',
			'label' => 'www.1stwebdesigner.com',
			'name' => 'Michael Burns'
		)
	);

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the email address
	 */
	private $email;

	/**
	 * the getter for the email address
	 *
	 * @access public
	 * @author k
	 * @return string the email address
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the URL of the home page
	 */
	private $href;

	/**
	 * the getter for the URL of the home page
	 *
	 * @access public
	 * @author k
	 * @return string the URL of the home page
	 */
	public function getHref()
	{
		return $this->href;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the label on the home page link
	 */
	private $label;

	/**
	 * the getter for the label on the link to the home page
	 *
	 * @access public
	 * @author k
	 * @return string the label on the link to the home page
	 */
	public function getLabel()
	{
		return $this->label;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the name
	 */
	private $name;

	/**
	 * the getter for the name
	 *
	 * @access public
	 * @author k
	 * @return string the name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * This function sets the complete human.
	 *
	 * @access public
	 * @author k
	 */
	public function setCompleteHuman()
	{
		if (isset(Human::$rawHumans[$this->getId()]['email'])) {
			$this->email = Human::$rawHumans[$this->getId()]['email'];
		}
		if (isset(Human::$rawHumans[$this->getId()]['href'])) {
			$this->href = Human::$rawHumans[$this->getId()]['href'];
		}
		if (isset(Human::$rawHumans[$this->getId()]['label'])) {
			$this->label = Human::$rawHumans[$this->getId()]['label'];
		}
		if (isset(Human::$rawHumans[$this->getId()]['name'])) {
			$this->name = Human::$rawHumans[$this->getId()]['name'];
		}
	}
}