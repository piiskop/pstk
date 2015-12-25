<?php
namespace tuts;
require_once dirname(__FILE__) . '/../php/Model.php';

/**
 * This class describes the common model for all subclasses.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace tuts
 */
class Model extends \pstk\Model
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
		'twitter' => '2015-11-01',
		'translations' => array(
			'title' => array(
				'en_GB' => 'Insert title here',
				'et_EE' => 'Burnstudio'
			)
		)
	);

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string the address
	 */
	private static $address;

	/**
	 * the getter for the address
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the address
	 */
	public static function getAddress()
	{
		return Model::$address;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string the blog date
	 */
	private static $blogDate;

	/**
	 * the getter for the blog date
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the blog date
	 */
	public static function getBlogDate()
	{
		return Model::$blogDate;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string the blog entry
	 */
	private static $blogEntry;

	/**
	 * the getter for the blog entry
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the blog entry
	 */
	public static function getBlogEntry()
	{
		return Model::$blogEntry;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string the phone number
	 */
	private $phoneNumber;

	/**
	 * the getter for the phone number
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the phone number
	 */
	public function getPhoneNumber()
	{
		return $this->phoneNumber;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string the Twitter-date
	 */
	private static $twitter;

	/**
	 * the getter for the Twitter-date
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the Twitter-date
	 */
	public static function getTwitter()
	{
		return Model::$twitter;
	}

	/**
	 * This function sets the complete common data.
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
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
			$this->setTranslations(Model::$raw['translations']);
		}
		if (isset(Model::$raw['twitter'])) {
			$this->twitter = Model::$raw['twitter'];
		}
	}
}