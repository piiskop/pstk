<?php
namespace tuts;
require_once dirname(__FILE__) . '/Model.php';

/**
 * This class deals with the data of logos.
 *
 * @author k
 * @namespace tuts
 */
class Logo extends Model
{

	/**
	 *
	 * @access private
	 * @author k
	 * @var array[int] the raw data of logos
	 */
	private static $rawLogos = array(
		1 => array(
			'idLogo' => 1,
			'alt' => 'habaluc',
			'src' => 'client-1.jpg'
		),
		2 => array(
			'idLogo' => 2,
			'alt' => 'SERIOUS',
			'src' => 'client-2.jpg'
		),
		3 => array(
			'idLogo' => 3,
			'alt' => 'PATRONO',
			'src' => 'client-3.jpg'
		),
		4 => array(
			'idLogo' => 4,
			'alt' => 'Swift Advisor',
			'src' => 'client-4.jpg'
		),
		5 => array(
			'idLogo' => 5,
			'alt' => 'PEEREDGE',
			'src' => 'client-5.jpg'
		)
	);

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the value of <code>alt</code>
	 */
	private $alt;

	/**
	 * the getter for the value of <code>alt</code>
	 *
	 * @access public
	 * @author k
	 * @return string the value of <code>alt</code>
	 */
	public function getAlt()
	{
		return $this->alt;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string the value of <code>srcF</code>
	 */
	private $src;

	/**
	 * the getter for the value of <code>src</code>
	 *
	 * @access public
	 * @author k
	 * @return string the value of <code>src</code>
	 */
	public function getSrc()
	{
		return $this->src;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string text string with the correct height="yyy" width="xxx" string
	 *      that can be used directly in an IMG tag
	 */
	private $sizes;

	/**
	 * the getter for the value of sizes
	 *
	 * @access public
	 * @author k
	 * @return string the value of sizes
	 * @see Logo::$sizes
	 */
	public function getSizes()
	{
		return $this->sizes;
	}

	/**
	 * This function queries all the logos and returns them in an
	 * autocomplete
	 * array if needed.
	 *
	 * @access public
	 * @author k
	 * @param boolean $parameters['forAutocompletion']
	 *        	Do we prepare the array
	 *        	for the autocompletion mechanism?
	 * @param integer $parameters['idOfParent']
	 *        	the ID of the page the
	 *        	list of page news we want
	 * @return int[] <code>NULL</code>, if there are no order person available
	 *         or
	 *         the query is erroneous or the array with keys
	 */
	public static function getListOfTypeLogo($parameters)
	{
		$structuredKeys = array();
		$values = array();
		$keys = array();
		foreach (Logo::$rawLogos as $id => $array) {
			$object = new Logo();
			$object->setId($id);
			$object->setCompleteLogo();
			$keys[] = $id;
			$title = $array['alt'];
			$structuredKeys[$id] = array(
				'id' => $id,
				'object' => $object,
				'title' => $title
			);
			$values[] = $title;
		}
		if (isset($parameters['forAutocompletion']) &&
			 $parameters['forAutocompletion']) {
			$a[] = $values;
			$a[] = $keys;
			return $a;
		}
		else {
			return $structuredKeys;
		}
	}

	/**
	 * This function sets the complete logo.
	 *
	 * @access private
	 * @author k
	 */
	private function setCompleteLogo()
	{
		if (isset(Logo::$rawLogos[$this->getId()]['alt'])) {
			$this->alt = Logo::$rawLogos[$this->getId()]['alt'];
		}
		if (isset(Logo::$rawLogos[$this->getId()]['src'])) {
			$this->src = Logo::$rawLogos[$this->getId()]['src'];
			$arrayOfImage = getimagesize(LOGOS_FOLDER . $this->src);
			$this->sizes = $arrayOfImage[3];
		}
	}
}