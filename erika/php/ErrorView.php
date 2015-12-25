<?php
namespace pstk;

/**
 * This class deals with the visual part of error messages.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace pstk
 */
class ErrorView
{

	/**
	 * This function raises the error as a callback function for views.
	 *
	 * @access public
	 * @author Kalmer Piiskop <pandeero@gmail.com>
	 * @param object $errorFromOutside
	 *        	the error object
	 */
	public static function raiseError($errorFromOutside)
	{
		require_once 'HTML/Template/IT.php';
		$template = new \HTML_Template_IT(ROOT_FOLDER . '../html');
		$template->loadTemplateFile('errors.html');
		$template->setCurrentBlock('html');
		$template->setVariable(
			array(
				'TITLE-OF-ERROR' => \pstk\String::translate('titleOfError'),
				'MESSAGE' => $errorFromOutside->getMessage(),
				'DEBUG-INFO' => $errorFromOutside->getDebugInfo()
			));
		$template->parse('html');
		exit($template->get('html'));
	}
}