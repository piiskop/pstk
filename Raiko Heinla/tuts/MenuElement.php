<?php

namespace tuts;

require_once dirname ( __FILE__ ) . '/model.php ';
/**
 * This class deals with the data of menu elements.
 * 
 * @namespace tuts
 */
class MenuElement extends Model {
	
	/**
	 * Array containing menu elements
	 */
	private static $rawMenuElements = array (
			1 => array (
					'idMenuElement' => 1,
					'href' => '',
					'label' => 'services',
					'type' => 1 
			),
			2 => array (
					'idMenuElement' => 2,
					'href' => '',
					'label' => 'about us',
					'type' => 1 
			),
			3 => array (
					'idMenuElement' => 3,
					'href' => '',
					'label' => 'testimonials',
					'type' => 1 
			),
			4 => array (
					'idMenuElement' => 4,
					'href' => '',
					'label' => 'contact us',
					'type' => 1 
			),
			5 => array (
					'idMenuElement' => 5,
					'href' => 'http://www.example.com',
					'label' => 'www.example.com',
					'type' => 2 
			),
			6 => array (
					'idMenuElement' => 6,
					'href' => 'http://www.1stwebdesigner.com',
					'label' => 'www.1stwebdesigner.com',
					'type' => 2 
			),
			7 => array (
					'idMenuElement' => 7,
					'href' => 'http://www.labzip.com',
					'label' => 'www.labzip.com',
					'type' => 2 
			),
			8 => array (
					'idMenuElement' => 8,
					'href' => 'http://www.samplelink.com',
					'label' => 'www.samplelink.com',
					'type' => 2 
			),
			9 => array (
					'idMenuElement' => 9,
					'href' => 'http://www.outgoinglink.com',
					'label' => 'www.outgoinglink.com',
					'type' => 2 
			),
			10 => array (
					'idMenuElement' => 10,
					'href' => 'http://www.link.com',
					'label' => 'http://www.link.com',
					'type' => 2 
			) 
	);
	
	/**
	 */
	private $id;
	
	/**
	 *
	 * @var string $href the hyperreference
	 */
	private $href;
	
	/**
	 * the getter for the hyperreference
	 * 
	 * @return string the hyperreference
	 */
	public function getHref() {
		return $this->href;
	}
	
	/**
	 *
	 * @var string $label the text on the menu element
	 */
	private $label;
	
	/**
	 * the getter for the label
	 * 
	 * @return string the label
	 */
	public function getLabel() {
		return $this->label;
	}
	
	private $type;
	
	/**
	 * getter for type
	 */
	public function getType() {
		return $this->type;
	}
	
	/**
	 * This function sets the complete menu element.
	 */
	private function setCompleteMenuElement()
	{
		$rawMenuElements = MenuElement::$rawMenuElements;
		if (isset ( $rawMenuElements [$this->getId ()] ['href'] )) {
			$this->href = $rawMenuElements [$this->getId ()] ['href'];
		}
		if (isset ( $rawMenuElements [$this->getId ()] ['label'] )) {
			$this->label = $rawMenuElements [$this->getId ()] ['label'];
		}
		if (isset ( $rawMenuElements [$this->getId ()] ['type'] )) {
			$this->type = $rawMenuElements [$this->getId ()] ['type'];
		}
	}
	
	/**
	 * This function queries all the menu elements and returns them in an
	 * autocomplete
	 * array if needed.
	 *
	 * @access public
	 * @return int[] <code>NULL</code>, if there are no order person available
	 *         or
	 *         the query is erroneous or the array with keys
	 */
public static function getListOfTypeMenuElement($parameters)
	{
		if (isset($parameters['type'])) {
			$structuredKeys = array();
			$values = array();
			$keys = array();
			foreach (MenuElement::$rawMenuElements as $id => $array) {
				$object = new MenuElement();
				if ($array['type'] === $parameters['type']) {
					$object->setId($id);
					$object->setCompleteMenuElement();
					$keys[] = $id;
					$title = $array['label'];
					$structuredKeys[$id] = array(
						'id' => $id,
						'object' => $object,
						'title' => $title
					);
					$values[] = $title;
				}
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
		else {
			exit('Milline menüü?');
		}
	}
}