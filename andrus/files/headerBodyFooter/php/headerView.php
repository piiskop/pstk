<?php
require_once 'HTML/Template/IT.php';
$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');

$tpl->loadTemplatefile('header.html');
$tpl->touchBlock('AKEA');
$tpl->parse('AKEA');
echo $tpl->get('AKEA');
