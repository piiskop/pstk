<?php
namespace tuts;
require_once dirname(__FILE__) . '/Model.php';

/**
 * this class describes human.
 */

class Human extends Model
{
	/**
	 * raw humans
	 */
	
	private static $rawHumans = array(
			1 => array(
				'idHuman' => 1,
				'email' => 'raiko19999@hotmail.com',
				'href' => 'http://www.1stwebdesigner.com',
				'label' => 'www.1stwebdesigner.com',
				'name' => 'Michael Burns'
			)
	);
	
	private $email;
	/**
	 * getter for email
	 */
	
	public function getEmail()
	{
		return $this->email;
	}
	
	private $href;
	/**
	 * getter for href
	 */
	public function getHref()
	{
		return $this->href;
	}
	
	private $label;
	
	/**
	 * getter for label
	 */
	public function getLabel()
	{
		return $this->label;
	}
	
	private $name;
	
	
	/**
	 * getter for name
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * This function sets the complete human.
	 */
	
	public function setCompleteHuman()
	{
		if (isset(Human::$rawHumans[$this->getId()]['email'])){
			$this->email = Human::$rawHumans[$this->getId()]['email'];
		}
		if (isset(Human::$rawHumans[$this->getId()]['href'])){
			$this->email = Human::$rawHumans[$this->getId()]['href'];
		}
		if (isset(Human::$rawHumans[$this->getId()]['label'])){
			$this->email = Human::$rawHumans[$this->getId()]['label'];
		}
		if (isset(Human::$rawHumans[$this->getId()]['label'])){
			$this->email = Human::$rawHumans[$this->getId()]['label'];
		}
	}
//////////////	
}