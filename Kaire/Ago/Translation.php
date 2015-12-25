<?php
namespace pstk;

/**
 * This class deals with translations.
 * 
 *
 * @namespace pstk
 */
class Translation
{

	/**
	 *
	 * @access private
	 * 
	 * @var string the ID as the locale
	 */
	private $id;

	/**
	 *
	 * @access private
	 * 
	 * @var string the ID of the string
	 */
	private $idParent;

	/**
	 * the getter for the ID of the string
	 *
	 * @access public
	 * 
	 * @return string the ID of the string
	 */
	public function getIdParent()
	{
		return $this->idParent;
	}

	/**
	 *
	 * @access private
	 * 
	 * @var string the translation
	 */
	private $translation;

	public function getTranslation()
	{
		return $this->translation;
	}

	/**
	 * the constructor
	 *
	 * @access public
	 * 
	 */
	public function __construct()
	{
		$parameters = func_get_arg(0);
		$this->id = $parameters['id'];
		$this->idParent = $parameters['idParent'];
		$this->translation = $parameters['translation'];
	}
}