<?php
namespace students;

/**
 * This is the common view class.
 *
 * @author Arnold <tserepov@gmail.com>
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
	private static function buildJs()
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER);
		$tpl->loadTemplatefile('students-template.js');
		if (\students\Pupil::binarySearch() === true) {
			if (isset($parameters['guess'])) {
				$tpl->setCurrentBlock('guess');
				$tpl->setVariable(
						array(
								'GUESS' => $parameters['guess']
						));
				$tpl->parse('guess');
			}
		}
		$tpl->setCurrentBlock('js');
		$tpl->parse('js');
		return $tpl->get('js');
	}

	/**
	 * This function builds the main structure in HTML.
	 *
	 * @access public
	 * @param string $parameters['student']
	 *        	student block
	 * @param string $parameters['no-student'][1]
	 *        	no-student block option 1
	 * @param string $parameters['no-student'][1]
	 *        	no-student block option 2
	 * @param Human $parameters['steps']
	 *        	steps block
	 * @param string $parameters['title']
	 *        	the title
	 * @return string the parsed HTML-structure
	 * @uses BEGINNING_OF_URL for links
	 * @uses MENU_COMMON for the common menu
	 * @uses MENU_OUTER for the menu of outer links
	 * @uses MENU_INNER for the menu of inner links
	 */
	public static function buildView($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER);
		$tpl->loadTemplatefile('students-template.html');
		if (\students\Pupil::binarySearch() === true) {
			if (isset($parameters['student'])) {
				$tpl->setCurrentBlock('student');
				$tpl->setVariable(
						array(
								'STUDENT' => $parameters['student']
						));
				$tpl->parse('student');
			}
		}
		if (\students\Pupil::binarySearch() === false) {
			if (isset($parameters['no-student'])) {
				$tpl->setCurrentBlock('no-student');
				$tpl->setVariable(
						array(
								'NO-STUDENT' => $parameters['no-student'][1]
						));
				$tpl->parse('no-student');
			}
		}
		if (\students\Pupil::binarySearch() === empty) {
			if (isset($parameters['no-student'])) {
				$tpl->setCurrentBlock('no-student');
				$tpl->setVariable(
						array(
								'NO-STUDENT' => $parameters['no-student'][2]
						));
				$tpl->parse('no-student');
			}
		}
		if (isset($parameters['steps'])) {
			$tpl->setCurrentBlock('steps');
			$tpl->setVariable(
					array(
							'STEPS' => $parameters['steps']
					));
			$tpl->parse('steps');
		}
		$tpl->setCurrentBlock('html');
		$tpl->setVariable(
				array(
						'TITLE' => $parameters['title'],
						'STYLE' => \students\PupilView::buildCss(),
						'JS' => \students\PupilView::buildJs()
				));
		$tpl->parse('html');
		return $tpl->get('html');
	}
}