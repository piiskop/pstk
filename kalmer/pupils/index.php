<?php
namespace pupils;
require_once dirname(__FILE__) . '/Configuration.php';

/**
 * This class is the main controller.
 *
 * @author kalmer
 * @namespace pupils
 */
class Controller {
	/**
	 * This function starts everything.
	 *
	 * @access public
	 * @param string $parameters['target']
	 *        	the target
	 * @uses Pupil for the search
	 * @uses PupilView for the search form
	 */
	public static function start($parameters) {
		if ('export' === $parameters['target']) {
			require_once dirname(__FILE__) . '/Pupil.php';
			$content = Pupil::getRawPupils();
			echo json_encode($content);
		}
		else {
			require_once dirname(__FILE__) . '/PupilView.php';
			if (isset($_GET['name'])) {
				require_once dirname(__FILE__) . '/Pupil.php';
				Pupil::setProperty('name');
				$resultOfSearch = Pupil::findPositionAsBinary(
					array(
						'array' => Pupil::getRawPupils(),
						'property' => 'name',
						'value' => $_GET['name']
					));
				if ($resultOfSearch['position'] > - 1) {
					$css = PupilView::buildCss(
						array(
							'displayResult' => true,
							'displayNoResult' => false,
							'displaySteps' => true
						));
				}
				else {
					$css = PupilView::buildCss(
						array(
							'displayResult' => false,
							'displayNoResult' => true,
							'displaySteps' => true
						));
				}
				$js = PupilView::buildJs(
					array(
						'position' => $resultOfSearch['position']
					));
				$numberOfSteps = $resultOfSearch['numberOfSteps'];
			}
			else {
				$js = PupilView::buildJs(array(
					'position' => - 1
				));
				$css = PupilView::buildCss(
					array(
						'displayResult' => false,
						'displayNoResult' => false,
						'displaySteps' => false
					));
				$numberOfSteps = 0;
			}
			echo PupilView::buildView(
				array(
					'css' => $css,
					'name' => isset($_GET['name']) ? $_GET['name'] : null,
					'js' => $js,
					'numberOfSteps' => $numberOfSteps,
					'target' => $parameters['target']
				));
		}
	}
}
Controller::start(
	array(
		'target' => isset($_GET['target']) ? $_GET['target'] : 'form'
	));