<?php
namespace tuts;
require_once dirname(__FILE__) . '/model.php';
/**
 * This class deals with the data of services.
 * @namespace tuts
 */
class Service extends Model
{

	/**
	 *
	 * @access private
	 * @var array[int] the raw data of services
	 */
	private static $rawServices = array(
			1 => array(
					'idService' => 1,
					'alt' => 'Web Design',
					'src' => 'web.png',
					'heading' => 'Web <span class="StressedInHeadingOfService">Design</span>',
					'href' => 'web-design',
					'lead' => 'We would like to use an image only for the bottom of a DIV.
						However, our CSS somehow replicates the image across the body of
						the DIV instead of placing it at the bottom.'
			),
			2 => array(
					'idService' => 2,
					'alt' => 'Web Design',
					'src' => 'vector.png',
					'heading' => 'Vector <span class="StressedInHeadingOfService">Design</span>',
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
	 * @access private
	 * @var string $alt the alternative text for the image
	 */
	private $alt;

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
	 *
	 * @access private
	 * @var string $src the full name of the image
	 */
	private $src;

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
	 *
	 * @access private
	 * @var string $src the heading
	 */
	private $heading;

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
	 *
	 * @access private
	 * @var string $href the hyperreference
	 */
	private $href;

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
	 *
	 * @access private
	 * @var string $lead the lead text
	 */
	private $lead;

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
	 * This function sets the complete service.
	 */
private function setCompleteService()
	{
		$rawServices = Service::$rawServices;
		if (isset($rawServices[$this->getId()]['alt'])) {
			$this->alt = $rawServices[$this->getId()]['alt'];
		}
		if (isset($rawServices[$this->getId()]['src'])) {
			$this->src = $rawServices[$this->getId()]['src'];
		}
		if (isset($rawServices[$this->getId()]['heading'])) {
			$this->heading = $rawServices[$this->getId()]['heading'];
		}
		if (isset($rawServices[$this->getId()]['href'])) {
			$this->href = $rawServices[$this->getId()]['href'];
		}
		if (isset($rawServices[$this->getId()]['lead'])) {
			$this->lead = $rawServices[$this->getId()]['lead'];
		}
	}

	/**
	 * This function queries all the services and returns them in an
	 * autocomplete array if needed.
	 *
	 * @access public
	 */
public static function getListOfTypeService($parameters)
	{
		$structuredKeys = array();
		foreach (Service::$rawServices as $id => $array) {
			$object = new Service();
			$object->setId($id);
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