<?php
require_once dirname(__FILE__).'/../settings.php';

require_once "HTML/Template/IT.php";

$data = array
(
		"0" => array("Stig", "Bakken"),
		"1" => array("Martin", "Jansen"),
		"2" => array("Alexander", "Merz")
);

$tpl = new HTML_Template_IT(".");

$tpl->loadTemplatefile("template_test.html", true, true);

foreach($data as $name) {
	foreach($name as $cell) {
		// Assign data to the inner block
		$tpl->setCurrentBlock("cell") ;
		$tpl->setVariable("DATA", $cell) ;
		$tpl->parseCurrentBlock("cell") ;
	}

	// parse outter block
	$tpl->parse("row");
}
// print the output
$tpl->show();
?>