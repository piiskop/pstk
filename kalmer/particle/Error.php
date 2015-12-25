<?php
namespace particle;

/**
 * This class describes errors.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace particle
 */
class Error
{

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string $message the error message
	 */
	private $message;

	/**
	 * the setter for the error message
	 * 
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @param string $message
	 *        	the error message
	 */
	public function setMessage($message)
	{
		$this->message = $message;
	}

	/**
	 * the getter for the error message
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the error message
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * This function returns the backtrace.
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the backtrace
	 */
	public function getDebugInfo()
	{
		return debug_backtrace();
	}
}