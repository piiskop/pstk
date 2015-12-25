<?php 		require_once 'HTML/Template/IT.php';
$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');

$tpl->loadTemplatefile('Header.html');
$tpl-> touchBlock ('BLOCK');
$tpl-> parse ('BLOCK');
echo $tpl-> get ('BLOCK');
?>