<?php
require_once dirname(__FILE__).'/configuration.php';
require_once dirname(__FILE__).'/PersonView.php';
require_once dirname(__FILE__).'/Person.php';
if (isset($_GET['idPerson']) && is_int($_GET['idPerson']) && $_GET['idPerson'] > -1) {
	require_once dirname(__FILE__).'/Person.php';
	$person = new Person();
	$person->setIdPerson($_GET['idPerson']);
	$person->setCompletePerson();
	//$body = PersonView::buildListItem;
} 
else {
	$title = 'Inimeste nimed';
	$persons = Person::getPersons();
	$body = PersonView::buildList(array(
			'persons' => $persons
	));
	
}
require_once dirname(__FILE__).'/PageView.php';
echo PageView::buildPage(array(
		'title' => $title,
		'body' => $body
));