<?php
namespace tuts;
require_once dirname(__FILE__) . '/Model.php';


class Service extends Model
{

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

	
	private $id;

	
	private $alt;

	
	public function getAlt()
	{
		return $this->alt;
	}

	
	private $src;


	public function getSrc()
	{
		return $this->src;
	}

	
	private $heading;


	public function getHeading()
	{
		return $this->heading;
	}

	
	private $href;


	public function getHref()
	{
		return $this->href;
	}

	
	private $lead;


	public function getLead()
	{
		return $this->lead;
	}

	
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