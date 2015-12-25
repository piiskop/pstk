<?php

namespace pstk;

/**
 * This class deals with strings.
 *
 * @author arnold:tserepov <tserepov@gmail.com>
 * @namespace pstk
 */
class String {
	
	/**
	 *
	 * @access private
	 * @author arnold:tserepov <tserepov@gmail.com>
	 * @var string the ID
	 */
	private $id;
	
	/**
	 * the setter for the ID
	 *
	 * @access private
	 * @author arnold:tserepov <tserepov@gmail.com>
	 * @param string $id
	 *        	the ID
	 */
	private function setId($id) {
		$this->id = $id;
	}
	
	/**
	 *
	 * @access private
	 * @author arnold:tserepov <tserepov@gmail.com>
	 * @var Translation[string] the translations of this string
	 */
	private $translations = array ();
	
	/**
	 *
	 * @access private
	 * @author arnold:tserepov <tserepov@gmail.com>
	 * @var String[string] the strings
	 */
	private static $strings = array ();
	
	/**
	 * the constructor
	 *
	 * @access private
	 * @author arnold:tserepov <tserepov@gmail.com>
	 */
	private function __construct() {
		$parameters = func_get_arg ( 0 );
		$this->id = $parameters ['id'];
		if (isset ( $parameters ['translations'] )) {
			$this->translations = $parameters ['translations'];
		} else {
			if (count ( String::$strings ) < 1) {
				String::fillStings ();
			}
			$string = String::$strings [$parameters ['id']];
			// echo ' <br/>33: <pre>';
			// var_dump(String::$strings[$parameters['id']]);
			// echo '</pre>';
			$this->translations = $string->translations;
		}
	}
	
	/**
	 * This method fills the array of strings with raw data.
	 *
	 * @access private
	 * @author arnold:tserepov <tserepov@gmail.com>
	 * @uses Translation for translations
	 */
	private static function fillStings() {
		require_once dirname ( __FILE__ ) . '../translation.php';
		// errors
		$id = 'errorWhichMenu';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'Milline menüü?' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'Which menu?' 
						) ) 
				) 
		) );
		$id = 'other';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'muu' 
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'other' 
						) ) 
				) 
		) );
		$id = 'links';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'linkid'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'links'
						) )
				)
		) );
		$id = 'titleOfError';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'vead'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'titleOfError'
						) )
				)
		) );
		$id = 'latest';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'viimased'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'latest'
						) )
				)
		) );
		$id = 'blog';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'bloog'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'blog'
						) )
				)
		) );
		$id = 'callUs';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'helista meile'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'callUs'
						) )
				)
		) );
		$id = 'now';
		String::$strings [$id] = new String ( array (   ////////////////////////////////////////////////////////////////////////////
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'nüüd'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'now'
						) )
				)
		) );
		$id = 'quick';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'kiiresti'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'quick'
						) )
				)
		) );
		$id = 'videos';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'video'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'videos'
						) )
				)
		) );
		$id = 'headingToVideos';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'pealkiri videole'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'headingToVideos'
						) )
				)
		) );
		$id = 'search';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'otsi'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'search'
						) )
				)
		) );
		$id = 'twitter';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'twiter'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'twitter'
						) )
				)
		) );
		$id = 'feed';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'voog'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'feed'
						) )
				)
		) );
		$id = 'like';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'like'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'like'
						) )
				)
		) );
		$id = 'our';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'meie oma'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'our'
						) )
				)
		) );
		$id = 'location';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'asukoht'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'location'
						) )
				)
		) );
		$id = 'designedBy';
		String::$strings [$id] = new String ( array (
				'id' => $id,
				'translations' => array (
						'et_EE' => new Translation ( array (
								'id' => 'et_EE',
								'idParent' => $id,
								'translation' => 'autor'
						) ),
						'en_GB' => new Translation ( array (
								'id' => 'en_GB',
								'idParent' => $id,
								'translation' => 'designedBy'
						) )
				)
		) );
		
		// time
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
		$id = 'years';
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
		$id = 'months';
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
		$id = 'days';
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
		$id = 'hours';
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
		$id = 'minutes';
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
		$id = 'seconds';
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
		// echo ' <br/>54: <pre>';
		// var_dump(String::$strings);
		// echo '</pre>';
	}
	
	/**
	 * This method translates a sting.
	 *
	 * @access public
	 * @author arnold:tserepov <pandeero@gmail.com>
	 * @param string $id
	 *        	the ID of the string to be translated
	 */
	public static function translate($id) {
		$string = new String ( array (
				'id' => $id 
		) );
		if (isset ( $_SESSION ['language'] )) {
			$language = $_SESSION ['language'];
		} else {
			$language = DEFAULT_LOCALE;
		}
		// echo ' <br/>66: <pre>';
		// var_dump($string->translations);
		// echo '</pre>';
		return $string->translations [$language]->getTranslation ();
	}
}
	