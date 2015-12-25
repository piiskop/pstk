<?php
/**
 * @author kalmer:piiskop <pandeero@gmail.com>
 */
namespace pupils;

/**
 * This class describes the configuration.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace pupils
 * @uses ROOT_FOLDER for linking
 */
class Configuration {
	const BEGINNING_OF_URL = 'http://localhost/pstk/kalmer/pupils/';
	const BASE_FOLDER = '/data/workspace/';
	const ROOT_FOLDER = ROOT_FOLDER;
	/**
	 * This method sets the configuration.
	 * 
	 * @access public
	 */
	public static function setConfiguration() {
		// for session variables
		if (! isset($_SESSION)) {
			session_start();
		}
		
		// for localization
		setlocale(LC_TIME, 'et_EE.UTF-8');
		date_default_timezone_set('Europe/Tallinn');
		
		// for seeing errors
		ini_set('display_errors', 1);
		
		if (defined('E_DEPRECATED')) {
			error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_STRICT);
		}
		else {
			error_reporting(E_ALL & ~ E_STRICT);
		}
		
		// header
		header('Content-type: text/html; charset=utf-8');
		define('ROOT_FOLDER', dirname(__FILE__) . DIRECTORY_SEPARATOR);
	}
}
Configuration::setConfiguration();