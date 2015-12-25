<?php

require_once 'conf.php';

require_once 'C:/wamp/bin/php/php5.4.12/Template/IT.php';

$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
$tpl->loadTemplatefile('siin_htmlid_koos.html');

$html = '';

require_once 'headerView.php';

require_once 'bodyView.php';

require_once 'footerView.php';


$tpl->setCurrentBlock('html');
$tpl->setVariable(array (
		'BODY' => $html
	)
);

if (empty($html)) {
	echo '$html is either 0, empty, or not set at all';
}


$tpl->parse('html');
$tpl->get('html');

echo $html;
