<?php

namespace shiporder;

/**
 * This class describes the visual part of order persons.
 * 
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
		
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT("./html");
		$tpl->loadTemplatefile('order-persons.html');
		foreach ( $parameters['orderPersons'] as $idOrderPerson => $orderPerson ) {
			$tpl->setCurrentBlock('order-person');
			$tpl->setVariable(array ('NAME' => $orderPerson['title']));
			$tpl->parse('order-person');
		}
		$tpl->setCurrentBlock('html');
		$tpl->setVariable(array (
			'TITLE' => 'Kliendid' 
		));
		$tpl->parse('html');
		return $tpl->get('html');
	}
}