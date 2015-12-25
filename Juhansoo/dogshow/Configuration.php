<?php
namespace dogshow;

/**
 * This method sets the configuration.
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 * @namespace dogshow
 */
class Configuration {
	
	const BEGINNING_OF_URL = 'http://localhost/pstk/Juhansoo/dogshow/';
	const BASE_FOLDER = 'C:/Users/Rasmus/workspace/';
	const ROOT_FOLDER = ROOT_FOLDER;
	
	public static function setConfiguration() {
		// for localization
		setlocale(LC_TIME, 'et_EE.UTF-8');
		date_default_timezone_set('Europe/Tallinn');
		
		// for seeing errors
		ini_set('display_errors', 1);
		
		if (defined('E_DEPRECATED')) {
			error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_STRICT);
		} else {
			error_reporting(E_ALL & ~ E_STRICT);
		}
		
		// header
		header('Content-type: text/html; charset=utf-8');
		define('ROOT_FOLDER', Configuration::BASE_FOLDER . '/pstk/Juhansoo/dogshow/');
	}
}

Configuration::setConfiguration();