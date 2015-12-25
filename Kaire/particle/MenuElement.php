<?php
namespace particle;
require_once dirname(__FILE__) . '/Model.php';

/**
 * This class deals with the data of menu elements.
 *
 * @author k
 * @namespace particle
 */
class MenuElement extends Model
{

	/**
	 *
	 * @author k
	 * @var array[int] the raw menu element data
	 */
	private static $rawMenuElements = array(
		1 => array(
			'idMenuElement' => 1,
			'translations' => array(
				'label' => array(
					'en_GB' => 'articles',
					'et_EE' => 'jutud'
				)
			),
			'type' => 1
		),
		2 => array(
			'idMenuElement' => 2,
			'translations' => array(
				'label' => array(
					'en_GB' => 'design',
					'et_EE' => 'kujundamine'
				)
			),
			'type' => 1
		),
		3 => array(
			'idMenuElement' => 3,
			'translations' => array(
				'label' => array(
					'en_GB' => 'graphics',
					'et_EE' => 'pildid'
				)
			),
			'type' => 1
		),
		4 => array(
			'idMenuElement' => 4,
			'translations' => array(
				'label' => array(
					'en_GB' => 'inspiration',
					'et_EE' => 'inspiratsioon'
				)
			),
			'type' => 1
		),
		5 => array(
			'idMenuElement' => 5,
			'translations' => array(
				'label' => array(
					'en_GB' => 'retro',
					'et_EE' => 'retro'
				)
			),
			'type' => 1
		),
		6 => array(
			'idMenuElement' => 6,
			'translations' => array(
				'label' => array(
					'en_GB' => 'about me',
					'et_EE' => 'sina'
				)
			),
			'type' => 2
		),
		7 => array(
			'idMenuElement' => 7,
			'translations' => array(
				'label' => array(
					'en_GB' => 'my portfolio',
					'et_EE' => 'tehtud tööd'
				)
			),
			'type' => 2
		),
		8 => array(
			'idMenuElement' => 8,
			'translations' => array(
				'label' => array(
					'en_GB' => 'get in touch',
					'et_EE' => 'Võtan ühendust.'
				)
			),
			'type' => 2
		),
	);

	/**
	 *
	 * @access private
	 * @author 
	 * @var boolean Is the menu element active?
	 */
	private $active;

	/**
	 * This function tells whether this menu element is active.
	 *
	 * @author k
	 * @return boolean Is it active?
	 */
	public function isActive()
	{
		return $this->active;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string $href the hyperreference
	 */
	private $href;

	/**
	 * the getter for the hyperreference
	 *
	 * @access public
	 * @author k
	 * @return string the hyperreference
	 */
	public function getHref()
	{
		return $this->href;
	}

	/**
	 *
	 * @access private
	 * @author k
	 * @var string $type the type, either
	 *      <ul>
	 *      <li><code>common</code>,</li>
	 *      <li><code>outer</code> or</li>
	 *      <li>...</li>
	 *      </ul>
	 */
	private $type;

	/**
	 * the getter for the type, either
	 * <ul>
	 * <li><code>common</code>,</li>
	 * <li><code>outer</code> or</li>
	 * <li>...</li>
	 * </ul>
	 *
	 * @access public
	 * @author k
	 * @return string the type, either
	 *         <ul>
	 *         <li><code>common</code>,</li>
	 *         <li><code>outer</code> or</li>
	 *         <li>...</li>
	 *         </ul>
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * This function sets the complete menu element.
	 *
	 * @access private
	 * @author k
	 */
	private function setCompleteMenuElement()
	{
		$rawMenuElements = MenuElement::$rawMenuElements;
		if (isset($rawMenuElements[$this->getId()]['href'])) {
			$this->href = $rawMenuElements[$this->getId()]['href'];
		}
		if (isset($rawMenuElements[$this->getId()]['translations'])) {
			$this->setTranslations(
				$rawMenuElements[$this->getId()]['translations']);
		}
		if (isset($rawMenuElements[$this->getId()]['type'])) {
			$this->type = $rawMenuElements[$this->getId()]['type'];
		}
	}

	/**
	 * This function queries all the menu elements and returns them in an
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
	 * @param integer $parameters['type']
	 *        	the menu
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
					$title = $object->translate(
						array(
							'property' => 'label'
						));
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
			exit(\ptsk\String::translate('errorWhichMenu'));
		}
	}

	/**
	 * This function returns the URL of the current page as encoded a bit.
	 *
	 * @access public
	 * @author K
	 * @param string $parameters['ampersand']
	 *        	<code>&</code> will be encoded
	 *        	into either <code>%26</code> or <code>&amp;</code>
	 * @return the URL
	 */
	private static function makeUrlOfCurrentPage($parameters)
	{
		$pageURL = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
		$pageURL .= $_SERVER['SERVER_PORT'] != '80' ? sprintf('%1$s:%2$u%3$s', 
			$_SERVER['SERVER_NAME'], // 1
$_SERVER['SERVER_PORT'], // 2
$_SERVER['REQUEST_URI']) : // 3
$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		
		return str_replace('&', $parameters['ampersand'], $pageURL);
	}

	/**
	 * This function sets produced attributes for this menu element.
	 *
	 * @access public
	 * @author K
	 * @uses BEGINNING_OF_URL for links
	 * @uses O for the URL of the current page
	 */
	public function setAttributes()
	{
		$hrefWithoutBeginning = str_replace(BEGINNING_OF_URL, '', 
			MenuElement::makeUrlOfCurrentPage(
				array(
					'ampersand' => '%26'
				)));
		$urlParts = explode('?', $hrefWithoutBeginning);
		if (strstr($urlParts[0], '/')) {
			$aliasWithoutSlash = explode('/', $urlParts[0]);
			$alias = $aliasWithoutSlash[0];
		}
		else {
			$alias = $urlParts[0];
		}
		$thisAlias = $alias;
		$this->href = strtr(
			$this->translate(
				array(
					'property' => 'href',
					'isSlug' => true
				)), '&', '&amp');
		$hrefWithoutBeginning = str_replace(BEGINNING_OF_URL, '', $this->href);
		$urlParts = explode('?', $hrefWithoutBeginning);
		if (strstr($urlParts[0], '/')) {
			$aliasWithoutSlash = explode('/', $urlParts[0]);
			$alias = $aliasWithoutSlash[0];
		}
		else {
			$alias = $urlParts[0];
		}
		if ($alias === $thisAlias) {
			$this->active = TRUE;
		}
		if (strpos($this->href, '[ID-OF-USER]') !== FALSE) {
			if (isset($_SESSION['idUser'])) {
				$this->href = str_replace('[ID-OF-USER]', 
					'&amp;idHuman=' . $_SESSION['idUser'], $this->href);
			}
			else {
				$this->href = str_replace('[ID-OF-USER]', '&amp;idHuman=', 
					$this->href);
			}
		}
	}
}