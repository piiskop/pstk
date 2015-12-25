<?php
//Kontroller
//__FILE__ tähendam selle samase faili asukohta kus praegu ollaxe
require_once dirname(__FILE__).'/configuration.php';
require_once dirname(__FILE__).'/FamilyView.php';
require_once dirname(__FILE__).'/family.php';
if (isset($_GET['idFamily']) && ($_GET ['idFamily'] > -1))
{
	$family = new Family();
	$family -> setIdFamily($_GET ['idFamily']);
	$family -> setCompleteFamily();
 	$body = FamilyView::buildFamilyView(array(
 			'family' => $family
 	));
 	$titles = $family->getName();
}
else
{
	$familys = Family::getFamilys();
	$titles = 'Perekondade nimed';
	$body= FamilyView::buildList(array(
			'familys' => $familys			
	));
}
require_once dirname(__FILE__).'/PageView.php';
echo PageView::buildPage(array(
		'title' => $titles,
		'body'  => $body
));