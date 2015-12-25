<?php
require_once dirname(__FILE__) . '/../CONFIGURATION.php';
require_once dirname(__FILE__) . '/FamilyView.php';
require_once dirname(__FILE__) . '/Family.php';

if (isset($_GET['idFamily']) && ($_GET['idFamily'] > - 1)) {
	$family=new Family();
	$family ->setIdFamily($_GET ['idFamily']);
	$family->setCompleteFamily();
 	$body=FamilyView::buildFamilyView(array(
 		'family'=>$family
 	));
 	$title=$family->getName();
} else {
	$title =('Perekondade nimed');
	$familys = Family::getFamilys();
	$body= FamilyView::buildList(array(
		'familys'=> $familys
	));
	
}
require_once dirname(__FILE__) . '/PageView.php';
	echo PageView::buildPage(array(
		'title'=>$title,
		'body'=>$body
	));
