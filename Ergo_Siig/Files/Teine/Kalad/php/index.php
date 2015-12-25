<?php
//Kontroller
//__FILE__ tähendam selle samase faili asukohta kus praegu ollaxe
require_once dirname(__FILE__).'/configuration.php';
require_once dirname(__FILE__).'/KaladeView.php';
require_once dirname(__FILE__).'/kalad.php';
if (isset($_GET['idFamily']) && ($_GET ['idFamily'] > -1))
{
	$family = new Family();
	$family -> setIdFamily($_GET ['idKalad']);
	$family -> setCompleteFamily();
 	$body = FamilyView::buildFamilyView(array(
 			'family' => $family
 	));
 	$titles = $family->getName();
}
else
{
	$familys = Kalad::getKalad();
	$titles = 'Perekondade nimed';
	$body= KaladeView::buildList(array(
			'familys' => $familys			
	));
}
require_once dirname(__FILE__).'/PageView.php';
echo PageView::buildPage(array(
		'title' => $titles,
		'body'  => $body
));