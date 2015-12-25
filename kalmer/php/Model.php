<?php
namespace pstk;

/**
 * This class describes the common model for all subclasses.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace pstk
 */
class Model
{

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var int $id the ID
	 */
	private $id;

	/**
	 * the setter for the ID
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
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
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return int the ID
	 */
	protected function getId()
	{
		return $this->id;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string the title
	 */
	private static $title;

	/**
	 * the getter for the title
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the title
	 */
	public static function getTitle()
	{
		return Model::$title;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var mixed[string[string]] the translations where the first-level key is
	 *      the property, the second-level key is the locale
	 */
	private $translations;

	/**
	 * the setter for translations
	 *
	 * @access protected
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @param array $translations
	 *        	the translations
	 * @see Model::$translations;
	 */
	protected function setTranslations($translations)
	{
		$this->translations = $translations;
	}

	/**
	 * This function replaces unallowed signs in the title and creates an
	 * appropriate alias.
	 *
	 * @access public
	 * @author Kalmer Piiskop<pandeero@gmail.com>
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
	 * @author kalmer:piiskop<pandeero@gmail.com>
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
			return \pstk\Model::slugify(array(
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