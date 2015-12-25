<?php
require_once dirname(__FILE__) . '/settings.php';

/**
 * This function prints out how much time ago.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @param string $time
 *        	the time in an eatable format for <code>strtotime</code>
 * @return string How much time ago?
 */
function ago($time)
{
	echo ' <br/>18: minu antud aeg: ', $time, ', praegune aeg: ', time();
	if (preg_match('/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u', $time)) 
	// 1978-2-3 5:8:9
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

/**
 * This function constructs a string to tell how much time ago.
 *
 * @author kalmer:piiskop <pandeero@gmail.com.
 * @param int $tm
 *        	time in seconds
 * @param number $rcs
 *        	number of units
 * @return string How much time ago?
 */
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
$_SESSION['language'] = 'et_EE';

$timeInPast = '2016-2-3 5:8:9';
$timeInFuture = strtotime('2032-04-08 21:30:15');
// @formatter:off

echo ' <br/>93: ', sprintf(
	'The difference is: %1$s.',
	findDifference(array (
		'timestampInFuture' => $timeInPast
	)) // 1
);
