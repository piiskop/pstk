<?php
namespace particle;
require_once dirname(__FILE__) . '/../php/Model.php';

/**
 * This class describes the common model for all subclasses.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace particle
 */
class Model extends \pstk\Model
{

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var array[string] the raw common data
	 */
	private static $raw = array(
		'translations' => array(
			'followMe' => array(
				'en_GB' => 'FOLLOW ME',
				'et_EE' => 'Järgnen sulle'
			),
			'olderPosts' => array(
				'en_GB' => 'OLDER POSTS',
				'et_EE' => 'vanemad postitused'
			),
			'newerPosts' => array(
				'en_GB' => 'NEWER POSTS',
				'et_EE' => 'uuemad postitused'
			),
			'search' => array(
				'en_GB' => 'SEARCH',
				'et_EE' => 'Otsing'
			),
			
			'subscribe' => array(
				'en_GB' => 'SUBSCRIBE',
				'et_EE' => 'Tellimused'
			),
			'title' => array(
				'en_GB' => 'PARTICLE',
				'et_EE' => 'PARTICLE'
			)
		)
	);

	/**
	 * This function sets the complete common data.
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 */
	public function setComplete()
	{
		if (isset(Model::$raw['translations'])) {
			$this->setTranslations(Model::$raw['translations']);
		}
	}
}