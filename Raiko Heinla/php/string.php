<?php

namespace pstk;

/**
 * This class deals with strings.
 */
class String {
	/**
	 * @var string the ID
	 */
	private $id;
	
	/**
	 * Setter for the ID
	 */
	private function setID($id) {
		$this->id = $id;
	}
	
	/**
	 *
	 * @var Translation[string] the translation of this string
	 */
	private $translations = array ();
	
	/**
	 *
	 * @var String[string] the strings
	 */
	private static $strings = array ();
	/**
	 * the constructor
	 */
	private function __construct() {
		$parameters = func_get_arg ( 0 );
		$this->id = $parameters ['id'];
		if (isset ( $parameters ['translations'] )) {
			$this->translations = $parameters ['translations'];
		} else {
			if (count ( String::$strings ) < 1) {
				String::fillStings ();
				/*
				echo '<pre>';
				var_dump ( String::$strings );
				echo '<pre/>';
				*/
			}
			$string = String::$strings [$parameters ['id']];
		//	echo var_dump ( String::$strings [$parameters ['id']] );
			$this->translations = $string->translations;
		}
	}
	/**
	 * Fills array of strings with raw data.
	 */
	private static function fillStings()
	{
		require_once dirname ( __FILE__ ) . '/Translation.php';
		

		////////////////
		$id = 'year';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'aasta' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'year' 
						) ) 
				) 
		) );
		$id = 'year';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'aastat' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'years' 
						) ) 
				) 
		) );
		
		$id = 'month';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'kuu' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'month' 
						) ) 
				) 
		) );
		$id = 'month';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'kuud' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'months' 
						) ) 
				) 
		) );
		
		$id = 'week';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'nädal' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'week' 
						) ) 
				) 
		) );
		$id = 'week';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'nädalat' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'weeks' 
						) ) 
				) 
		) );
		
		$id = 'day';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'päev' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'day' 
						) ) 
				) 
		) );
		$id = 'day';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'päeva' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'days' 
						) ) 
				) 
		) );
		
		$id = 'hour';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'tund' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'hour' 
						) ) 
				) 
		) );
		$id = 'hour';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'tundi' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'hours' 
						) ) 
				) 
		) );
		
		$id = 'minute';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'minut' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'minute' 
						) ) 
				) 
		) );
		$id = 'minute';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'minutit' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'minutes' 
						) ) 
				) 
		) );
		
		$id = 'second';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'sekund' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'second' 
						) ) 
				) 
		) );
		$id = 'second';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'sekundit' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'seconds' 
						) ) 
				) 
		) );
	}
	
	/**
	 * This method translates a string
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
		// echo ' <br/>66: <pre>';
		// var_dump($string->translations);
		// echo '</pre>';
		
		return $string->translations[$language]->getTranslation();
	}
}