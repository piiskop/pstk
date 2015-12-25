<?php
namespace tuts;
require_once dirname(__FILE__) . '/Model.php';

/**
 * This class deals with the data of services.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace tuts
 */
class Service extends Model
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
			'translations' => array(
				'alt' => array(
					'en_GB' => 'Web Design',
					'et_EE' => 'veebikujundus'
				),
				'src' => array(
					'en_GB' => 'web.png',
					'et_EE' => 'web.png'
				),
				'heading' => array(
					'en_GB' => 'Web <span>Design</span>',
					'et_EE' => 'Veebi<span>kujundus</span>'
				),
				'href' => array(
					'en_GB' => 'web-design',
					'et_EE' => 'veebikujundus'
				),
				'lead' => array(
					'en_GB' => 'We would like to use an image only for the bottom of a DIV.
						However, our CSS somehow replicates the image across the body of
						the DIV instead of placing it at the bottom.',
					'et_EE' => '1 Teen “_ago”-st või “ago”-st koopia (ago.php).
2 Kirjutan valitud talitluse ümber enda stiili.
3 Muudan, et talitlus võimaldaks väljastada 
3.1 täpset ajalist erinevust ja
3.2 et oskaks seda teha ka eesti keeles.
4 Lisan kommentaari.
5 Kirjutan selle talitluslikkuse JS-i.'
				)
			)
		),
		2 => array(
			'idService' => 2,
			'translations' => array(
				'alt' => array(
					'en_GB' => 'Vector Design',
					'et_EE' => 'vektorgraafika'
				),
				'src' => array(
					'en_GB' => 'vector.png',
					'et_EE' => 'vector.png'
				),
				'heading' => array(
					'en_GB' => 'Vector <span>Design</span>',
					'et_EE' => 'Vektor<span>graafika</span>'
				),
				'href' => array(
					'en_GB' => 'vector-design',
					'et_EE' => 'vektorgraafika'
				),
				'lead' => array(
					'en_GB' => 'From your link: The default behavior is supposed to be to
						discard the center section of the image, and use the \'fill\'
						keyword on the border-image-slice property to preserve it: The
						‘fill’ keyword, if present, causes the middle part of the
						border-image to be preserved. (By default it is discarded, i.e.,
						treated as empty.) But the current browser behavior is to preserve
						the middle, and there is no way to turn it off. Thus, if you don\'t
						want your element\'s content area to have a background, the center
						section of your image must be empty.',
					'et_EE' => 'maist 1995: brendan eich, Mocha,
septembrist 1995: LiveScript,
detsembrist 1995: JavaScript,
1996-1997: ECMAScript,
1998: ECMAScript 2,
1999: ECMAScript 3,
2000-2003: ES4 / JS2,
2005: E4X / ActionScript 3, Ajax, Prototype, jQuery, Mootools, Dojo'
				)
			)
		)
	);

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
		if (isset($rawServices[$this->getId()]['translations'])) {
			$this->setTranslations($rawServices[$this->getId()]['translations']);
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
			$object->setId($id);
			$object->setCompleteService();
			$keys[] = $id;
			$title = $object->translate(array(
				'property' => 'heading'
			));
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
}