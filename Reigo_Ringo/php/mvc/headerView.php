<?php

require_once 'conf.php';

require_once 'C:/wamp/bin/php/php5.4.12/Template/IT.php';

$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
$tpl->loadTemplatefile('header.html');
$tpl->touchBlock('header');
$tpl->parse('header');

$html .= $tpl->get('header');
