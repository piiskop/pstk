<?php
namespace students;
require_once dirname(__FILE__) . '/settings.php';

/**
 * This class controls everything.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 * @namespace students
 */
class Controller
{

	/**
	 * This function is the stn.
	 *
	 * @access public
	 * @author Rasmus <juhansoo12@gmail.com>
	 * @uses PupilView for the visual part
	 */
	public static function start() {
		require_once dirname(__FILE__) . '/Pupil.php';
		require_once dirname(__FILE__) . '/PupilView.php';
		$search = \students\Pupil::binarySearch();
		if (isset($_GET['lastName']) && $search['guess'] > 0) {
			echo \students\PupilView::buildView(
				array(
					'title' => 'Students',
					'student-class' => 'Visible',
					'steps' => "Korduste arv: " . $search['guesstimes'],//guesstimes value
					'guess' => $search['guess']//guess value
				)
			);
		}
		elseif (isset($_GET['lastName']) && $search['guess'] < 0) {
			echo \students\PupilView::buildView(
				array(
					'title' => 'Students',
					'student-class' => 'Invisible',
					'no-student' => "Sellist õpilast pole.",
					'steps' => "Korduste arv: " . $search['guesstimes'],//guesstimes value
				)
			);
		}
		elseif (isset($_GET['lastName']) && $_GET['lastName'] === "") {
			echo \students\PupilView::buildView(
				array(
					'title' => 'Students',
					'student-class' => 'Invisible',
					'no-student' => "Sisesta otsinguks õpilase nimi."
				)
			);
		}
		else {
			echo \students\PupilView::buildView(
				array(
					'title' => 'Students',
					'student-class' => 'Invisible'
				)
			);
		}
	}
}

\students\Controller::start();