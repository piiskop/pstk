<?php
namespace burnstudio;
/**
 * This class deals with the data of services.
 *
 * @namespace burnstudio
 */
class Service {

	/**
	 *
	 * @access private
	 * @var array[int] the raw data of services
	 */
	private static $rawServices = array(
		1 => array(
			'idService' => 1,
			'alt' => 'Web Design',
			'src' => 'Web.png',
			'heading' => 'Web <span>Design</span>',
			'href' => 'web-design',
			'lead' => 'We would like to use an image only for the bottom of a DIV.
						However, our CSS somehow replicates the image across the body of
						the DIV instead of placing it at the bottom.'
		),
		2 => array(
			'idService' => 2,
			'alt' => 'Web Design',
			'src' => 'Vector.png',
			'heading' => 'Vector <span>Design</span>',
			'href' => 'vector-design',
			'lead' => 'From your link: The default behavior is supposed to be to
						discard the center section of the image, and use the \'fill\'
						keyword on the border-image-slice property to preserve it: The
						‘fill’ keyword, if present, causes the middle part of the
						border-image to be preserved. (By default it is discarded, i.e.,
						treated as empty.) But the current browser behavior is to preserve
						the middle, and there is no way to turn it off. Thus, if you don\'t
						want your element\'s content area to have a background, the center
						section of your image must be empty.'
		)
	);

	/**
	 *
	 * @var int $id the ID
	 */
	private $id;
	/**
	 *
	 * @access private
	 * @var string $alt the alternative text for the image
	 */
	private $alt;
	/**
	 *
	 * @access private
	 * @var string $src the full name of the image
	 */
	private $src;
	/**
	 *
	 * @access private
	 * @var string $src the heading
	 */
	private $heading;
	/**
	 *
	 * @access private
	 * @var string $href the hyperreference
	 */
	private $href;
	/**
	 *
	 * @access private
	 * @var string $lead the lead text
	 */
	private $lead;

	/**
	 * the getter for the alternative text for the image
	 *
	 * @access public
	 * @return string the alternative text for the image
	 */
	public function getAlt()
	{
		return $this->alt;
	}

	/**
	 * the getter for the full name of the image
	 *
	 * @access public
	 * @return string the full name of the image
	 */
	public function getSrc()
	{
		return $this->src;
	}

	/**
	 * the getter for the heading
	 *
	 * @access public
	 * @return string the heading
	 */
	public function getHeading()
	{
		return $this->heading;
	}
	/**
	 * the getter for the hyperreference
	 *
	 * @access public
	 * @return string the hyperreference
	 */
	
	public function getHref()
	{
		return $this->href;
	}

	/**
	 * the getter for the lead
	 *
	 * @access public
	 * @return string the lead
	 */
	
	public function getLead()
	{
		return $this->lead;
	}

	/**
	 * This function queries all the services and returns them in an
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
	 * @return int[] <code>NULL</code>, if there are no service available
	 *         or
	 *         the query is erroneous or the array with keys
	 */
	
	public static function getListOfTypeService($parameters)
	{
		$structuredKeys = array();
		foreach (Service::$rawServices as $idService => $array) {
			$object = new Service();
			$object->id = $idService;
			$object->setCompleteService();
			$keys[] = $idService;
			$title = $array['heading'];
			$structuredKeys[$idService] = array(
				'id' => $idService,
				'object' => $object, //$object->setCompleteService();
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
	/**
	 * This function sets the complete service.
	 *
	 * @access private
	 */
	private function setCompleteService()
	{
		$rawServices = Service::$rawServices;
		if (isset($rawServices[$this->id]['alt'])) {
			$this->alt = $rawServices[$this->id]['alt'];
		}
		if (isset($rawServices[$this->id]['src'])) {
			$this->src = $rawServices[$this->id]['src'];
		}
		if (isset($rawServices[$this->id]['heading'])) {
			$this->heading = $rawServices[$this->id]['heading'];
		}
		if (isset($rawServices[$this->id]['href'])) {
			$this->href = $rawServices[$this->id]['href'];
		}
		if (isset($rawServices[$this->id]['lead'])) {
			$this->lead = $rawServices[$this->id]['lead'];
		}
	}
}