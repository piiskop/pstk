<?php
namespace particle;

/**
 * This class describes the common model for all subclasses.
 *
 * @author k
 * @namespace particle
 */
class Model
{

	/**
	 *
	 * @access private
	 * @author k
	 * @var array[string] the raw common data
	 */
	private static $raw = array(
		'translations' => array(
			'followMe' => array(
				'en_GB' => 'FOLLOW ME',
				'et_EE' => 'Järgnen sulle'
			),
			'olderPosts' => array(
				'en_GB' => 'OLDER POSTS',
				'et_EE' => 'vanemad postitused'
			),
			'newerPosts' => array(
				'en_GB' => 'NEWER POSTS',
				'et_EE' => 'uuemad postitused'
			),
			'search' => array(
				'en_GB' => 'SEARCH',
				'et_EE' => 'Otsing'
			),
			
			'subscribe' => array(
				'en_GB' => 'SUBSCRIBE',
				'et_EE' => 'Tellimused'
			),
			'title' => array(
				'en_GB' => 'PARTICLE',
				'et_EE' => 'PARTICLE'
			)
		)
	);

	/**
	 *
	 * @access private
	 * @author k
	 * @var int $id the ID
	 */
	private $id;

	/**
	 * the setter for the ID
	 *
	 * @access public
	 * @author k
	 * @param int $id
	 *        	the ID
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * the getter for the ID
	 *
	 * @access protected
	 * @author k
	 * @return int the ID
	 */
	protected function getId()
	{
		return $this->id;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the address
	 */
	private static $address;

	/**
	 * the getter for the address
	 *
	 * @access public
	 * @author k
	 * @return string the address
	 */
	public static function getAddress()
	{
		return Model::$address;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the blog date
	 */
	private static $blogDate;

	/**
	 * the getter for the blog date
	 *
	 * @access public
	 * @author k
	 * @return string the blog date
	 */
	public static function getBlogDate()
	{
		return Model::$blogDate;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the blog entry
	 */
	private static $blogEntry;

	/**
	 * the getter for the blog entry
	 *
	 * @access public
	 * @author k
	 * @return string the blog entry
	 */
	public static function getBlogEntry()
	{
		return Model::$blogEntry;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the phone number
	 */
	private static $phoneNumber;

	/**
	 * the getter for the phone number
	 *
	 * @access public
	 * @author k
	 * @return string the phone number
	 */
	public static function getPhoneNumber()
	{
		return Model::$phoneNumber;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the title
	 */
	private static $title;

	/**
	 * the getter for the title
	 *
	 * @access public
	 * @author k
	 * @return string the title
	 */
	public static function getTitle()
	{
		return Model::$title;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the Twitter-date
	 */
	private static $twitter;

	/**
	 * the getter for the Twitter-date
	 *
	 * @access public
	 * @author k
	 * @return string the Twitter-date
	 */
	public static function getTwitter()
	{
		return Model::$twitter;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var mixed[string[string]] the translations where the first-level key is
	 *      the property, the second-level key is the locale
	 */
	private $translations;

	/**
	 * the setter for translations
	 *
	 * @access protected
	 * @author ka
	 * @param array $translations
	 *        	the translations
	 * @see Model::$translations;
	 */
	protected function setTranslations($translations)
	{
		$this->translations = $translations;
	}

	/**
	 * This function sets the complete common data.
	 *
	 * @access private
	 * @author k
	 */
	public function setComplete()
	{
		if (isset(Model::$raw['address'])) {
			$this->address = Model::$raw['address'];
		}
		if (isset(Model::$raw['blogDate'])) {
			$this->blogDate = Model::$raw['blogDate'];
		}
		if (isset(Model::$raw['blogEntry'])) {
			$this->blogEntry = Model::$raw['blogEntry'];
		}
		if (isset(Model::$raw['phoneNumber'])) {
			$this->phoneNumber = Model::$raw['phoneNumber'];
		}
		if (isset(Model::$raw['translations'])) {
			$this->translations = Model::$raw['translations'];
		}
		if (isset(Model::$raw['twitter'])) {
			$this->twitter = Model::$raw['twitter'];
		}
	}

	/**
	 * This function replaces unallowed signs in the title and creates an
	 * appropriate alias.
	 *
	 * @access public
	 * @author K
	 * @param string $parameters['original']
	 *        	the original string
	 * @return string the slug
	 */
	public static function slugify($parameters)
	{
		return trim(
			mb_strtolower(
				preg_replace(
					array(
						'/[^\p{L}\p{N}]/ui',
						'/-(-)*/i'
					), array(
						'-',
						'-'
					), $parameters['original']), 'UTF-8'), '-');
	}

	/**
	 * This function translates the object's property's value.
	 *
	 * @access public
	 * @author k
	 * @param string $parameters['locale']
	 *        	the locale
	 * @param string $parameters['property']
	 *        	the property
	 * @return string the translation
	 * @uses DEFAULT_LOCALE for the case the locale is not set explicitly
	 */
	public function translate($parameters)
	{
		if (isset($parameters['property'])) {
			if (isset($parameters['locale']) &&
				 isset($this->translations[$parameters['property']][$locale])) {
				$translation = $this->translations[$parameters['property']][$parameters['locale']];
			}
			else if (isset($_SESSION['locale']) && isset(
				$this->translations[$parameters['property']][$_SESSION['locale']])) {
				$translation = $this->translations[$parameters['property']][$_SESSION['locale']];
			}
			else if (isset(
				$this->translations[$parameters['property']][DEFAULT_LOCALE])) {
				$translation = $this->translations[$parameters['property']][DEFAULT_LOCALE];
			}
			else {
				$translation = ':-)';
			}
			if (isset($parameters['isSlug']) && $parameters['isSlug'] &&
				 isset($this->translations['label']) && (':-)' === $translation)) {
				if (isset($parameters['locale']) &&
				 isset($this->translations['label'][$locale])) {
				$label = $this->translations['label'][$parameters['locale']];
			}
			else if (isset($_SESSION['locale']) && isset(
				$this->translations['label'][$_SESSION['locale']])) {
				$label = $this->translations['label'][$_SESSION['locale']];
			}
			else if (isset($this->translations['label'][DEFAULT_LOCALE])) {
				$label = $this->translations['label'][DEFAULT_LOCALE];
			}
			else {
				$label = ':-)';
			}
			return Model::slugify(array(
				'original' => $label
			));
		}
		else {
			return $translation;
		}
	}
	else {
		exit('Millist omadust tõlgime?');
	}
}
}