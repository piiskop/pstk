<?php
require_once '../settings.php';
//require_once './Classes/OrderPerson.php';
require_once './Classes/Item.php';
//require_once './Classes/ShipTo.php';
//require_once './Classes/Order.php';
//require_once './Classes/OrderRow.php';
require_once 'HTML/Template/IT.php';
	$item = new \shiporder\item();
	$tpl = new \HTML_Template_IT(ROOT_FOLDER);
	$tpl->loadTemplatefile('template.html',true,true);
	for($i = 1 ; $i-1 < $item::itemCount() ; $i++) {
		$item->loadRawElement($i);
		$tpl->setCurrentBlock('list');
		$tpl->setVariable(array (
			'NAME' => $item->getName(),
			'AMOUNT' => $item->getAmount(),
			'PRICE' => $item->getPrice()
		));
		$tpl->parse('list');
	}
	$tpl->setCurrentBlock('html');
	$tpl->setVariable (array (
		'HeadTitle' => 'Tellimus',
		'BodyTitle' => 'OrderPerson'
	));
	$tpl->parse('html');
	$tpl->show('html');