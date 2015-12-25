<?php
namespace shiporder;

/**
 * This class describes the visual part of order persons.
 *
 * @author rasmus
 * @namespace shiporder
 */
class OrderPersonView {
	/**
	 * This function builds the list of order persons.
	 *
	 * @access public
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
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'orderperson');
		$tpl->loadTemplatefile('OrderPerson.html');
		foreach ( $parameters['orderPersons'] as $idOrderPerson => $orderPerson ) {
			$tpl->setCurrentBlock('orderperson-in-list');
			$tpl->setVariable(array (
				'ID' => $idOrderPerson,
				'NAME' => $orderPerson['title'] 
			));
			$tpl->parse('orderperson-in-list');
		}
		$tpl->parse('list');
		return $tpl->get('list');
	}
	/**
	 * This function builds the form of an order person.
	 *
	 * @access public
	 * @param OrderPerson $parameters['orderPerson']
	 *        	the order person
	 * @return string the form
	 */
	public static function buildOrderPerson($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'orderperson');
		$tpl->loadTemplatefile('OrderPerson.html');
		$tpl->setCurrentBlock('orderperson');
		$tpl->setVariable(array (
			'ID-OF-ORDER-PERSON' => $parameters['orderPerson']->getId(),
			'FIRST-NAME' => $parameters['orderPerson']->getFirstName(),
			'LAST-NAME' => $parameters['orderPerson']->getLastName(),
			'EMAIL' => $parameters['orderPerson']->getEmail(),
			'ADDRESS' => $parameters['orderPerson']->getAddress()
		));
		$tpl->parse('orderperson');
		return $tpl->get('orderperson');
	}
}