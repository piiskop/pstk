<?php 
	require_once 'HTML/Template/IT.php';
	$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../../HTML');
	
	$tpl->loadTemplatefile('header.html');
	$tpl->touchBlock('header');
	$tpl->parse('header');
	echo $tpl->GET('header');
?>