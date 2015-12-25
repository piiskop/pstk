<?php
namespace tuts;

/**
 * This class deals with the data of menu elements.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace tuts
 */
class MenuElement
{

	/**
	 *
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var array[int] the raw menu element data
	 */
	private static $rawMenuElements = array(
		1 => array(
			'idMenuElement' => 1,
			'href' => '',
			'label' => 'services'
		),
		2 => array(
			'idMenuElement' => 2,
			'href' => '',
			'label' => 'about us'
		),
		3 => array(
			'idMenuElement' => 3,
			'href' => '',
			'label' => 'testimonials'
		),
		4 => array(
			'idMenuElement' => 4,
			'href' => '',
			'label' => 'contact us'
		)
	);

	/**
	 *
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var int $idMenuElement the ID
	 */
	private $id;

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string $href the hyperreference
	 */
	private $href;

	/**
	 * the getter for the hyperreference
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the hyperreference
	 */
	public function getHref ()
	{
		return $this->href;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string $label the text on the menu element
	 */
	private $label;

	/**
	 * the getter for the label
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the label
	 */
	public function getLabel ()
	{
		return $this->label;
	}

	/**
	 * This function sets the complete menu element.
	 *
	 * @access private
	 * @author kalmer:piiskop
	 */
	private function setCompleteMenuElement ()
	{
		$rawMenuElements = MenuElement::$rawMenuElements;
		if (isset($rawMenuElements[$this->id]['href'])) {
			$this->href = $rawMenuElements[$this->id]['href'];
		}
		if (isset($rawMenuElements[$this->id]['label'])) {
			$this->label = $rawMenuElements[$this->id]['label'];
		}
	}

	/**
	 * This function queries all the menu elements and returns them in an
	 * autocomplete
	 * array if needed.
	 *
	 * @access public
	 * @author kalmer
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
	public static function getListOfTypeMenuElement ($parameters)
	{
		$structuredKeys = array();
		foreach (MenuElement::$rawMenuElements as $id => $array) {
			$object = new MenuElement();
			$object->id = $id;
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
		if (isset($parameters['forAutocompletion']) &&
				 $parameters['forAutocompletion']) {
			$a[] = $values;
			$a[] = $keys;
			return $a;
		} else {
			return $structuredKeys;
		}
	}
}