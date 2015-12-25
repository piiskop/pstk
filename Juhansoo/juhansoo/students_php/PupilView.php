<?php
namespace students;

/**
 * This is the common view class.
 *
 * @author Rasmus <juhansoo12@gmail.com>
 * @namespace students
 */
class PupilView
{
	
	/**
	 * This function builds the CSS part.
	 *
	 * @access private
	 * @return string the CSS part
	 * @uses ROOT_FOLDER for the path to the CSS-template file
	 */
	private static function buildCss()
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER);
		$tpl->loadTemplatefile('students-template.css');
		$tpl->setCurrentBlock('css');
		$tpl->parse('css');
		return $tpl->get('css');
	}
	
	/**
	 * This function builds the Javascript part.
	 *
	 * @access private
	 * @return string the JS part
	 * @uses ROOT_FOLDER for the path to the JS-template file
	 */
	private static function buildJs($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER);
		$tpl->loadTemplatefile('students-template.js');
		$tpl->setVariable(
			array(
				'GUESS' => $parameters['guess']
			)
		);
		$tpl->setCurrentBlock('js');
		$tpl->parse('js');
		return $tpl->get('js');
	}
	
	/**
	 * This function builds the main structure in HTML.
	 *
	 * @access public
	 * @param string $parameters['title'] the title
	 * @return string the parsed HTML-structure
	 * @uses ROOT_FOLDER for the path to the HTML-template file
	 */
	public static function buildView($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER);
		$tpl->loadTemplatefile('students-template.html');
		$tpl->setCurrentBlock('html');
		$tpl->setVariable(
			array(
				'TITLE' => $parameters['title'],
				'STUDENT-CLASS' => $parameters['student-class'],
				'NO-STUDENT' => $parameters['no-student'],
				'STEPS' => $parameters['steps'],
				'STYLE' => \students\PupilView::buildCss(),
				'JS' => \students\PupilView::buildJs(
					array(
						$parameters['guess']
					)
				)
			)
		);
		$tpl->parse('html');
		return $tpl->get('html');
	}
}