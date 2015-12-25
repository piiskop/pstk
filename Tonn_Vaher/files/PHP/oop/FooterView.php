<?php 
	require_once 'HTML/Template/IT.php';
	$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../../HTML');
	
	$tpl->loadTemplatefile('footer.html');
	$tpl->touchBlock('footer');
	$tpl->parse('footer');
	echo $tpl->GET('footer');
?>