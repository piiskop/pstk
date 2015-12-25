<?php
namespace pstk;

/**
 * This class deals with translation
 */

class Translation{
	
	/**
	 * @var string the ID as the locale
	 */
	private $id;
	
	/**
	 * @var string the ID of the string
	 */
	private $idParent;
	
	/**
	 * The getter for the ID of string
	 */
	public function getIdParent()
		{	
		$this->idParent;
		}
		
		
		/**
		 * string the translation
		 */
	private $translation;
	
	public function getTranslation()
	{
		return $this->translation;
	}
	
	/**
	 * Contstructor
	 */
	public function __construct()
	{
		$parameters = func_get_arg(0);
		$this->if = $parameters['id'];
		$this->idParent = $parameters['idParent'];
		$this->translation = $parameters['translation'];
	}
}

