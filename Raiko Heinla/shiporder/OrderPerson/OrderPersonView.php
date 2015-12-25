<?php

namespace shiporder;

/**
 * This class describes the visual part of order persons.
 */
class OrderPersonView {
	/**
	 * This function builds the list of order persons.
	 */
	public static function buildListOfOrderPersons($parameters) {
		// require_once dirname(__FILE__) . '/../errors/ErrorView.php';
		// \PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, array (
		// new ErrorView(), 'raiseError'
		// ));		
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		//$tpl = new \HTML_Template_IT("../html");
		$tpl->loadTemplatefile('OrderPerson.html');
		foreach ( $parameters['orderPersons'] as $idOrderPerson => $orderPerson ) {
			$tpl->setCurrentBlock('order-person-in-list');
			$tpl->setVariable(array (
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'ID' => $idOrderPerson,
				'NAME' => $orderPerson['title']
			));		
			$tpl->parse('order-person-in-list');
		}				
		$tpl->parse('body');
	//	echo '31' . $tpl->get('body');
		return $tpl->get('body');
	}
	/**
	 * This function builds the form of an order person
	 * 
	 * @access public
	 * @param OrderPerson $parameters['orderPersons']
	 * @return string the form
	 */
	
	public static function buildOrderPerson($parameters){
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl ->loadTemplatefile('OrderPerson.html');
		$tpl ->setCurrentBlock('order-person');
		$tpl ->setVariable(array(
				'ADDRESS' => $parameters['orderPerson']->getAddress(),
				'EMAIL' => $parameters ['orderPerson'] ->getEmail(),
				'FIRST-NAME' => $parameters ['orderPerson'] -> getFirstName(),
				'LAST-NAME' => $parameters ['orderPerson'] -> getLastName(),
				'ID-OF-ORDER-PERSON' => $parameters ['orderPerson']->getId()
		));
		$tpl->parse('order-person');
		return  $tpl->get('order-person');
	}
}