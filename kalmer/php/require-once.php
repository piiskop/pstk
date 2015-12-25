<?php
if (! isset($_SESSION)) {
	session_start();
}

setlocale(LC_TIME, 'et_EE.UTF-8');
ini_set('display_errors', 1);

if (defined('E_DEPRECATED')) {
	error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_STRICT);
} else {
	error_reporting(E_ALL & ~ E_STRICT);
}

date_default_timezone_set('Europe/Tallinn');

require_once 'CommonPageView.php';
require_once dirname(__FILE__) . '/JudgeView.php';
require_once 'Judge.php';

if (isset($_GET['index']) && ($_GET['index'] > - 1)) {
	$judge = new Judge();
	$judge->setIdJudge($_GET['index']);
	$judge->setCompleteJudge();

	$htmlOfJudges = JudgeView::buildJudge(array (
		'judge' => $judge
	));
} else {

	$judges = Judge::getJudges();
	$htmlOfJudges = JudgeView::buildJudges(array (
		'judges' => $judges 
	));
}

$html = CommonPageView::buildPage(array (
	'middle' => $htmlOfJudges 
));

echo $html;