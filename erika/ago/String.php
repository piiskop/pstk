<?php
namespace pstk;

/**
 * This class deals with strings.
 *

 * @namespace pstk
 */
class String
{

	/**
	 *
	 * @access private
	 * @var string the ID
	 */
	private $id;

	/**
	 * the setter for the ID
	 *
	 * @access private
	 * @param string $id
	 *        	the ID
	 */
	private function setId($id)
	{
		$this->id = $id;
	}

	/**
	 *
	 * @access private
	 * @var Translation[string] the translations of this string
	 */
	private $translations = array();

	/**
	 *
	 * @access private
	 * @var String[string] the strings
	 */
	private static $strings = array();

	/**
	 * the constructor
	 * @access private

	 */
	private function __construct()
	{
		$parameters = func_get_arg(0);
		$this->id = $parameters['id'];
		if (isset($parameters['translations'])) {
			$this->translations = $parameters['translations'];
		}
		else {
			if (count(String::$strings) < 1) {
				String::fillStings();
			}
			$string = String::$strings[$parameters['id']];
			echo ' <br/>33: <pre>';
			var_dump(String::$strings[$parameters['id']]);
			echo '</pre>';
			$this->translations = $string->translations;
		}
	}

	/**
	 * This method fills the array of strings with raw data.
	 *
	 * @access private
	 * @uses Translation for translations
	 */
	private static function fillStings()
	{
		require_once dirname(__FILE__) . '/Translation.php';
		$id = 'year';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'aasta'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'year'
						))
				)
			));
		$id = 'years';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'aastat'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'years'
						))
				)
			));
		$id = 'month';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'kuu'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'month'
						))
				)
			));
		$id = 'months';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'kuud'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'months'
						))
				)
			));
		$id = 'day';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'päev'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'day'
						))
				)
			));
		$id = 'days';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'päeva'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'days'
						))
				)
			));
		$id = 'hour';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'tund'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'hour'
						))
				)
			));
		$id = 'hours';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'tundi'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'hours'
						))
				)
			));
		$id = 'minute';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'minut'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'minute'
						))
				)
			));
		$id = 'minute';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'minutit'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'minutes'
						))
				)
			));
		$id = 'second';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'sekund'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'second'
						))
				)
			));
		$id = 'seconds';
		String::$strings[$id] = new String(
			array(
				'id' => $id,
				'translations' => array(
					'et_EE' => new Translation(
						array(
							'id' => 'et_EE',
							'idParent' => $id,
							'translation' => 'sekundit'
						)),
					'en_GB' => new Translation(
						array(
							'id' => 'en_GB',
							'idParent' => $id,
							'translation' => 'seconds'
						))
				)
			));
		echo ' <br/>54: <pre>';
		var_dump(String::$strings);
		echo '</pre>';
	}

	/**
	 * This method translates a sting.
	 *
	 * @access public
	 * @param string $id
	 *        	the ID of the string to be translated
	 */
	public static function translate($id)
	{
		$string = new String(array(
			'id' => $id
		));
		if (isset($_SESSION['language'])) {
			$language = $_SESSION['language'];
		}
		else {
			$language = DEFAULT_LOCALE;
		}
		echo ' <br/>66: <pre>';
		var_dump($string->translations);
		echo '</pre>';
		return $string->translations[$language]->getTranslation();
	}
}