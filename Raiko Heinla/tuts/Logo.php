<?php
namespace tuts;
require_once dirname (__FILE__) . '/model.php ';

/**
 * This class deals with the data of logos.
 */

class Logo extends Model
{
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
	
	private $alt;
	/**
	 * getter for valte of alt
	 */
	
	public function getAlt()
	{
		return $this->alt;
	}
	
	private $src;
	
	public function getSrc()
	{
		return $this->src;
	}
	
	private $sizes;
	
	public function getSizes()
	{
		return $this->sizes;
	}
	
	/**
	 * this function queries all logos and returns them in autocomplete
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
	 * this function sets complete logo
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