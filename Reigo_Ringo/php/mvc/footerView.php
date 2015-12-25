<?php

require_once 'conf.php';

require_once 'C:/wamp/bin/php/php5.4.12/Template/IT.php';

$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
$tpl->loadTemplatefile('footer.html');
$tpl->touchBlock('footer');
$tpl->parse('footer');
$html = $html . $tpl->get('footer');
