<?php

namespace shiporder;

/**
 * This class describes the visual part of order persons.
 *
 * @author kalmer
 * @namespace shiporder
 */
class OrderPersonView {
	/**
	 * This function builds the list of order persons.
	 *
	 * @access public
	 * @author kalmer:piiskop
	 * @param mixed $parameters['orderPersons']
	 *        	the list of order persons according to the result of
	 *        	<code>getListOfType</code>...-method
	 * @return the parsed HTML-file
	 */
	public static function buildListOfOrderPersons($parameters) {
		// require_once dirname(__FILE__) . '/../errors/ErrorView.php';
		// \PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, array (
		// new ErrorView(), 'raiseError'
		// ));
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('order-persons.html');
		foreach ( $parameters['orderPersons'] as $idOrderPerson => $orderPerson ) {
			$tpl->setCurrentBlock('order-person-in-list');
			$tpl->setVariable(array (
				'ID' => $idOrderPerson,
				'NAME' => $orderPerson['title'] 
			));
			$tpl->parse('order-person-in-list');
		}
		$tpl->parse('list');
		return $tpl->get('list');
	}
	/**
	 * This function builds the form of an order person.
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @param OrderPerson $parameters['orderPerson']
	 *        	the order person
	 * @return string the form
	 */
	public static function buildOrderPerson($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('order-persons.html');
		$tpl->setCurrentBlock('order-person');
		$tpl->setVariable(array (
			'ADDRESS' => $parameters['orderPerson']->getAddress(),
			'EMAIL' => $parameters['orderPerson']->getEmail(),
			'FIRST-NAME' => $parameters['orderPerson']->getFirstName(),
			'LAST-NAME' => $parameters['orderPerson']->getLastName(),
			'ID-OF-ORDER-PERSON' => $parameters['orderPerson']->getId()
		));
		$tpl->parse('order-person');
		return $tpl->get('order-person');
	}
}