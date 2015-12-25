<?php
namespace tuts;

/**
 * This class deals with the data of services.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace tuts
 */
class Service
{

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var array[int] the raw data of services
	 */
	private static $rawServices = array(
		1 => array(
			'idService' => 1,
			'alt' => 'Web Design',
			'src' => 'web.png',
			'heading' => 'Web <span>Design</span>',
			'href' => 'web-design',
			'lead' => 'We would like to use an image only for the bottom of a DIV.
						However, our CSS somehow replicates the image across the body of
						the DIV instead of placing it at the bottom.'
		),
		2 => array(
			'idService' => 2,
			'alt' => 'Web Design',
			'src' => 'vector.png',
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
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var int $id the ID
	 */
	private $id;

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string $alt the alternative text for the image
	 */
	private $alt;

	/**
	 * the getter for the alternative text for the image
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the alternative text for the image
	 */
	public function getAlt()
	{
		return $this->alt;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string $src the full name of the image
	 */
	private $src;

	/**
	 * the getter for the full name of the image
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the full name of the image
	 */
	public function getSrc()
	{
		return $this->src;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string $src the heading
	 */
	private $heading;

	/**
	 * the getter for the heading
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the heading
	 */
	public function getHeading()
	{
		return $this->heading;
	}

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
	public function getHref()
	{
		return $this->href;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string $lead the lead text
	 */
	private $lead;

	/**
	 * the getter for the lead
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the lead
	 */
	public function getLead()
	{
		return $this->lead;
	}

	/**
	 * This function sets the complete service.
	 *
	 * @access private
	 * @author kalmer:piiskop
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

	/**
	 * This function queries all the services and returns them in an
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
	public static function getListOfTypeService($parameters)
	{
		$structuredKeys = array();
		foreach (Service::$rawServices as $id => $array) {
			$object = new Service();
			$object->id = $id;
			$object->setCompleteService();
			$keys[] = $id;
			$title = $array['heading'];
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