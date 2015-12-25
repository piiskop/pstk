<?php
namespace psdtohtml;

/**
 * This class describes the common model for all subclasses.
 *
 * @author rasmus
 * @namespace psdtohtml
 */
class Model
{

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var array[string] the raw common data
	 */
	private static $raw = array(
		'address' => '123 unknown street, address&#160;<br />8600 Philippnes',
		'blogDate' => '2012-05-30 0:0:0',
		'blogEntry' => 'Never seen any of our designers try to use the
							list-style-image when implementing custom icons for list, I guess
							this is why :)',
		'phoneNumber' => '(012) 35 6789',
		'title' => 'Insert title here',
		'twitter' => '2015-11-01'
	);

	/**
	 * @access private
	 * @var int $id the ID
	 */
	private $id;

	/**
	 * the setter for the ID
	 *
	 * @access public
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
	 * @return int the ID
	 */
	protected function getId()
	{
		return $this->id;
	}

	/**
	 * @access private
	 * @var string the address
	 */
	private static $address;

	/**
	 * the getter for the address
	 *
	 * @access public
	 * @return string the address
	 */
	public static function getAddress()
	{
		return Model::$address;
	}

	/**
	 *
	 * @access private
	 * @var string the blog date
	 */
	private static $blogDate;

	/**
	 * the getter for the blog date
	 *
	 * @access public
	 * @return string the blog date
	 */
	public static function getBlogDate()
	{
		return Model::$blogDate;
	}

	/**
	 * @access private
	 * @var string the blog entry
	 */
	private static $blogEntry;

	/**
	 * the getter for the blog entry
	 *
	 * @access public
	 * @return string the blog entry
	 */
	public static function getBlogEntry()
	{
		return Model::$blogEntry;
	}

	/**
	 * @access private
	 * @var string the phone number
	 */
	private static $phoneNumber;

	/**
	 * the getter for the phone number
	 *
	 * @access public
	 * @return string the phone number
	 */
	public static function getPhoneNumber()
	{
		return Model::$phoneNumber;
	}

	/**
	 * @access private
	 * @var string the title
	 */
	private static $title;

	/**
	 * the getter for the title
	 *
	 * @access public
	 * @return string the title
	 */
	public static function getTitle()
	{
		return Model::$title;
	}

	/**
	 * @access private
	 * @var string the Twitter-date
	 */
	private static $twitter;

	/**
	 * the getter for the Twitter-date
	 *
	 * @access public
	 * @return string the Twitter-date
	 */
	public static function getTwitter()
	{
		return Model::$twitter;
	}

	/**
	 * @access private
	 * @var mixed[string[string]] the translations where the first-level key is
	 *      the property, the second-level key is the locale
	 */
	private $translations;

	/**
	 * the setter for translations
	 *
	 * @access protected
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
	 */
	public static function setComplete()
	{
		if (isset(Model::$raw['address'])) {
			Model::$address = Model::$raw['address'];
		}
		if (isset(Model::$raw['blogDate'])) {
			Model::$blogDate = Model::$raw['blogDate'];
		}
		if (isset(Model::$raw['blogEntry'])) {
			Model::$blogEntry = Model::$raw['blogEntry'];
		}
		if (isset(Model::$raw['phoneNumber'])) {
			Model::$phoneNumber = Model::$raw['phoneNumber'];
		}
		if (isset(Model::$raw['title'])) {
			Model::$title = Model::$raw['title'];
		}
		if (isset(Model::$raw['twitter'])) {
			Model::$twitter = Model::$raw['twitter'];
		}
	}

	/**
	 * This function replaces unallowed signs in the title and creates an
	 * appropriate alias.
	 *
	 * @access public
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
			return \psdtohtml\Model::slugify(array(
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