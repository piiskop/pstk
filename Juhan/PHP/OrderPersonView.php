<?php

class OrderPersonView {
	
	public static function buildListOfOrderPersons($parameters) {
	
		require_once 'HTML/Template/IT.php';
        $tpl = new \HTML_Template_IT(ROOT_FOLDER."html");
		$tpl->loadTemplatefile('orderpersons.html');
		foreach ( $parameters['orderPersons'] as $id => $orderPerson ) {
			$tpl->setCurrentBlock('order-person-in-list');
			$tpl->setVariable(array (
				'BEGINNING-OF-URL' =>BEGINNING_OF_URL,
				'ID'=>$id,
				'NAME'=>$orderPerson["title"]
			));
			$tpl->parse('order-person-in-list');
		}
		$tpl->parse('list');
		return $tpl->get('list');
	}
	public static function buildOrderPerson($parameters){
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER."html");
		$tpl->loadTemplatefile('orderpersons.html');
		$tpl->setCurrentBlock('order-person');
		$tpl->setVariable(array (
					'FIRST-NAME' =>$parameters["orderPerson"]->getFirstName(),
					'LAST-NAME'=>$parameters["orderPerson"]->getLastName(),
					'EMAIL'=>$parameters["orderPerson"]->getEmail(),
					'ADDRESS'=>$parameters["orderPerson"]->getAddress()
			));
			$tpl->parse('order-person');
			return $tpl->get('order-person');
}
}