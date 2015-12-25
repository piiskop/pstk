<?php
namespace pupils;

/**
 * This class describes the visual part of pupils.
 * 
 * @author kalmer
 * @namespace pupils
 */
class PupilView {
	/**
	 * This function builds the CSS part.
	 * 
	 * @access public
	 * @param boolean $parameters['displayResult']
	 *        Do we display the result?
	 * @param boolean $parameters['displayNoResult']
	 *        Do we display the box for no result?
	 * @param boolean $parameters['displaySteps']
	 *        Do we display the steps?
	 * @return string the parsed block
	 * @uses Configuration for the URL beginning
	 */
	public static function buildCss($parameters) {
		require_once 'HTML/Template/IT.php';
		$template = new \HTML_Template_IT(Configuration::ROOT_FOLDER . 'css');
		$template->loadTemplateFile('pupils.css');
		$template->setCurrentBlock('css');
		$template->setVariable(
				array (
					'BEGINNING_OF_URL' => Configuration::BEGINNING_OF_URL,
					'DISPLAY-RESULT' => $parameters['displayResult'] ? 'block' : 'none',
					'DISPLAY-NO-RESULT' => $parameters['displayNoResult'] ? 'block' : 'none',
					'DISPLAY-STEPS' => $parameters['displaySteps'] ? 'block' : 'none'
				));
		$template->parse('css');
		return $template->get('css');
	}
	/**
	 * This function builds the JS part.
	 * 
	 * @access public
	 * @param int $parameters['position']
	 *        the position of the current pupil in the array
	 * @return string the parsed block
	 * @uses Configuration for the URL beginning
	 */
	public static function buildJs($parameters) {
		require_once 'HTML/Template/IT.php';
		$template = new \HTML_Template_IT(Configuration::ROOT_FOLDER);
		$template->loadTemplateFile('pupils.js');
		$template->setCurrentBlock('js');
		$template->setVariable(
				array (
					'BEGINNING-OF-URL' => Configuration::BEGINNING_OF_URL,
					'POSITION' => $parameters['position']
				));
		$template->parse('js');
		return $template->get('js');
	}
	/**
	 * This function builds the main view.
	 * 
	 * @access public
	 * @param string $parameters['css']
	 *        the CSS-part
	 * @param string $parameters['js']
	 *        the JS-part
	 * @param string $parameters['name']
	 *        the current name searched
	 * @param string $parameters['target']
	 *        the target in the URL
	 * @return string the parsed block
	 * @uses Configuration for the folder of the template
	 */
	public static function buildView($parameters) {
		require_once 'HTML/Template/IT.php';
		$template = new \HTML_Template_IT(Configuration::ROOT_FOLDER);
		$template->loadTemplateFile('pupils.html');
		$template->setCurrentBlock('html');
		$template->setVariable(
				array (
					'NAME' => $parameters['name'],
					'STYLE' => $parameters['css'],
					'SCRIPT' => $parameters['js'],
					'TARGET' => $parameters['target']
				));
		$template->parse('html');
		return $template->get('html');
	}
}