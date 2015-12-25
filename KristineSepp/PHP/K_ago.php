<?php
require_once dirname(__FILE__) . '/settings.php';

function ago($time)
{
	if (preg_match('/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u', $time))
	{
		$time = strtotime($time);
	}
	$m = time() - $time;
	$o = 'just now';
	$t = array(
		'year' => 31556926,
		'month' => 2629744,
		'week' => 604800,
		'day' => 86400,
		'hour' => 3600,
		'minute' => 60,
		'second' => 1
	);
	foreach ($t as $u => $s) {
		if ($s <= $m) {
			$v = floor($m / $s);
			$o = "$v $u" . ($v == 1 ? '' : 's') . ' ago';
			break;
		}
	}
	return $o;
}

function _ago($tm, $rcs = 0)
{
	$cur_tm = time();
	$dif = $cur_tm - $tm;
	$pds = array(
		'second',
		'minute',
		'hour',
		'day',
		'week',
		'month',
		'year',
		'decade'
	);
	$lngh = array(
		1,
		60,
		3600,
		86400,
		604800,
		2630880,
		31570560,
		315705600
	);
	for ($v = sizeof($lngh) - 1; ($v >= 0) && (($no = $dif / $lngh[$v]) <= 1); $v --);
	if ($v < 0) $v = 0;
	$_tm = $cur_tm - ($dif % $lngh[$v]);
	
	$no = floor($no);
	if ($no != 1) $pds[$v] .= 's';
	$x = sprintf("%d %s ", $no, $pds[$v]);
	if (($rcs > 0) && ($v >= 1) && (($cur_tm - $_tm) > 0)) $x .= _ago($_tm, 
		-- $rcs);
	return $x;
}

$timeInPast = strtotime('1978-04-08 21:30:15');
$timeInFuture = strtotime('2032-04-08 21:30:15');
// @formatter:off
echo ' <br/>38: ', sprintf(
	'The incident has taken place %1$s.',
	ago(strtotime($timeInPast)) // 1
);
echo ' <br/>85: ', sprintf(
	'The incident is going to take place %1$s.',
	ago(strtotime($timeInFuture)) // 1
);
echo ' <br/>89: ', sprintf(
	'The incident has taken place %1$s.',
	_ago(strtotime($timeInPast), 0) // 1
);
echo ' <br/>93: ', sprintf(
	'The incident is going to take place %1$s.',
	_ago(strtotime($timeInFuture), 1) // 1
);
echo date("YmdHis", PHP_INT_MAX);
// @formatter:on