<?php
class Translation{
	private $id;
	private $idParent;
	public function getIdParent(){
		return  $this->idParent;
		
	}
	private $translation;
	
	public function getTranslation(){
		return $this->translation;
	}
	public function __construct()
	{
		$parameters = func_get_arg(0);
		$this->id = $parameters['id'];
		$this->idParent = $parameters['idParent'];
		$this->translation = $parameters['translation'];
	}
	
}
?>