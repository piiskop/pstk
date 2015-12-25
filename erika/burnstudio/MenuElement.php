<?php
namespace burnstudio;
/**
 * This class deals with data of menu
 * @namespace burnstudio;
 *
 */
class MenuElement{
	/**
	 *
	 * @var array[int] the raw menu element data
	 */
	private static $rawMenuElements = array(
		1 => array(
				'href'=> '',
				'label' => 'services'
			),
		2 => array(
				'href'=> '',
				'label' => 'about us'
			),
		3 => array(
				'href'=> '',
				'label' => 'testimonals'
			),
		4 => array(
				'href'=> '',
				'label' => 'contact us'
			),
		);
	
	/**
	 *
	 * @var int $idMenuElement the ID
	 */
	private $id;
	/**
	 *
	 * @access private
	 * @var string $href the hyperreference
	 */
	private $href;
	/**
	 *
	 * @access private
	 * @var string $label the text on the menu element
	 */
	private $label;
	/**
	 * the getter for the hyperreference
	 *
	 * @access public
	 * @return string the hyperreference
	 */
	public function getHref() {
		return $this->href;
	}
	

	/**
	 * the getter for the label
	 *
	 * @access public
	 * @return string the label
	 */
	
	public function getLabel() {
		return $this->label;
	}
	
	
	
	/**
	 * This function queries all the menu elements and returns them in an
	 * autocomplete
	 * array if needed.
	 *
	 * @access public
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
	public static function getListOfTypeMenuElement($parameters) {
		$structuredKeys = array ();
	
		foreach ( MenuElement::$rawMenuElements as $idMenuElement => $menuElement ) {
			$object = new MenuElement();  		//new MenuElement
			$object->id = $idMenuElement;		//object id = idMenuElement
			$object->setCompleteMenuElement();	//and setCompleteMenuElement
			$keys[] = $idMenuElement;
			$title = $menuElement['label'];

			$structuredKeys[$idMenuElement] = array (
					'id' => $idMenuElement,
					'object' => $object,
					'title' => $title
			);
				
			$values[] = $title;
		}
	
		if (isset($parameters['forAutocompletion']) && $parameters['forAutocompletion']) {
			$a[] = $values;
			$a[] = $keys;
			return $a;
		} else {
			return $structuredKeys;
		}
	}
	
	/**
	 * This function sets the complete menu element.
	 *
	 * @access private
	 */
	
	public function setCompleteMenuElement() {
		$rawMenuElements = MenuElement::$rawMenuElements;
		if (isset($rawMenuElements[$this->id]['href'])) {
			$this->href = $rawMenuElements[$this->id]['href'];
		}
			if (isset($rawMenuElements[$this->id]['label'])) {
			$this->label = $rawMenuElements[$this->id]['label'];
		}
	}
}




