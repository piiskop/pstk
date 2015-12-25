<?php
namespace students;
require_once dirname(__FILE__) . '/settings.php';

/**
 * This class controls everything.
 *
 * @author Arnold <tserepov@gmail.com>
 * @namespace students
 */
class Controller
{

	/**
	 * This function is the stn.
	 *
	 * @access public
	 * @author Rasmus <juhansoo12@gmail.com>
	 * @uses MENU_COMMON for the common menu
	 * @uses MENU_OUTER for the menu of outer links
	 * @uses MENU_INNERfor the menu of inner links
	 * @uses PupilView for the visual part
	 */
	public static function start()
	{
		require_once dirname(__FILE__) . '/Model.php';
		\students\Model::setComplete();
		require_once dirname(__FILE__) . '/PupilView.php';
		echo \students\PupilView::buildView(
				array(
						'title' => 'Students',
						'student' => '',
						'no-student' => array(
								1 => "Sellist õpilast pole.",
								2 => "Palun sisesta õpilase nimi."
						),
						'steps' => "Korduste arv: " . \students\Pupil::guesstimes,//guesstimes value
						'guess' => "var guess = " . \students\Pupil::guess//guess value
	}
}
\students\Controller::start();