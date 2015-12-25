<?php

/***
 * This class visulizes persons
 * 
 * @author Arvuti
 *
 */
class PersonView {
	
	/***
	 * this function shows one person in the list
	 * @access public
	 * @author Tõnn
	 * @param int|string:Person[int] $parameters['persons']
	 * @return string
	 */
	
	public function buildList($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../HTML/');
		$tpl->loadTemplatefile('persons.html');
		$list = '';
		foreach ($parameters ['persons'] as $idPerson => $person) {
			$list .= Person::buildListItem(array(
				'person' => $person
			));
		}
		$tpl->setCurrentBlock('persons');
		$tpl->setVariable(array(
			'ID' => $person->getIdPerson(),
			'NAME' => $person->getNamePerson(),
		));
		$tpl->parse('persons');
		return $tpl->get('persons');
	}
	
	/***
	 * this function shows one person in the list
	 * @access public
	 * @author Tõnn
	 * @param int|string:Person $parameters['person'] One Person
	 * @return string
	 */
	
	public static function buildListItem($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/');
		$tpl->loadTemplatefile('persons.html');
		
		$tpl->setCurrentBlock('person');
		$tpl->setVariable(array(
			'ID' => $parameters['person']->getIdPerson(),
			'NAME' => $parameters['person']->getNamePerson(),	
		));
		$tpl->parse('persons');
		return $tpl->get('persons');
	}
	
	/***
	 * builds the person view
	 * @author Tõnn
	 */
	function buildPersonView($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/');
		$tpl->loadTemplatefile('persons.html');
		$tpl->parse('persons');
		return $tpl->get('persons');
	}
}